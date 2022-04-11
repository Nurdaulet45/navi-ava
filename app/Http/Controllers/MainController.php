<?php

namespace App\Http\Controllers;

use App\Events\WebsocketDemoEvent;
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

    /*
    select `user_role_information`.*,  AVG(`user_reviews`.`rate`),
        specializations.name as specializations_name,
        roles.description as roles_description,
        users.last_name, users.first_name, users.address

        from `user_role_information`
        left join `specializations` on `specializations`.`id` = `user_role_information`.`id`
        left join `users` on `users`.`id` = `user_role_information`.`user_id`
        left join `user_reviews` on `user_reviews`.`reviewer_id` = `user_role_information`.`id`
        left join `roles` on `roles`.`id` = `user_role_information`.`role_id`
        WHERE `user_role_information`.`is_activated` = 1
        GROUP BY `user_role_information`.`id`;
     */

    public function search(Request $request)
    {
        $search = $request->input('search');
        $freeItems = $request->input('free') ? ['mentor', 'student', 'consultant'] : null;
        $paidItems = $request->input('paid') ? ['paid_mentor', 'paid_consultant'] : null;
        $withReviews = $request->input('withReviews');

        $citiesArray = (!empty($request->input('cities'))) ? implode(' ', $request->input('cities')) : null;
        $reviewParameter = (!empty($request->input('reviewParameters'))) ? array_keys($request->input('reviewParameters')) : null;
        $specializationsArray = (!empty($request->input('specialization_ids'))) ? array_keys($request->input('specialization_ids')) : null;

        $onlineParameters = (!empty($request->input('onlineParameters'))) ? $request->input('onlineParameters') : null;
        if ($onlineParameters) {
            $onlineParameters = array_map(function ($element) {
                if ($element == 'online') {
                    return Carbon::now()->subMinutes();
                } elseif ($element == '5 days') {
                    return Carbon::now()->subDays(5);
                } elseif ($element == '10 days') {
                    return Carbon::now()->subDays(10);
                } elseif ($element == '20 days') {
                    return Carbon::now()->subDays(20);
                } elseif ($element == '30 days') {
                    return Carbon::now()->subDays(30);
                }
            }, $onlineParameters);
        }

        $items = UserRoleInformation::query()
            ->selectRaw('user_role_information.*,roles.description as roles_description,users.last_name, users.first_name, users.address,
            specializations.name as specializations_name,
            AVG(user_reviews.rate) as rate, COUNT(user_reviews.reviewer_id) as count')
            ->leftJoin('user_reviews', function ($leftJoin) {
                $leftJoin->on('user_reviews.reviewer_id', '=', 'user_role_information.id')
                    ->whereNull('user_reviews.parent_id');
            })
            ->leftJoin('users', function ($leftJoin) {
                $leftJoin->on('users.id', '=', 'user_role_information.user_id');
            })
            ->leftJoin('specializations', function ($leftJoin) {
                $leftJoin->on('specializations.id', '=', 'user_role_information.specialization_id');
            })
            ->leftJoin('roles', function ($leftJoin) {
                $leftJoin->on('roles.id', '=', 'user_role_information.role_id');
            })
            ->where(['is_activated' => 1])
            ->when($search, function ($query, $search) {
                $query->where('users.first_name', 'like', "%$search%")
                    ->orWhere('users.last_name', 'like', "%$search%")
                    ->orWhere('users.address', 'like', "%$search%")
                    ->orWhere('specialization_text', 'like', "%$search%")
                    ->orWhere('skills', 'like', "%$search%")
                    ->orWhere('specializations.name', 'like', "%$search%")
                    ->orWhere('roles.description', 'like', "%$search%");
            })
            ->when($freeItems, function ($query, $freeItems) {
                $query->whereIn('role_name', $freeItems);
            })
            ->when($paidItems, function ($query, $paidItems) {
                $query->whereIn('role_name', $paidItems);
            })
            ->when($onlineParameters, function ($query, $onlineParameters) {
                foreach ($onlineParameters as $key => $onlineParameter) {
                    if ($key == 0) {
                        $query->where('last_seen', '>=', $onlineParameter);
                    } else {
                        $query->orWhere('last_seen', '>=', $onlineParameter);
                    }
                }
            })
            ->when($specializationsArray, function ($query, $specializationsArray) {
                $query->whereIn('specialization_id', $specializationsArray);
            })
            ->when($reviewParameter, function ($query, $reviewParameter) {
                $query->having('count', '>=', $reviewParameter);
            })
            ->when($citiesArray, function ($query, $citiesArray) {
                $query->where('address', 'like', "%$citiesArray%");
            })
            ->when($withReviews, function ($query) {
                $query->whereNotNull('rate');
            })
            ->with(['user'])
            ->groupBy('id')
            ->orderByDesc('rate')
            ->paginate(10);

        $count = $items->count();

        $specializations = Specialization::query()->get();
        $cities = City::query()->get();

        return view('client.search', compact(['specializations', 'cities', 'items', 'count']));
    }

    /*
     SELECT *, COUNT(user_reviews.reviewer_id) as count
    FROM `user_role_information`
    LEFT JOIN user_reviews
    ON user_reviews.reviewer_id = user_role_information.id
    WHERE is_activated = 1 AND role_name NOT IN ('student','consultant','paid_consultant') AND
    (SELECT COUNT(user_reviews.reviewer_id) as count2
    FROM `user_role_information`
    LEFT JOIN user_reviews
    ON user_reviews.reviewer_id = user_role_information.id
    WHERE is_activated = 1 AND role_name NOT IN ('student','consultant','paid_consultant')) IN (0, 2)
    GROUP BY user_reviews.reviewer_id;
    */

    public function mentors(Request $request)
    {
        $mentorItems = ['paid_mentor', 'mentor'];
        $mentorNotItems = ['student', 'consultant', 'paid_consultant'];

        if (empty($request->all())) {
            $items = UserRoleInformation::query()
                ->selectRaw('user_role_information.*, AVG(user_reviews.rate) as rate, COUNT(user_reviews.reviewer_id) as count')
                ->leftJoin('user_reviews', function ($leftJoin) {
                    $leftJoin->on('user_reviews.reviewer_id', '=', 'user_role_information.id')
                        ->whereNull('user_reviews.parent_id');
                })
                ->whereIn('role_name', $mentorItems)->where('is_activated', 1)
                ->whereNotIn('role_name', $mentorNotItems)
                ->with(['user'])
                ->groupBy('id')
                ->orderByDesc('rate')
                ->paginate(10);
        } else {
            $withReviews = $request->input('withReviews');

            $freeItems = $request->input('free') ? ['mentor'] : null;
            $paidItems = $request->input('paid') ? ['paid_mentor'] : null;

            $specializationsArray = (!empty($request->input('specialization_ids'))) ? array_keys($request->input('specialization_ids')) : null;
            $citiesArray = (!empty($request->input('cities'))) ? implode(' ', $request->input('cities')) : null;
            $reviewParameter = (!empty($request->input('reviewParameters'))) ? array_keys($request->input('reviewParameters')) : null;

            $onlineParameters = (!empty($request->input('onlineParameters'))) ? $request->input('onlineParameters') : null;
            if ($onlineParameters) {
                $onlineParameters = array_map(function ($element) {
                    if ($element == 'online') {
                        return Carbon::now()->subMinutes();
                    } elseif ($element == '5 days') {
                        return Carbon::now()->subDays(5);
                    } elseif ($element == '10 days') {
                        return Carbon::now()->subDays(10);
                    } elseif ($element == '20 days') {
                        return Carbon::now()->subDays(20);
                    } elseif ($element == '30 days') {
                        return Carbon::now()->subDays(30);
                    }
                }, $onlineParameters);
            }

            $items = UserRoleInformation::query()
                ->selectRaw('user_role_information.*, users.address, AVG(user_reviews.rate) as rate, COUNT(user_reviews.reviewer_id) as count')
                ->leftJoin('users', function ($leftJoin) {
                    $leftJoin->on('users.id', '=', 'user_role_information.user_id');
                })
                ->leftJoin('user_reviews', function ($leftJoin) {
                    $leftJoin->on('user_reviews.reviewer_id', '=', 'user_role_information.id')
                        ->whereNull('user_reviews.parent_id');
                })
                ->when($freeItems, function ($query, $freeItems) {
                    $query->whereIn('role_name', $freeItems);
                })
                ->when($paidItems, function ($query, $paidItems) {
                    $query->whereIn('role_name', $paidItems);
                })
                ->when($onlineParameters, function ($query, $onlineParameters) {
                    foreach ($onlineParameters as $key => $onlineParameter) {
                        if ($key == 0) {
                            $query->where('last_seen', '>=', $onlineParameter);
                        } else {
                            $query->orWhere('last_seen', '>=', $onlineParameter);
                        }
                    }
                })
                ->when($specializationsArray, function ($query, $specializationsArray) {
                    $query->whereIn('specialization_id', $specializationsArray);
                })
                ->when($reviewParameter, function ($query, $reviewParameter) {
                    $query->having('count', '>=', $reviewParameter);
                })
                ->when($citiesArray, function ($query, $citiesArray) {
                    $query->where('address', 'like', "%$citiesArray%");
                })
                ->when($withReviews, function ($query) {
                    $query->whereNotNull('rate');
                })
                ->where('is_activated', 1)
                ->whereNotIn('role_name', $mentorNotItems)
                ->with(['user'])
                ->groupBy('id')
                ->orderByDesc('rate')
                ->paginate(10);
        }

        $count = $items->count();

        $specializations = Specialization::query()->get();
        $cities = City::query()->get();

        $pageTitle = 'Каталог наставников';
        $pageFilterRoute = 'mentors.index';

        return view('client.mentor.catalog', compact(['pageTitle', 'pageFilterRoute', 'items', 'count', 'specializations', 'cities']));
    }

    public function mentor($id)
    {
        $item = UserRoleInformation::query()->findOrFail($id);

        $visits = UserAccountView::query()
            ->where(['user_id' => $item->user_id, 'role_name' => $item->role_name])
            ->whereDate('created_at', Carbon::today())
            ->first();

        if (empty($visits)) {
            UserAccountView::query()->create([
                'user_id' => $item->user_id,
                'role_id' => $item->role_id,
                'role_name' => $item->role_name,
                'visited' => 1
            ]);
        } else {
            $visits->visited += 1;
            $visits->update();
        }

        $reviews = UserReview::query()
            ->whereNull('parent_id')
            ->where(['reviewer_id' => $item->id])
            ->with('userRoleInformation', 'parentReviews', 'checkParentReview')
            ->orderByDesc('id')
            ->get();

        $myReview = false;
        $userInformation = null;

        if (auth()->check()) {
            $userInformation = auth()->user()->roleInformation()->first();

            $myReview = 0;
            foreach ($reviews->toArray() as $review) {
                if ($review['user_id'] == $userInformation->id) {
                    $myReview++;
                }
            }
        }

        return view('client.mentor.mentor', compact(['item', 'reviews', 'myReview', 'userInformation']));
    }

    public function consultants(Request $request)
    {
        $consultantItems = ['consultant', 'paid_consultant'];
        $consultantNotItems = ['student', 'paid_mentor', 'mentor'];

        if (empty($request->all())) {
            $items = UserRoleInformation::query()
                ->selectRaw('user_role_information.*, AVG(user_reviews.rate) as rate, COUNT(user_reviews.reviewer_id) as count')
                ->leftJoin('user_reviews', function ($leftJoin) {
                    $leftJoin->on('user_reviews.reviewer_id', '=', 'user_role_information.id')
                        ->whereNull('user_reviews.parent_id');
                })
                ->whereIn('role_name', $consultantItems)->where('is_activated', 1)
                ->whereNotIn('role_name', $consultantNotItems)
                ->with(['user'])
                ->groupBy('id')
                ->orderByDesc('rate')
                ->paginate(10);
        } else {
            $withReviews = $request->input('withReviews');

            $freeItems = $request->input('free') ? ['consultant'] : null;
            $paidItems = $request->input('paid') ? ['paid_consultant'] : null;

            $specializationsArray = (!empty($request->input('specialization_ids'))) ? array_keys($request->input('specialization_ids')) : null;
            $citiesArray = (!empty($request->input('cities'))) ? implode(' ', $request->input('cities')) : null;
            $reviewParameter = (!empty($request->input('reviewParameters'))) ? array_keys($request->input('reviewParameters')) : null;

            $onlineParameters = (!empty($request->input('onlineParameters'))) ? $request->input('onlineParameters') : null;
            if ($onlineParameters) {
                $onlineParameters = array_map(function ($element) {
                    if ($element == 'online') {
                        return Carbon::now()->subMinutes();
                    } elseif ($element == '5 days') {
                        return Carbon::now()->subDays(5);
                    } elseif ($element == '10 days') {
                        return Carbon::now()->subDays(10);
                    } elseif ($element == '20 days') {
                        return Carbon::now()->subDays(20);
                    } elseif ($element == '30 days') {
                        return Carbon::now()->subDays(30);
                    }
                }, $onlineParameters);
            }

            $items = UserRoleInformation::query()
                ->selectRaw('user_role_information.*, users.address, AVG(user_reviews.rate) as rate, COUNT(user_reviews.reviewer_id) as count')
                ->leftJoin('users', function ($leftJoin) {
                    $leftJoin->on('users.id', '=', 'user_role_information.user_id');
                })
                ->leftJoin('user_reviews', function ($leftJoin) {
                    $leftJoin->on('user_reviews.reviewer_id', '=', 'user_role_information.id')
                        ->whereNull('user_reviews.parent_id');
                })
                ->when($freeItems, function ($query, $freeItems) {
                    $query->whereIn('role_name', $freeItems);
                })
                ->when($paidItems, function ($query, $paidItems) {
                    $query->whereIn('role_name', $paidItems);
                })
                ->when($onlineParameters, function ($query, $onlineParameters) {
                    foreach ($onlineParameters as $key => $onlineParameter) {
                        if ($key == 0) {
                            $query->where('last_seen', '>=', $onlineParameter);
                        } else {
                            $query->orWhere('last_seen', '>=', $onlineParameter);
                        }
                    }
                })
                ->when($specializationsArray, function ($query, $specializationsArray) {
                    $query->whereIn('specialization_id', $specializationsArray);
                })
                ->when($reviewParameter, function ($query, $reviewParameter) {
                    $query->having('count', '>=', $reviewParameter);
                })
                ->when($citiesArray, function ($query, $citiesArray) {
                    $query->where('address', 'like', "%$citiesArray%");
                })
                ->when($withReviews, function ($query) {
                    $query->whereNotNull('rate');
                })
                ->where('is_activated', 1)
                ->whereNotIn('role_name', $consultantNotItems)
                ->with(['user'])
                ->groupBy('id')
                ->orderByDesc('rate')
                ->paginate(10);
        }

        $count = $items->count();

        $specializations = Specialization::query()->get();
        $cities = City::query()->get();

        $pageTitle = 'Каталог консультантов';
        $pageFilterRoute = 'consultants.index';

        return view('client.mentor.catalog', compact(['pageTitle', 'pageFilterRoute', 'items', 'count', 'specializations', 'cities']));
    }

    public function consultant($id)
    {
        $item = UserRoleInformation::query()->findOrFail($id);

        $visits = UserAccountView::query()
            ->where(['user_id' => $item->user_id, 'role_name' => $item->role_name])
            ->whereDate('created_at', Carbon::today())
            ->first();

        if (empty($visits)) {
            UserAccountView::query()->create([
                'user_id' => $item->user_id,
                'role_id' => $item->role_id,
                'role_name' => $item->role_name,
                'visited' => 1
            ]);
        } else {
            $visits->visited += 1;
            $visits->update();
        }

        $reviews = UserReview::query()
            ->whereNull('parent_id')
            ->where(['reviewer_id' => $item->id])
            ->with('userRoleInformation', 'parentReviews', 'checkParentReview')
            ->orderByDesc('id')
            ->get();

        $myReview = false;
        $userInformation = null;

        if (auth()->check()) {
            $userInformation = auth()->user()->roleInformation()->first();

            $myReview = 0;
            foreach ($reviews->toArray() as $review) {
                if ($review['user_id'] == $userInformation->id) {
                    $myReview++;
                }
            }
        }

        return view('client.mentor.mentor', compact(['item', 'reviews', 'myReview', 'userInformation']));
    }

    public function students(Request $request)
    {
        $studentItems = ['student'];
        $studentNotItems = ['consultant', 'paid_consultant', 'paid_mentor', 'mentor'];

        if (empty($request->all())) {
            $items = UserRoleInformation::query()
                ->selectRaw('user_role_information.*, AVG(user_reviews.rate) as rate, COUNT(user_reviews.reviewer_id) as count')
                ->leftJoin('user_reviews', function ($leftJoin) {
                    $leftJoin->on('user_reviews.reviewer_id', '=', 'user_role_information.id')
                        ->whereNull('user_reviews.parent_id');
                })
                ->whereIn('role_name', $studentItems)->where('is_activated', 1)
                ->whereNotIn('role_name', $studentNotItems)
                ->with(['user'])
                ->groupBy('id')
                ->orderByDesc('rate')
                ->paginate(10);
        } else {
            $withReviews = $request->input('withReviews');

            $freeItems = $request->input('free') ? ['student'] : null;
            $paidItems = $request->input('paid') ? ['student'] : null;

            $specializationsArray = (!empty($request->input('specialization_ids'))) ? array_keys($request->input('specialization_ids')) : null;
            $citiesArray = (!empty($request->input('cities'))) ? implode(' ', $request->input('cities')) : null;
            $reviewParameter = (!empty($request->input('reviewParameters'))) ? array_keys($request->input('reviewParameters')) : null;

            $onlineParameters = (!empty($request->input('onlineParameters'))) ? $request->input('onlineParameters') : null;
            if ($onlineParameters) {
                $onlineParameters = array_map(function ($element) {
                    if ($element == 'online') {
                        return Carbon::now()->subMinutes();
                    } elseif ($element == '5 days') {
                        return Carbon::now()->subDays(5);
                    } elseif ($element == '10 days') {
                        return Carbon::now()->subDays(10);
                    } elseif ($element == '20 days') {
                        return Carbon::now()->subDays(20);
                    } elseif ($element == '30 days') {
                        return Carbon::now()->subDays(30);
                    }
                }, $onlineParameters);
            }

            $items = UserRoleInformation::query()
                ->selectRaw('user_role_information.*, users.address, AVG(user_reviews.rate) as rate, COUNT(user_reviews.reviewer_id) as count')
                ->leftJoin('users', function ($leftJoin) {
                    $leftJoin->on('users.id', '=', 'user_role_information.user_id');
                })
                ->leftJoin('user_reviews', function ($leftJoin) {
                    $leftJoin->on('user_reviews.reviewer_id', '=', 'user_role_information.id')
                        ->whereNull('user_reviews.parent_id');
                })
                ->when($freeItems, function ($query, $freeItems) {
                    $query->whereIn('role_name', $freeItems);
                })
                ->when($paidItems, function ($query, $paidItems) {
                    $query->whereIn('role_name', $paidItems);
                })
                ->when($onlineParameters, function ($query, $onlineParameters) {
                    foreach ($onlineParameters as $key => $onlineParameter) {
                        if ($key == 0) {
                            $query->where('last_seen', '>=', $onlineParameter);
                        } else {
                            $query->orWhere('last_seen', '>=', $onlineParameter);
                        }
                    }
                })
                ->when($specializationsArray, function ($query, $specializationsArray) {
                    $query->whereIn('specialization_id', $specializationsArray);
                })
                ->when($reviewParameter, function ($query, $reviewParameter) {
                    $query->having('count', '>=', $reviewParameter);
                })
                ->when($citiesArray, function ($query, $citiesArray) {
                    $query->where('address', 'like', "%$citiesArray%");
                })
                ->when($withReviews, function ($query) {
                    $query->whereNotNull('rate');
                })
                ->where('is_activated', 1)
                ->whereNotIn('role_name', $studentNotItems)
                ->with(['user'])
                ->groupBy('id')
                ->orderByDesc('rate')
                ->paginate(10);
        }

        $count = $items->count();

        $specializations = Specialization::query()->get();
        $cities = City::query()->get();

        $pageTitle = 'Каталог учеников';
        $pageFilterRoute = 'students.index';

        return view('client.mentor.catalog', compact(['pageTitle', 'pageFilterRoute', 'items', 'count', 'specializations', 'cities']));
    }

    public function student($id)
    {
        $item = UserRoleInformation::query()->findOrFail($id);

        $visits = UserAccountView::query()
            ->where(['user_id' => $item->user_id, 'role_name' => $item->role_name])
            ->whereDate('created_at', Carbon::today())
            ->first();

        if (empty($visits)) {
            UserAccountView::query()->create([
                'user_id' => $item->user_id,
                'role_id' => $item->role_id,
                'role_name' => $item->role_name,
                'visited' => 1
            ]);
        } else {
            $visits->visited += 1;
            $visits->update();
        }

        $reviews = UserReview::query()
            ->whereNull('parent_id')
            ->where(['reviewer_id' => $item->id])
            ->with('userRoleInformation', 'parentReviews', 'checkParentReview')
            ->orderByDesc('id')
            ->get();

        $myReview = false;
        $userInformation = null;

        if (auth()->check()) {
            $userInformation = auth()->user()->roleInformation()->first();

            $myReview = 0;
            foreach ($reviews->toArray() as $review) {
                if ($review['user_id'] == $userInformation->id) {
                    $myReview++;
                }
            }
        }

        return view('client.mentor.mentor', compact(['item', 'reviews', 'myReview', 'userInformation']));
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

