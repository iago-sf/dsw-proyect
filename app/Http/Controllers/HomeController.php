<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Queries\PlantQueries;

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
        $query = new PlantQueries;
        $search = request()->exists('search') ? trim(request()->get('search'), " ") : '';

        if(request()->exists('search')){
            $plants = $query->searchByUser($search, Auth::user()->id);

        } else {
            $plants = Plant::where('user', Auth::user()->id)->latest('updated_at')->paginate('12');
        }

        return view('home', compact('plants'));
    }
}
