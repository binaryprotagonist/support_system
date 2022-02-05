<?php
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Auth;
use App\Models\Tickets;
class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()

    {
        $ticket = Tickets::where('client_id',Auth::user()->id)->count();
        return view('client.dashboard',compact('ticket'));
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function support()
    {
        $ticket = Tickets::where('assigned_to',Auth::user()->id)->count();
        return view('support.dashboard',compact('ticket'));
    }
    
}