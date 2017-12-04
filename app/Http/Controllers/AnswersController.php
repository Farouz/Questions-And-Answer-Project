<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;

class AnswersController extends Controller
{
    public function create(Request $request){
        $this->validate($request,['answer'=>'required|min:5|max:200']);
        $answer=new Answer();
        $answer->answer=$request->answer;
        $answer->user_id=$request->user_id;
        $answer->question_id=$request->question_id;
        $answer->save();
        return back();

    }
}
