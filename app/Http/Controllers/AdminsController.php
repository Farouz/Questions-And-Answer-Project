<?php

namespace App\Http\Controllers;

use App\Question;
use App\User;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function index(){
        $title='Admin Control';
        $users=User::all();
        $questions=Question::all();
        return view('admins.admin',compact('title','users','questions'));
    }
    public function destroy($id){
        Question::destroy($id);
        return back();
    }
    public function deleteUser($id){
        User::destroy($id);
        return back();
    }
    public function makeAdmin($id){
        $user=User::find($id);
        if (\request('makeAdmin')== true){
            $user->is_admin=1;

            $user->save();

        }
        else{
            $user->is_admin=0;

            $user->save();
        }

        $user->save();


        return redirect('/admin');
    }

}
