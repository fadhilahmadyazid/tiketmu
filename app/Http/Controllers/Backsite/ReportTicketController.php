<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;

// use library here
use Illuminate\Support\Facades\Storage;
use Spatie\FlareClient\Http\Response;
use Illuminate\Support\Facades\Request;

// use everything here
use Illuminate\Support\Facades\Gate;
// use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Auth;

// use model here
use App\Models\Operational\Ticket;
use App\Models\Operational\Event;
use App\Models\Operational\Transaction;
use App\Models\User;

// thirdparty package

class ReportTicketController extends Controller
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
        abort_if(Gate::denies('ticket_access'), 403, '403 Forbidden');

        $type_user_condition = Auth::user()->detail_user->type_user_id;

        if($type_user_condition == 1){
            // for admin
            $ticket = Ticket::orderBy('created_at', 'desc')->get();
        }else{
            // other admin for event & user ( task for everyone here )
            $ticket = Ticket::orderBy('created_at', 'desc')->get();
        }

        return view('pages.backsite.operational.Ticket.index', compact('ticket'));
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
        return abort(404);
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
}
