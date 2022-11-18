<?php

namespace App\Http\Controllers\Frontsite;

use App\Http\Controllers\Controller;

// use library here
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

// use everything here
// use Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\Gate;

// use model here
use App\Models\User;
use App\Models\Operational\Event;
use App\Models\Operational\Ticket;
use App\Models\Operational\Transaction;
use App\Models\MasterData\ConfigPayment;

// thirdparty package

class PaymentController extends Controller
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

        $ticket = ticket::where('id', $data['ticket_id'])->first();
        $config_payment = ConfigPayment::first();

        // set transaction
        $specialist_fee = $ticket->event->specialist->price;
        $event_price = $ticket->event->fee;
        $hospital_fee = $config_payment->fee;
        $hospital_vat = $config_payment->vat;

        // total
        $total = event_price + $hospital_fee;

        // total with vat and grand total
        $total_with_vat = ($total * $hospital_vat) / 100;
        $grand_total = $total + $total_with_vat;

        // save to database
        $transaction = new Transaction;
        $transaction->ticket_id = $ticket['id'];
        $transaction->price_event = $event_fee;
        $transaction->fee_specialist = $specialist_fee;
        $transaction->fee_hospital = $hospital_fee;
        $transaction->sub_total = $total;
        $transaction->vat = $total_with_vat;
        $transaction->total = $grand_total;
        $transaction->save();

        // update status ticket
        $ticket = ticket::find($ticket->id);
        $ticket->status = 1; // set to completed payment
        $ticket->save();

        return redirect()->route('payment.success');
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


    // custom

    public function payment($id)
    {
        $ticket = ticket::where('id', $id)->first();
        $config_payment = ConfigPayment::first();

        // set value
        //$specialist_fee = $ticket->event->specialist->price;
        $event_price = $ticket->event->fee;

        //$hospital_fee = $config_payment->fee;
        //$hospital_vat = $config_payment->vat;

        $total = $event_price ;

        //$total_with_vat = ($total * $hospital_vat) / 100;
        $grand_total = $total;

        return view('pages.frontsite.payment.index', compact('ticket', 'config_payment', 'grand_total', 'id'));
    }

    public function success()
    {
        return view('pages.frontsite.success.payment-success');
    }
}
