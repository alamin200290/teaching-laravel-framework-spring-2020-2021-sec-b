<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index(){

        return view('login.index');
    }

    public function verify(Request $req){

        /* $user = User::where('password', $req->password)
                    ->where('username', $req->username)
                    ->get(); */
        //echo count($user);

        $user = DB::table('user_table')
                    ->where('password', $req->password)
                    ->where('username', $req->username)
                    ->get();


        if($req->username == "" || $req->password == ""){
           $req->session()->flash('msg', 'null username or password...');
           return redirect('/login');

        }elseif(count($user) > 0 ){
            //$req->session()->put('password', $req->password);
            //$req->session()->get('name');
            //$req->session()->forget('name');
            //$req->session()->flush();
            //$req->session()->has('name');

            //$req->session()->flash('msg', 'Invalid user info...');
            //$req->session()->flash('error', 'Bad request error...');
            //$req->session()->get('msg');
            //$req->session()->keep('msg');
            //$req->session()->get('msg');
            //$req->session()->reflash();
            //$req->session()->pull('name');

            $req->session()->put('username', $req->username);
            return redirect('/home');
        }else{

            $req->session()->flash('msg', 'Invalid username or password...');
            return redirect('/login');
        }
    }
}
