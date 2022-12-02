<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;

// use library here
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
//use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Response;
//use Spatie\Backtrace\File;
use Illuminate\Http\File;

// request
use App\Http\Requests\Event\StoreEventRequest;
use App\Http\Requests\Event\UpdateEventRequest;

// use everything here
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Auth;

//use Symfony\Component\HttpFoundation\File\File;

// use model here
use App\Models\Operational\Event;


// thirdparty package

class EventController extends Controller
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
        abort_if(Gate::denies('doctor_access'), 403, '403 Forbidden');

        // for table grid
        $event = Event::orderBy('created_at', 'desc')->get();

        // for select2 = ascending a to z
        //$specialist = Specialist::orderBy('name', 'asc')->get();

        return view('pages.backsite.operational.event.index', compact('event'));
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
    public function store(StoreEventRequest $request)
    {
        // get all request from frontsite
        $data = $request->all();

        // re format before push to table
        $data['price'] = str_replace(',', '', $data['price']);
        $data['price'] = str_replace('IDR ', '', $data['price']);

        // upload process here
        $path = public_path('app/public/assets/file-event');
        if(!Storage::isDirectory($path)){
            $response = Storage::makeDirectory('public/assets/file-event');
        }

        // change file locations
        if(isset($data['cover'])){
            $data['cover'] = $request->file('cover')->store(
                'assets/file-event', 'public'
            );
        }else{
            $data['cover'] = "";
        }

        // store to database
        $event = Event::create($data);

        alert()->success('Success Message', 'Successfully added new event');
        return redirect()->route('backsite.event.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        abort_if(Gate::denies('event_show'), 403, '403 Forbidden');

        return view('pages.backsite.operational.event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        abort_if(Gate::denies('event_edit'), 403, '403 Forbidden');

        // for select2 = ascending a to z
        // $specialist = Specialist::orderBy('name', 'asc')->get();

         return view('pages.backsite.operational.event.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        // get all request from frontsite
        $data = $request->all();

        // re format before push to table
        $data['price'] = str_replace(',', '', $data['price']);
        $data['price'] = str_replace('IDR ', '', $data['price']);

        // upload process here
        // change format event
        if(isset($data['cover'])){

             // first checking old event to delete from storage
            $get_item = $event['cover'];

            // change file locations
            $data['event'] = $request->file('cover')->store(
                'assets/file-event', 'public'
            );

            // delete old event from storage
            $data_old = 'storage/'.$get_item;
            if (Storage::exists($data_old)) {
                Storage::delete($data_old);
            }else{
                Storage::delete('storage/app/public/'.$get_item);
            }

        }

        // update to database
        $event->update($data);

        alert()->success('Success Message', 'Successfully updated Event');
        return redirect()->route('backsite.event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        abort_if(Gate::denies('doctor_delete'), 403, '403 Forbidden');

        // first checking old file to delete from storage
        $get_item = $event['cover'];

        $data = 'storage/'.$get_item;
        if (Storage::exists($data)) {
            Storage::delete($data);
        }else{
            Storage::delete('storage/app/public/'.$get_item);
        }

        $event->forceDelete();

        alert()->success('Success Message', 'Successfully deleted event');
        return back();
    }
}
