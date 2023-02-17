<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\RegistrationDetail;
use Illuminate\Http\Request;

class RegistrationDetailController extends Controller
{   
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(['admin']);
    }

    public function destroy(RegistrationDetail $registrationDetail)
    {   
        foreach ($registrationDetail->participants as $participant) {
            $participant->delete();
        }

        $registrationDetail->delete();

        return redirect()->route('participants.index')->with('success', 'Data successfully removed.');
    }

    public function restore($id)
    {   
        RegistrationDetail::withTrashed()->find($id)->restore();

        $participants = Participant::withTrashed()->where('registration_detail_id', $id)->get();

        foreach ($participants as $participant) {
            $participant->restore();
        }

        return redirect()->route('participants.withdrawal')->with('success', 'Data successfully restored.');
    }
}
