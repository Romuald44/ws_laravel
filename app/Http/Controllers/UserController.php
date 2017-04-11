<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return json_encode($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->username = (!empty($request->input('username'))) ? $request->input('username') : '';
        $user->user_email = (!empty($request->input('user_email'))) ? $request->input('user_email') : '';
        $user->user_role = (!empty($request->input('user_role'))) ? $request->input('user_role') : '';
        $user->user_status = (!empty($request->input('user_status'))) ? $request->input('user_status') : '';
        $user->save();
        return response('Enregistrement '.json_encode($user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return json_encode($user);
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
        $user = User::find($id);
        $user->username = (!empty($request->input('username'))) ? $request->input('username') : '';
        $user->user_email = (!empty($request->input('user_email'))) ? $request->input('user_email') : '';
        $user->user_role = (!empty($request->input('user_role'))) ? $request->input('user_role') : '';
        $user->user_status = (!empty($request->input('user_status'))) ? $request->input('user_status') : '';
        $user->save();
        return response('Mise a jour '.json_encode($user));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return response('Suppression de l\'enregistrement numero : '.$id);
    }
}
