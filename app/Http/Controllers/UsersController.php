<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\userRegMail;

use Illuminate\Support\Facades\Gate;
use App\Notifications\MailNotification;


class UsersController extends Controller
{
        // constructor
        public function __construct()
    {
        // add authentication
         $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $human = User::orderBy('created_at', 'desc')->get();

        return view('users.admin.index', compact('human'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.admin.create');
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
        $human = new User();
        $human->name = $request->get('name');
        $human->email = $request->get('email');
        $human->title = $request->get('title');
        $human->password = bcrypt($request->get('password'));
        $human->phone_number = $request->get('phone_number');
        $human->gender = $request->get('gender');
        $human->created_by = \Auth::user()->id;
        // $users->department = $request->get('department');
        // $users->country = $request->get('country');
        // $user->role = $request->get('role');

        if(isset($request->profile_image)){
        $image = $request->file('profile_image');
        $filename = 'molcom'.time().'.'.$image->getClientOriginalExtension();
        $request->file('profile_image')->move(public_path().'/images/users', $filename);
      $human->profile_image = 'images/users/'. $filename;

      }


    $human->save();


     //Mail::to($human->email)
     //->send(new userRegMail($human));


   flash('Success Creating New User', 'success');

 return redirect()->back();
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
        $human = User::where('id', $id)->get();
        return view('users.admin.show', compact('human'));
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
         $human = User::where('id', $id)->first();
        return view('users.admin.edit', compact('human'));
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
        $human = User::findOrFail($id);
        $human->update($request->all());

        flash('Success Updating User Information', 'success');

        return redirect()->back();
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
