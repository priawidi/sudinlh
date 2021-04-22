<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Hash;
use Validator;
use Session;
use Alert;

class ManjUserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users_list = User::all();
        return view('user.manjuser', compact('users_list')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.adduser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20|unique:users',
            'username' => 'required',
            'email' => 'required|max:50|string|email|max:255|unique:users',
            'password' => 'required|min:4',
        ]);

        if ($validator->fails()) {
            
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new User;
        $user->name = ucwords(strtolower($request->name));
        $user->username = ucwords(strtolower($request->username));
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $user->email_verified_at = \Carbon\Carbon::now();
        if ($user->save()) {
            return redirect('manjuser')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect('manjuser')->with('error', 'error message');
        }
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
        $users_list = User::find($id);
        return view('user.edituser',compact('users_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20',
            'username' => 'required',
            'email' => 'required|max:50|string|email|max:255',
            
        ]);

        if ($validator->fails()) {
            
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::find($id);
        $user->update([
            'name' => ucwords(strtolower($request->name)),
            'username' => ucwords(strtolower($request->username)),
            'email' => ucwords(strtolower($request->email)),
            
            ]);
        
            if ($user->save()) {
                return redirect('manjuser')->with('success', 'Data Berhasil Diupdate');
            } else {
                return redirect('manjuser')->with('error', 'error message');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    protected function destroy(Request $request, $id) 
    { 
       User::where('id',$id)->delete();

       return redirect()->back();
    }
}
