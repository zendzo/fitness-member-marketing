<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LeadController extends Controller
{
    private $validations;

    public function __construct()
    {
        $this->validations = [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'dob' => 'required|date',
        ];
    }

    public function index()
    {
        $leads = Lead::query()
        ->where('branch_id', 1)
        ->orderBy('id', 'DESC')
        ->get();

        return Inertia::render('Lead/Index',[
            'leads' => $leads
        ]);
    }

    public function create()
    {
        return Inertia::render('Lead/Create');
    }

    public function store(Request $request)
    {

        $this->validate($request,$this->validations);

        Lead::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'branch_id' => 1,
            'age' => 22,
            'add_by' =>  Auth::id(),
            'interested_package' => $request->interested_package ?: null
        ]);

        return redirect()->route('lead.index');
    }

    public function edit(Lead $lead)
    {
        return Inertia::render('Lead/Edit',[
            'lead_prop' => $lead->load('remainders')
        ]);
    }

    public function update(Request $request, Lead $lead)
    {
        $rules = $this->validations;
        $rules['id'] = 'required|exists:leads,id';

        $this->validate($request, $rules);

        $lead->update($request->all());

        return redirect()->route('lead.edit',['lead' => $lead]);
    }
}
