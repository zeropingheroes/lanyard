<?php

namespace Zeropingheroes\Lanyard\Http\Controllers;

use Zeropingheroes\Lanyard\Organiser;
use Illuminate\Http\Request;

class OrganiserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.organiser.index', ['organisers' => Organiser::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.organiser.create', ['organiser' => (new Organiser)]);
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
            'name' => 'required|unique:organisers',
        ]);

        $input = $request->only(['name']);

        Organiser::create($input);

        return redirect()
            ->route('organiser.index')
            ->with('alerts', [['message' => lang('phrase.item-successfully-created', ['item' => lang('title.organiser')]), 'type' => 'success']]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Zeropingheroes\Lanyard\Organiser  $organiser
     * @return \Illuminate\Http\Response
     */
    public function edit(Organiser $organiser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Zeropingheroes\Lanyard\Organiser  $organiser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organiser $organiser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Zeropingheroes\Lanyard\Organiser  $organiser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organiser $organiser, $id)
    {
        $organiser::destroy($id);
        return redirect()
            ->route('organiser.index')
            ->with('alerts', [['message' => lang('phrase.item-successfully-deleted', ['item' => lang('title.organiser')]), 'type' => 'success']]);
    }
}
