<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRoleInformation;
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

    public function catalog()
    {
        $mentors = UserRoleInformation::query()
            ->with('user')
            ->where(['role_name' => 'mentor', 'is_activated' => 1])
            ->get();

        $count = $mentors->count();

        return view('client.catalog', compact(['mentors','count']));
    }

    public function mentor($id)
    {
        $mentor = UserRoleInformation::query()->findOrFail($id);
        return view('client.mentor', compact(['mentor']));
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
