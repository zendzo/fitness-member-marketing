<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return inertia('Dashboard/Index',[
            'name' => 'Test'
        ]);
    }
}
