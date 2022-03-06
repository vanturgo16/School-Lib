<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::orderBy('id','desc')
        ->get();

        return view('user.index',compact('users'));
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
        $request->validate([
            'email' => 'required',
            'name' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);

        $store=User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->role,
            'is_active' => '1',
            'login_counter' => '0',
        ]);

        if($store){
            return redirect('/masters/users')->with('status','Success Create User');
        }
        else{
            return redirect('/masters/users')->with('status','Failed Create User');
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

    public function ActiveUser($id)
    {
        $activate=User::where('id',$id)
        ->update([
            'is_active' => '1',
        ]);

        if($activate){
            return redirect('/masters/users')->with('status','Success Activate User');
        }
        else{
            return redirect('/masters/users')->with('status','Failed Activate User');
        }
    }

    public function RevokeUser($id)
    {
        $revoke=User::where('id',$id)
        ->update([
            'is_active' => '0',
        ]);

        if($revoke){
            return redirect('/masters/users')->with('status','Success Revoke User');
        }
        else{
            return redirect('/masters/users')->with('status','Failed Revoke User');
        }
    }
}
