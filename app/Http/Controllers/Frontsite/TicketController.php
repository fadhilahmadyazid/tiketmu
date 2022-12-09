<?php

namespace App\Http\Controllers\Frontsite;

use App\Http\Controllers\Controller;


// use library here
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

// use everything here
use Illuminate\Support\Facades\Gate;
// use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Auth;

// use model here
use App\Models\User;
use App\Models\Operational\Event;
use App\Models\Operational\Ticket;
use App\Models\MasterData\JenisTiket;
use Illuminate\Support\Facades\Request as FacadesRequest;

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
        return abort(404);
        //return view('pages.frontsite.ticket.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $ticket = new Ticket();
        $ticket->event_id = $data['event_id'];
        $ticket->user_id = Auth::user()->id;
        $ticket->jenistiket_id = $data['jenistiket_id'];
        $ticket->status = 2; // set to waiting payment
        $ticket->save();

        return redirect()->route('payment.ticket', $ticket->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort(404);
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
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort(404);
    }

    public function ticket($id)
    {
        $event = Event::where('id', $id)->first();
        $jenistiket = JenisTiket::orderBy('name', 'asc')->get();

        return view('pages.frontsite.ticket.index', compact('event, jenistiket'));
    }
}


