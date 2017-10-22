<?php

namespace Zeropingheroes\Lanyard\Http\Controllers;

use Zeropingheroes\Lanyard\RoleAssignment;
use Illuminate\Http\Request;
use Zeropingheroes\Lanyard\{
    User, Role
};

class RoleAssignmentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.role-assignment.index', ['roleAssignments' => RoleAssignment::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.role-assignment.create', ['roles' => Role::all(), 'users' => User::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Zeropingheroes\Lanyard\RoleAssignment $roleAssignment
     * @return \Illuminate\Http\Response
     */
    public function show(RoleAssignment $roleAssignment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Zeropingheroes\Lanyard\RoleAssignment $roleAssignment
     * @return \Illuminate\Http\Response
     */
    public function edit(RoleAssignment $roleAssignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Zeropingheroes\Lanyard\RoleAssignment $roleAssignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoleAssignment $roleAssignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Zeropingheroes\Lanyard\RoleAssignment $roleAssignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoleAssignment $roleAssignment)
    {
        //
    }
}
