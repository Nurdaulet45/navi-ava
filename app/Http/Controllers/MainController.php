<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function index()
    {
        return view('client.index');
    }

    public function langSwitch(Request $request)
    {
        $lang = $request->input('lang', User::DEFAULT_LANG);
        if (!in_array($lang, User::LANGUAGES)) {
            $lang = User::DEFAULT_LANG;
        }
        Session::put('locale', $lang);
        App::setLocale( Session::get('locale'));
        return redirect()->back();
    }
}
