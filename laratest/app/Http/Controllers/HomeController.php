<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use App\Http\Requests\UserRequest;

class HomeController extends Controller
{
    public function index( Request $req){

        $name = "alamin";
        $id = "123";

        //return view('home.index', ['name'=> 'xyz', 'id'=>12]);
        // return view('home.index')
        //         ->with('name', 'alamin')
        //         ->with('id', '12');

        // return view('home.index')
        //         ->withName($name)
        //         ->withId($id);

        return view('home.index', compact('id', 'name'));

    }

    public function show($id){

        $user = User::find($id);
        //print_r($user);
        return view('home.details')->with('user', $user);
    }

    public function create(){
        return view('home.create');
    }

    public function store(UserRequest $req){

/*
        $this->validate($req, [
            'username' => 'required|max:5',
            'password' => 'required|min:6'
        ])->validate();*/

        /*$req->validate([
            'username' => 'required|max:5',
            'password' => 'required|min:6'
        ])->validate();*/

        //$validation->validate();

        /*$validation = Validator::make($req->all(), [
            'username' => 'required|max:5',
            'password' => 'required|min:6'
        ]);

        if($validation->fails()){
         //   return redirect()->route('home.create')->with('errors', $validation->errors());

            return Back()->with('errors', $validation->errors())->withInput();            
        }*/

        if($req->hasFile('myfile')){
            $file = $req->file('myfile');  
            /*echo $file->getClientOriginalName()."<br>";  
            echo $file->getClientOriginalExtension()."<br>";  
            echo $file->getSize()."<br>";*/
            //$file->move('upload', $file->getClientOriginalName());
            
            $filename = time().".".$file->getClientOriginalExtension();
            
            $file->move('upload', $filename);

            $user = new User();
            $user->username     = $req->username;
            $user->password     = $req->password;
            $user->name         = $req->name;
            $user->dept         = $req->dept;
            $user->type         = $req->type;
            $user->cgpa         = $req->cgpa;
            $user->profile_img = $filename;
            $user->save();
            return redirect()->route('home.userlist');

        }

        

    }

    public function edit($id){
        
        $user = User::find($id);
        return view('home.edit')->with('user', $user);
    }


    public function update($id, Request $req){

        $user = User::find($id);
        
        $user->username = $req->username;
        $user->name     = $req->name;
        $user->password = $req->password;
        $user->dept     = $req->dept;
        $user->type     = $req->type;
        $user->save();

        return redirect('/home/userlist');
    }

    public function userlist(){
        
        $userlist = User::all();
        //$userlist = $this->getUserlist();
        return view('home.list')->with('list', $userlist);
    }

    /*public function getUserlist (){

        return [
                ['id'=>1, 'name'=>'alamin', 'email'=> 'alamin@aiub.edu', 'password'=>'123'],
                ['id'=>2, 'name'=>'abc', 'email'=> 'abc@aiub.edu', 'password'=>'456'],
                ['id'=>3, 'name'=>'xyz', 'email'=> 'xyz@aiub.edu', 'password'=>'789']
            ];
    }*/

    public function delete($id){

        $user = User::find($id);
        return view('home.delete')->with('user', $user);
    }

    public function destroy($id){

        if(User::destroy($id)){
            return redirect('/home/userlist');
        }else{
            return redirect('/home/delete/'.$id);
        }

    }
}
