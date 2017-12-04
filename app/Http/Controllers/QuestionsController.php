<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;

use Illuminate\Support\Facades\Input;


class QuestionsController extends Controller
{
    public $restful=true;


    public function index(){
        $title='Make Your Good Questions ';
        $questions=Question::where('solved','=',0)->get();
        return view('questions.index',compact('title','questions'));
    }
    public function ask(Request $request){
        $this->validate($request,[
          'question'=>'required|min:5|max:255',
          'boolean'=>'in:1,0'
        ] );
        $question=new Question();
        $question->question=$request->question;
        $question->user_id=$request->user_id;
        $question->save();
        return redirect('/');
    }
    public function show($id){
        $question =DB::table('questions')->find($id);
        $answers=Answer::where('question_id','=',$question->id)->get();
        $title='Make Your Good Questions ';
        return view('questions.show',compact('question','title','answers'));
    }
    public function your_questions(){
        $questions=Question::where('user_id','=',Auth::user()->id)->get();
        $username=Auth::user()->username;
        $title=' Make Your Good Questions - Your Questions';
        return view('questions.your-questions',compact('questions','username','title'));
    }
    public function edit(Question $question,$id){
        $question=Question::find($id);
        $title='Edit Your Question';
        return view('questions.edit',compact('question','title'));
    }
    public function update(Request $request,$id){
        $question=Question::find($id);
        if (Input::get('solved')== true){
            $question->solved=1;

            $question->save();

        }
        else{
            $question->solved=0;

            $question->save();
        }
        $question->question=$request->question;
        $question->save();


        return redirect('/your-questions');
    }
    public function destroy($id){
        Question::destroy($id);
        return redirect('/your-questions');
    }
    public function search(Request $request){
        $search=$request->search;
        $title='Make Your Good Questions - Search Results';
        $questions=Question::where('question','LIKE','%'.$search.'%')->orderBy('created_at')->get();
        return view('questions.results',compact('questions','title'));

    }

}
