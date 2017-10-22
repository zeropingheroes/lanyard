<?php

namespace Zeropingheroes\Lanyard\Http\Controllers;

use Zeropingheroes\Lanyard\RoleAssignment;
use Illuminate\Http\Request;
use Validator;
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
        $input = $request->only(['user_id', 'role_id']);

        $rules = [
            'user_id' => 'unique:role_assignments,user_id|exists:users,id',
            'role_id' => 'exists:roles,id',
        ];

        $messages = [
            'unique' => lang('phrase.user-already-has-role'),
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('role-assignment.create')
                ->withErrors($validator)
                ->withInput();
        }

        RoleAssignment::create($input);

        return redirect()->route('role-assignment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Zeropingheroes\Lanyard\RoleAssignment $roleAssignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoleAssignment $roleAssignment, $id)
    {
        $roleAssignment::destroy($id);
        return redirect()
            ->route('role-assignment.index')
            ->with('alerts', [['message' => lang('phrase.item-successfully-deleted', ['item' => lang('title.role-assignment')]), 'type' => 'success']]);
    }
}
