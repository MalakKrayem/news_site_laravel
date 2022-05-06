<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users=User::orderBy('created_at','desc')->paginate(20);
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.addUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'name'=>'required|unique:users|max:15|min:5|string',
            'email'=>'email:rfc,dns|unique:users|',
            'password'=>'required|min:8'
        ];
        $messages=[
            'name.required'=>'You should add name!',
            'name.unique'=>'This name already exists!',
            'email.unique'=>'This email already exists!',
            'name.max'=>'Your name can not be more than 15 charachter! ',
            'name.min'=>'Your name can not be less than 5 charachter! ',
            'name.string' =>'Your name should be string!',
            'password.required'=>'You should add password!',
            'password.min'=>'Your password can not be less than 8 charachter! ',
        ];
        $validator=Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->email_verified_at=now();
        $user->save();
        return redirect()->route('user.index')->with('success','User added successfuly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.viewinfo',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.editUser',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules=[
            'name'=>'require|max:15|min:5|string',
            'email'=>'email:rfc,dns',
            'password'=>'required|min:8'
        ];
        $messages=[
            'name.required'=>'You should add name!',
            'name.max'=>'Your name can not be more than 15 charachter! ',
            'name.min'=>'Your name can not be less than 5 charachter! ',
            'name.string' =>'Your name should be string!',
            'password.required'=>'You should add password!',
            'password.min'=>'Your password can not be less than 8 charachter! ',
        ];
        $validator=Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->email_verified_at=now();
        $user->save();
        return redirect()->route('user.index')->with('success','User updated successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }
}
