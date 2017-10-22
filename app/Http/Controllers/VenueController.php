<?php

namespace Zeropingheroes\Lanyard\Http\Controllers;

use Zeropingheroes\Lanyard\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.venue.index', ['venues' => Venue::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.venue.create', ['venue' => (new Venue)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:venues',
            'address' => 'required|unique:venues',
        ]);

        $input = $request->only(['name', 'address']);

        Venue::create($input);

        return redirect()
            ->route('venue.index')
            ->with('alerts', [['message' => lang('phrase.item-successfully-created', ['item' => lang('title.venue')]), 'type' => 'success']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Zeropingheroes\Lanyard\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function show(Venue $venue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Zeropingheroes\Lanyard\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function edit(Venue $venue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Zeropingheroes\Lanyard\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venue $venue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Zeropingheroes\Lanyard\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venue $venue, $id)
    {
        $venue::destroy($id);
        return redirect()
            ->route('venue.index')
            ->with('alerts', [['message' => lang('phrase.item-successfully-deleted', ['item' => lang('title.venue')]), 'type' => 'success']]);
    }
}
