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
}
