<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'fname' => 'Zaenal',
            'lname' => 'Mustofa'
        ];

        return Inertia::render('Dashboard/Index',$data);

    }
}
