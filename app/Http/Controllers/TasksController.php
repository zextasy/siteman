<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\User;
use App\Project;
use Illuminate\Support\Facades\Mail;
use App\Mail\TaskMail;
use App\AppoveMail;
use App\RejectMail;
use App\UpdateTaskMai;
use App\WithdrawnTaskMail;
use App\ReAssigned;

use Illuminate\Support\Facades\Gate;


class TasksController extends Controller
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
        //Gate::check('create_task')|| Gate::check('view_task')|| Gate::check('edit_task')|| Gate::check('delete_task')
        if ( Gate::allows('edit_task')) { 
            $tasks = Task::orderBy('created_at', 'DESC')->with(['assignedBy', 'project', 'assignedTo'])->get();

            return view('tasks.index', compact('tasks'));
        }
        else {
            return redirect()->back()->withErrors("You are not authorized for this action");
        }

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_personal()
    {
        //
                //Gate::check('create_task')|| Gate::check('view_task')|| Gate::check('edit_task')|| Gate::check('delete_task')
        if ( Gate::allows('view_task')) { 
            $tasks = \Auth::user()->assignedTasks();

            return view('tasks.index', compact('tasks'));

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
        if ( Gate::allows('create_task')) { 
                    $users = User::all();
        $projects = Project::all();

        return view('tasks.create', compact('users', 'projects'));
        }
        else {
            return redirect()->back()->withErrors("You are not authorized for this action");
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ( Gate::allows('create_task')) { 
                    //
        $tasks = new Task();
        $tasks->task_name = $request->get('task_name');
        $tasks->task_description = $request->get('task_description');
        $tasks->start_date = $request->get('start_date');
        $tasks->end_date = $request->get('end_date');
        $tasks->project_id = $request->get('project_id');
        $tasks->assigned_to = $request->get('assigned_to');
        $tasks->assigned_by = \Auth::user()->id;
        $tasks->task_status_id = $request->get('task_status_id');

        $tasks->save();
        $user = User::where('id', $tasks->assigned_to)->first();

       // Mail::to($user->email)
       // ->send(new taskMail($tasks, $user));


        return redirect()->back();
        }
        else {
            return redirect()->back()->withErrors("You are not authorized for this action");
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
                
        if ( Gate::allows('view_task')) { 
                    $tasks = Task::where('id', $id)->first();
        return view('tasks.show', compact('tasks'));
        }
        else {
            return redirect()->back()->withErrors("You are not authorized for this action");
        }
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
                
        if ( Gate::allows('edit_task')) { 
                    $users = User::all();
        $tasks = Task::findOrfail($id);


        return view('tasks.edit', compact('tasks', 'users'));
        }
        else {
            return redirect()->back()->withErrors("You are not authorized for this action");
        }
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
        if ( Gate::allows('edit_task')) { 
            $tasks = Task::findOrFail($id);
            $tasks->task_name = $request->get('task_name');
            $tasks->task_description = $request->get('task_description');
            $tasks->start_date = $request->get('start_date');
            $tasks->end_date = $request->get('end_date');
            $tasks->project_id = $request->get('project_id');
            $tasks->assigned_to = $request->get('assigned_to');
            $tasks->assigned_by = \Auth::user()->id;
            $tasks->task_status_id = $request->get('task_status_id');

            if($tasks->assigned_to = $request->assigned_to)
            {
              $tasks->assigned_to = $request->assigned_to;
            }
            else{
              $tasks->re_assigned_to = $assigned;
            }

            $tasks->update();

            if($tasks->assigned_to == $assigned)
            {
              $user = User::findOrFail($assigned);
              Mail::to($user->email)->send(new updateTask($tasks, $user));
            }else{
              $user = User::findOrFail($tasks->re_assigned_to);
              Mail::to($user->email)->send(new reAssignedTask($tasks, $user));

              $withdraw_task_user = User::findOrFail($tasks->assigned_to);
              Mail::to($withdraw_task_user->email)->send(new withdrawnTask($tasks, $user));
            }

            flash('Task Updated Successfully')->success();
            return redirect()->back();
        }
        else {
            return redirect()->back()->withErrors("You are not authorized for this action");
        }
        //

    }


    public function delete($id)
    {
        //
        if ( Gate::allows('delete_task')) { 
            $tasks = Task::findOrFail($id);
          return view('tasks.delete', compact('tasks'));
        }
        else {
            return redirect()->back()->withErrors("You are not authorized for this action");
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                
        if ( Gate::allows('delete_task')) { 
            $tasks = Task::findOrFail($id);
            $tasks->delete();

            return redirect('tasks/')->with('success', 'Task successfully deleted');
        }
        else {
            return redirect()->back()->withErrors("You are not authorized for this action");
        }
        //

    }


    public function approve($id)
    {
                
        if ( Gate::allows('approve_task')) { 
                    //dd('about to approve');
        $tasks = Task::findOrFail($id);
        return view('tasks.approve', compact('tasks'));
        }
        else {
            return redirect()->back()->withErrors("You are not authorized for this action");
        }

    }

    public function update_approve(Request $request, $id)
    {
        if ( Gate::allows('approve_task')) { 
                    $tasks = Task::findOrFail($id);
        if($request->approve == 'approve')
        {
            $tasks->approval = 1;
            $tasks->update();
            if($tasks->re_assign_to == null){
            $user = User::where('id', $tasks->assigned_to)->firstOrFail();
             }
             else{
            $user = User::where('id', $tasks->re_assigned_to)->firstOrFail();
             }
            // Mail::to($user->email)->send(new ApproveTask($tasks, $user));
            flash('Task Approved Successfully')->success();
        }
        else if($request->approve == 'reject')
        {
            $tasks->approval = 2;
            $tasks->update();
            if($tasks->re_assign_to == null){
            $user = User::where('id', $tasks->assigned_to)->firstOrFail();
             }
             else{
            $user = User::where('id', $tasks->re_assigned_to)->firstOrFail();
             }
                // Mail::to($user->email)->send(new RejectTask($tasks, $user));
            flash('Task Disapproved')->success();
        }


        return redirect('/tasks');

        }
        else {
            return redirect()->back()->withErrors("You are not authorized for this action");
        }

    }



}
