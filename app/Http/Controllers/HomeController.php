<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reports = Report::where('reportingPerson', Auth::id())->get();
        return view('home')->with([
            'reports' => $reports
        ]);
    }

    public function welcome() {

        return view('welcome')->with([
            'reports' => Report::orderBy('created_at', 'DESC')->get(),

        ]);
    }
}
