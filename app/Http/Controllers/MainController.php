<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Specialization;
use App\Models\User;
use App\Models\UserAccountView;
use App\Models\UserFavorite;
use App\Models\UserReview;
use App\Models\UserRoleInformation;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function index()
    {
        return view('client.index');
    }

    public function mentors(Request $request)
    {
        if (empty($request->all())) {
            $mentors = UserRoleInformation::query()
                ->select(['user_role_information.*'])
                ->leftJoin('user_reviews', function ($leftJoin) {
                    $leftJoin->on('user_reviews.reviewer_id', '=', 'user_role_information.id')
                        ->select([DB::raw('AVG(user_reviews.rate) as rate, COUNT(user_reviews.reviewer_id) as count')])
                        ->whereNull('user_reviews.parent_id');
                })
                ->whereIn('role_name', ['paid_mentor', 'mentor'])->where('is_activated', 1)
                ->whereNotIn('role_name', ['student', 'consultant', 'paid_consultant'])
                ->with(['user'])
                ->orderByDesc('rate')
                ->paginate(10);
        } else {
            $freeMentor = $request->input('free');
            $paidMentor = $request->input('paid');

            $typeMentorsArray = array_filter([$freeMentor, $paidMentor]);
            $specializationsArray = (!empty($request->input('specialization_ids'))) ? array_keys($request->input('specialization_ids')) : null;
            $citiesArray = (!empty($request->input('cities'))) ? implode(' ', $request->input('cities')) : null;

            $mentors = UserRoleInformation::query()
                ->select(['users.address', 'user_role_information.*'])
                ->join('users', 'users.id', '=', 'user_role_information.user_id')
                ->when($typeMentorsArray, function ($query, $typeMentorsArray) {
                    $query->whereIn('role_name', $typeMentorsArray);
                })
                ->when($specializationsArray, function ($query, $specializationsArray) {
                    $query->whereIn('specialization_id', $specializationsArray);
                })
                ->when($citiesArray, function ($query, $citiesArray) {
                    $query->where('address', 'like', "%$citiesArray%");
                })
                ->where('is_activated', 1)
                ->whereNotIn('role_name', ['student', 'consultant', 'paid_consultant'])
                ->with(['user'])
                ->paginate(10);
        }

        $count = $mentors->count();

        $specializations = Specialization::query()->get();
        $cities = City::query()->get();

        return view('client.mentor.catalog', compact(['mentors', 'count', 'specializations', 'cities']));
    }

    public function mentor($id)
    {
        $mentor = UserRoleInformation::query()->findOrFail($id);

        $visits = UserAccountView::query()
            ->where(['user_id' => $mentor->user_id, 'role_name' => $mentor->role_name])
            ->whereDate('created_at', Carbon::today())
            ->first();

        if (empty($visits)) {
            UserAccountView::query()->create([
                'user_id' => $mentor->user_id,
                'role_id' => $mentor->role_id,
                'role_name' => $mentor->role_name,
                'visited' => 1
            ]);
        } else {
            $visits->visited += 1;
            $visits->update();
        }

        $reviews = UserReview::query()
            ->whereNull('parent_id')
            ->where(['reviewer_id' => $mentor->id])
            ->with('userRoleInformation', 'parentReviews', 'checkParentReview')
            ->orderByDesc('id')
            ->get();

        $userInformation = auth()->user()->roleInformation()->first();

        $myReview = 0;
        foreach ($reviews->toArray() as $review) {
            if ($review['user_id'] == $userInformation->id) {
                $myReview++;
            }
        }

        return view('client.mentor.mentor', compact(['mentor', 'reviews', 'myReview', 'userInformation']));
    }

    public function consultants()
    {
        $consultants = UserRoleInformation::query()
            ->with('user')
            ->where(['role_name' => 'consultant', 'is_activated' => 1])
            ->orWhere('role_name', 'paid_consultant')
            ->get();
        $count = $consultants->count();

        return view('client.consultant.catalog', compact(['consultants', 'count']));
    }

    public function consultant($id)
    {
        $consultant = UserRoleInformation::query()->findOrFail($id);
        return view('client.consultant.consultant', compact(['consultant']));
    }

    public function students()
    {
        $students = UserRoleInformation::query()
            ->with('user')
            ->where(['role_name' => 'student', 'is_activated' => 1])
            ->get();
        $count = $students->count();

        return view('client.student.catalog', compact(['students', 'count']));
    }

    public function student($id)
    {
        $student = UserRoleInformation::query()->findOrFail($id);
        return view('client.student.student', compact(['student']));
    }

    public function langSwitch(Request $request)
    {
        $lang = $request->input('lang', User::DEFAULT_LANG);
        if (!in_array($lang, User::LANGUAGES)) {
            $lang = User::DEFAULT_LANG;
        }
        Session::put('locale', $lang);
        App::setLocale(Session::get('locale'));
        return redirect()->back();
    }
}

