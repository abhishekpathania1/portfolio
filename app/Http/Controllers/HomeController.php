<?php

namespace App\Http\Controllers;

use App\Models\portfolio;
use App\Models\Proposal;
use App\Models\User;
use Freshbitsweb\Laratables\Laratables;

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
        $data = portfolio::all();

        return view('home', compact('data'));
    }

    public function proposals()
    {
        $data = Proposal::with(['portfolio', 'user', 'proposalImages', 'userpayment'])->get();
        return view('agent.proposal', compact('data'));
    }

    function list() {
        return Laratables::recordsOf(User::class);
    }

    public function users()
    {
        $data = User::where('is_agent',0)->get();
        return view('agent.user', compact('data'));
    }
}