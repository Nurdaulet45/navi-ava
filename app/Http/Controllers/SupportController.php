<?php

namespace App\Http\Controllers;

use App\Http\Requests\Support\SupportQuestionSaveRequest;
use App\Models\SupportQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupportController extends Controller
{
    public function index()
    {
        return view('client.support');
    }
    public function storeQuestion(SupportQuestionSaveRequest $request)
    {
        DB::beginTransaction();
        $supportQuestion = new SupportQuestion();
        $supportQuestion->email = $request->email;
        $supportQuestion->phone = $request->phone;
        $supportQuestion->text = $request->text;
        $supportQuestion->user_id = auth()->check() ? auth()->user()->id : null;
        $supportQuestion->save();
        DB::commit();
        return redirect()->back()->withSuccess('Ваш вопрос успешно отправлен');
    }
}
