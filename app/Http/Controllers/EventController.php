<?php

namespace Zeropingheroes\Lanyard\Http\Controllers;

use Zeropingheroes\Lanyard\{
    Event, Organiser, Venue
};
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.event.index', ['events' => Event::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.event.create', ['event' => (new Event), 'organisers' => Organiser::all(), 'venues' => Venue::all()]);
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
            'organiser_id' => 'required|exists:organisers,id',
            'venue_id' => 'required|exists:venues,id',
            'name' => 'required|unique:events|string',
            'capacity' => 'required|integer|between:0,65535',
            'start' => 'required|date',
            'end' => 'required|date',
            'terms_and_conditions' => 'string',
        ]);

        $input = $request->only(['organiser_id', 'venue_id', 'name', 'capacity', 'start', 'end', 'terms_and_conditions']);

        Event::create($input);

        return redirect()
            ->route('event.index')
            ->with('alerts',
                [['message' => lang('phrase.item-successfully-created', ['item' => lang('title.event')]), 'type' => 'success']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Zeropingheroes\Lanyard\Event $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Zeropingheroes\Lanyard\Event $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Zeropingheroes\Lanyard\Event $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Zeropingheroes\Lanyard\Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event, $id)
    {
        $event::destroy($id);
        return redirect()
            ->route('event.index')
            ->with('alerts',
                [['message' => lang('phrase.item-successfully-deleted', ['item' => lang('title.event')]), 'type' => 'success']]);
    }
}
