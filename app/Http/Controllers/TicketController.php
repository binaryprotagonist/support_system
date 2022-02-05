<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\TaskStatus;
use App\Models\Tickets;
use App\Models\TicketAttachments;
use App\Models\User;

class TicketController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Tickets::with('ticket_status', 'ticket_assigned_to')->where('client_id',Auth::user()->id)->latest()->paginate(20);
        return view('client.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $client_id = Auth::user()->id;
        $input['client_id'] = $client_id;
        $input['status'] = 1;
        //Randomly assign to any support user
        $input['assigned_to'] = User::where('is_admin', 1)->inRandomOrder()->limit(1)->first()->id;
        Tickets::create($input);
        return redirect()->route('client.ticket');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Tickets::with('ticket_status', 'ticket_assigned_to','ticketAttachments')->find($id);
        return view('client.detail', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Tickets::with('ticket_status', 'ticket_assigned_to','ticketAttachments')->find($id);
        $status = TaskStatus::all();
        $users = User::where('is_admin',1)->get();
        return view('support.detail', compact('ticket','status','users'));
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
        $input = $request->validate([
            'status' => 'required',
            'assigned_to' => 'required',
        ]);

        Tickets::where('id', $id)
            ->update($input);

        $tmpFilePath = $_FILES['attachment']['tmp_name'];
        if($tmpFilePath){
               $file = time(). \Auth::user()->id.'.'.$request->file('attachment')->getClientOriginalExtension();
                move_uploaded_file($tmpFilePath,public_path('ticket_attachments') . '/' . $file);
                $fileOriginalName = $request->file('attachment')->getClientOriginalName();
                $attach = new TicketAttachments;
                $attach->ticket_id = $id;
                $attach->attachment = $file;
                $attach->save();
            }

        return redirect()->route('support.ticket.show',$id);
    }

    /**
     * Display a support tickets of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $tickets = Tickets::with('ticket_status', 'ticket_client')->where('assigned_to',Auth::user()->id)->latest()->paginate(20);
        return view('support.index', compact('tickets'));
    }

}
