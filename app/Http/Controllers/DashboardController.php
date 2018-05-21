<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\User;
use App\Project;
use App\Value;

use Illuminate\Support\Facades\Gate;
class DashboardController extends Controller
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
        if ( Gate::allows('view_dashboard')) {
            $users = User::orderBy('created_at', 'desc')->get();
            $tasks = Task::orderBy('created_at', 'DESC')->with(['assignedBy', 'project', 'assignedTo'])->get();
            $projects = Project::orderBy('created_at', 'DESC')->with(['creator'])->get();
            $reports = Value::all();

            return view('dashboard.index', compact('users', 'tasks', 'projects', 'reports'));

        }
        else {
            return redirect()->back()->withErrors("You are not authorized for this action");
        }
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
