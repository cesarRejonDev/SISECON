<?php

namespace App\Http\Controllers;

use App\Models\Duty;
use App\Models\Incident;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $approved = Duty::where('status', 'Aprobado')->count();
        $pendings = Duty::where('status', 'Sin archivos')->count();
        $cancels = Duty::where('status', 'Cancelado')->count();

        $totalDuties = Duty::count();
        $incidents = Incident::count();

        return view('home', compact('approved', 'pendings', 'cancels', 'totalDuties', 'incidents'));
    }
}
