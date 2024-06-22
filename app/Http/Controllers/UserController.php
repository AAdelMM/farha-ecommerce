<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $users = DB::table('users')->paginate(15);
        return view('users.index', ['users' => $users]);
        // return view('users.index', ['users' => $model->paginate(15)]);
    }

         public function create(){

            return view('users.create');
         
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
    $insertQuery = DB::table('users')->insert([
        'name' => $request->name, 
        'email' => $request->email, 
        'account_type' => $request->account_type, 
        'password' => Hash::make($request->password),
        'created_at'=> Carbon::now(),]);

if($insertQuery){
    $users = DB::table('users')->paginate(15);
        return view('users.index', ['users' => $users]);
}else{
    $users = DB::table('users')->paginate(15);
        return view('users.index', ['users' => $users]);
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
        $users = DB::table('users')->paginate(15);
        return view('users.index', ['users' => $users]);
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
    public function destroy(Request $request)
    {
        //
         $deleted = DB::table('users')->where('id', '=', $request->id)->delete();
         if($deleted){
            $users = DB::table('users')->paginate(15);
        return view('users.index', ['users' => $users]);
         }
    }
    
}

