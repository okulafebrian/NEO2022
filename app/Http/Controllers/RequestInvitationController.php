<?php

namespace App\Http\Controllers;

use App\Models\RequestInvitation;
use Illuminate\Http\Request;

class RequestInvitationController extends Controller
{

    public function index()
    {
        return view('request-invitations.index', [
            'requestInvitations' => RequestInvitation::withTrashed()->get()
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'institution' => 'required|string',
        ]);

        RequestInvitation::create([
            'name' => $request->name,
            'email' => $request->email,
            'institution' => $request->institution,
        ]);

        return redirect()->route('home')->with('success', 'Request successfully sent!');
    }

    public function show(RequestInvitation $requestInvitation)
    {
        //
    }

    public function edit(RequestInvitation $requestInvitation)
    {
        //
    }

    public function update(Request $request, RequestInvitation $requestInvitation)
    {
        //
    }

    public function destroy(RequestInvitation $requestInvitation)
    {   
        $requestInvitation->delete();

        return redirect()->route('request-invitations.index')->with('success', 'Request invitation declined.');
    }

    public function accept(RequestInvitation $requestInvitation)
    {
        $requestInvitation->update([
            'is_sent' => 1
        ]);

        return redirect()->route('request-invitations.index')->with('success', 'Request invitation letter sent.');
    }
}
