<?php

namespace App\Http\Controllers;

use App\Events\User\EmailAddressUpdated;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('user.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('update', $user);
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->authorize('update', $user);

        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email|confirmed|unique:users,email,' . $id,
        ]);

        $user->fill(
            $request->only(['full_name', 'email'])
        );

        // TODO: Move check to observer
        if ($user->isDirty('email')) {
            event(new EmailAddressUpdated($user));
        }

        $user->save();

        // TODO: Show alert on profile page
        return redirect()->route('user.profile', $id);
    }

    /**
     * Verify the user's email address
     *
     * @param $id
     * @param $token
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verifyEmail($id, $token)
    {
        $user = User::where('email_verified', false)->findOrFail($id);

        // TODO: Allow verification when not logged in, OR redirect to verification after login
        $this->authorize('update', $user);

        if ($user->email_verification_token != $token) {
            return redirect()
                ->route('user.profile', $user->id)
                ->with('alerts', [['message' => lang('models.user.invalid-email-verification-token'), 'type' => 'danger']]);
        }

        $user->email_verified = true;
        $user->email_verification_token = null;

        $user->save();

        return redirect()
            ->route('user.profile', $user->id)
            ->with('alerts', [['message' => lang('models.user.email-verified'), 'type' => 'success']]);
    }

}
