<?php

namespace App\Http\Controllers;

use App\Models\Remainder;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $remainders = Remainder::query()
                    ->with('lead')
                    ->where('remainders.remainder_date', now()->format('Y-m-d'))
                    ->where('remainders.user_id', auth()->user()->id)
                    ->where('remainders.status', 'pending')
                    ->get();
        $data = [
            'fname' => 'Zaenal',
            'lname' => 'Mustofa',
            'remainders' => $remainders
        ];

        return Inertia::render('Dashboard/Index',$data);

    }
}
