<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\User;

class MessagesController extends Controller
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
        $human = User::with(['mailmessages'])->where('id', \Auth::user()->user_id)->first();

        return view('mailmessages.index', compact('mailmessages', 'user', 'human'));
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

    public function sendMail(Request $request)
    {
        $user = [];
        //dd($request->general_infos);
        $recipient_ids = [];
        foreach($request->general_infos as $id)
        {
            $genInfo = GeneralInfo::where('id', $id)->first();
            array_push($genInfos, $genInfo);
            array_push($recipient_ids, $id);
        }

        $title = $request->title;
        $note = $request->note;

        $message = new Message();
        $message->title = $request->title;
        $message->note = $request->note;
        $message->sender_id =\Auth::user()->id;
        //$message->app_name = config('app.name');
        $message->save();

        //$message->attach($geninfo_ids);


        $message->generalinfos()->sync($recipient_ids);
        foreach($genInfos as $data)
        {
            //Mail::to($data->email)->send(new SendMail($title, $note, $data, $message));
            //Mail::to($data->email)->send(new SendMail($title, $note, $data, $message));
            return new SendMail($title, $note, $data, $message);
        }

        return redirect()->back();
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
