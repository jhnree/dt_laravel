<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\User;
use Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("login");
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function checkPassword(Request $request){
        $validation = Validator::make($request->all(),[
            'username' => 'required',
            'password' => 'required',
        ]);

        if($validation->fails()){
            return 1;
        }

        $user = User::where('username', $request->username)->first();
        if($user){
            if($user->password == $request->password ){
                Auth::login($user);
                return 'success';
            }
            else{
                return 'Incorrect password';
            }
        }else{
            return 'error';
        }
        return $request;
    }

    public function select(Request $request){
        $validation = Validator::make($request->all(),[
            'username' => 'required',
        ]);

        if($validation->fails()){
            return $validation->messages();
        }

        $user = User::where('username', $request->username)->first();
        if($user){
            return 'success';
        }
        else
        {
            return 'nouser';
        }
        return $request->username;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
