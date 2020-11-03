<?php

namespace App\Http\Controllers;

use App\Models\Lead;
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
}
