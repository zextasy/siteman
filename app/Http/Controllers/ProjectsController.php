<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;

use Illuminate\Support\Facades\Gate;

class ProjectsController extends Controller
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
        $active_page = 'projects';
        $projects = Project::orderBy('created_at', 'DESC')->with(['creator'])->get();

        return view('projects.index', compact('projects', 'active_page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //dd('hello');

        return view('projects.create');
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
        $projects = new Project();
        $projects->project_name = $request->get('project_name');
        $projects->project_description = $request->get('project_description');
        $projects->start_date = $request->get('start_date');
        $projects->end_date = $request->get('end_date');
        $projects->created_by = \Auth::user()->id;

        $projects->save();

        return redirect('projects/')->with(['success'=>'Project Details saved successfully']);

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
        $projects = Project::where('id', $id)->get();
        return view('projects.show', compact('projects'));
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
        $projects = Project::where('id', $id)->first();
        return view('projects.edit', compact('projects'));
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
        $projects = Project::findOrFail($id);
        $projects->update($request->all());

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function delete($id)
    {
        $projects = Project::where('id', $id)->first();
        return view('projects.delete', compact('projects', 'pro'));
    }


    public function destroy($id)
    {
        //
        $projects = Project::findOrFail($id);
        $projects->delete();
        return redirect('projects/')->with('success', 'Project Information Successfully Deleted');
    }
}
