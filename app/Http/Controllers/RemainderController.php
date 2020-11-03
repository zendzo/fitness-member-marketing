<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Remainder;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RemainderController extends Controller
{
    public function create(Lead $lead)
    {
        return Inertia::render('Remainder/Create',[
            'lead' => $lead
        ]);
    }

    public function store(Request $request)
    {
       $postData =  $this->validate($request,[
            'remainder' => 'required|min:2',
            'lead_id' => 'required|exists:leads,id',
            'remainder_date' => 'required|date'
        ]);

        $postData['user_id'] = $request->user()->id;
        $postData['status'] = 'pending';

        $lead = Lead::findOrfail($request->lead_id);
        $lead->remainders()
            ->create($postData);
        
        return redirect()->route('lead.edit', $lead);
    }

    public function edit(Lead $lead, Remainder $remainder)
    {
        return Inertia::render('Remainder/Edit',[
            'lead' => $lead,
            'remainder' => $remainder
        ]);
    }

    public function update(Request $request)
    {
        $remainder = Remainder::findOrfail($request->id);
        $remainder->status = 'completed';
        $save = $remainder->save();
        if ($save) {
            return redirect()->route('remainder.create', $remainder->lead);
        }
    }

    public function close(Request $request)
    {
        $remainder = Remainder::findOrfail($request->id);
        $remainder->status = 'completed';
        $save = $remainder->save();
        if ($save) {
            return redirect()->route('remainder.create.note', $remainder);
        }
    }

    public function createNote(Remainder $remainder)
    {
        return Inertia::render('Remainder/Note/Create', [
            'remainder' => $remainder->load('lead')
        ]);
    }

    public function storeNote(Request $request)
    {
        $this->validate($request,[
            'note' => 'required|min:5',
            'remainder_id' => 'required|exists:remainders,id'
        ]);

        $remainder = Remainder::findOrfail($request->remainder_id);
        $remainder->note = $request->note;
        $save = $remainder->save();

        if ($save) {
            return redirect()->route('lead.edit', $remainder->lead);
        }
    }
}
