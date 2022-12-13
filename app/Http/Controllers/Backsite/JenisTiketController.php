<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;

// use library here
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

// request
use App\Http\Requests\JenisTiket\StoreJenisTiketRequest;
use App\Http\Requests\JenisTiket\UpdatejenisTiketRequest as JenisTiketUpdatejenisTiketRequest;
// use everything here
use Illuminate\Support\Facades\Gate;
// use Illuminate\Auth\Access\Gate;
use Auth;

// use model here
use App\Models\MasterData\JenisTiket;

// thirdparty package


class JenisTiketController extends Controller
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
        abort_if(Gate::denies('jenistiket_access'), 403, '403 Forbidden');

        $jenistiket = JenisTiket::orderBy('created_at', 'desc')->get();

        return view('pages.backsite.master-data.jenis-tiket.index', compact('jenistiket'));
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
    public function store(StoreJenisTiketRequest $request)
    {
        // get all request from frontsite
        $data = $request->all();

        // store to database
        $jenistiket = JenisTiket::create($data);

        alert()->success('Success Message', 'Successfully added new Jenis Ticket');
        return redirect()->route('pages.backsite.master-data.jenis-tiket.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(JenisTiket $jenistiket)
    {
        abort_if(Gate::denies('jenistiket_show'), 403, '403 Forbidden');

        return view('pages.backsite.master-data.jenis-tiket.show', compact('jenistiket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisTiket $jenistiket)
    {
        abort_if(Gate::denies('jenistiket_edit'), 403, '403 Forbidden');

        return view('pages.backsite.master-data.jenis-tiket.edit', compact('jenistiket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JenisTiketUpdatejenisTiketRequest $request, JenisTiket $jenistiket)
    {
        // get all request from frontsite
        $data = $request->all();

        // update to database
        $jenistiket->update($data);

        alert()->success('Success Message', 'Successfully updated Jenis Ticket');
        return redirect()->route('backsite.master-data.jenis-tiket.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisTiket $jenistiket)
    {
        abort_if(Gate::denies('jenistiket_delete'), 403, '403 Forbidden');

        $jenistiket->forceDelete();

        alert()->success('Success Message', 'Successfully deleted jenis ticket');
        return back();
    }
}
