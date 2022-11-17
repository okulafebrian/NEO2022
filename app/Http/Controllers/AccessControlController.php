<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\AccessControl;
use App\Models\User;
use Illuminate\Http\Request;

class AccessControlController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(['admin']);
        $this->middleware('access.control:2');
    }

    public function index()
    {
        return view('access-controls.index', [
            'accessControls' => AccessControl::all()
        ]);
    }

    public function create()
    {
        return view('access-controls.create', [
            'accesses' => Access::all(),
            'users' => User::where('role', '!=', 'USER')->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'access_id' => 'required|integer',
            'user_id' => 'required|integer'
        ]);

        AccessControl::create([
            'access_id' => $request->access_id,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('access-controls.index')->with('success', 'Data sucessfully added');
    }

    public function show(AccessControl $accessControl)
    {
        //
    }

    public function edit(AccessControl $accessControl)
    {
        //
    }

    public function update(Request $request, AccessControl $accessControl)
    {
        //
    }

    public function destroy(AccessControl $accessControl)
    {
        //
    }
}
