<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users=User::paginate(2);

        return view('pages.user.index', compact('users'));
    }

    public function create(){

        return view('pages.user.create');
    }


    public function store(Request $request){


        $request->validate([
            'name'=>'required|min:3',
            'email'=>"required|email",
            'phone'=>"required|min:4|numeric",
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ],[
            // 'address.in'=>"Address must be inbetween Dhaka or Rajshahi",
        ]);



        $user= new User();
        $user->name= $request->name;
        $user->email= $request->email;
        $user->phone= $request->phone;

        $photoname=$request->name.".".$request->file('photo')->extension();
        $request->file('photo')->move(public_path('photo'), $photoname);

        $user->photo= $photoname;

        if($user->save()){
            return redirect('user')->with('success', "User has been Added");
         } ;

    }


    public function edit($id){

        $users= User::find($id);

        return view('pages.user.update', compact('users'));
    }



    public function update(Request $request, $id){

        $user=User::find($id);
        $user->name= $request->name;
        $user->email= $request->email;
        $user->phone= $request->phone;

        $photoname=$request->name.".".$request->file('photo')->extension();
        $request->file('photo')->move(public_path('photo'), $photoname);

        $user->photo= $photoname;

        if($user->save()){
            return redirect('user')->with('success', "User has been Updated");
         } ;

    }

    public function destroy_view($id){

        $users= User::find($id);

        return view('pages.user.delete', compact('users'));
    }


    public function destroy(Request $request, $id){

        $users= User::destroy($id);

        if($users){
            return redirect('user')->with('success', "User has been Deleted");
         };
    }

    public function search(Request $request)
    {
        $users= User::where('name',"like", "%{$request->name}%" )->paginate(2);

        $requestdata= $request->name;

        // return view('pages.user.index' , compact('users','requestdata'));

        if($users){
            return view('pages.user.index' , compact('users','requestdata'));
         }else{
            $users=[];
         }
    }



    public function show($id){

        $users=User::find($id);

        return view('pages.user.show', compact('users'));
    }

}
