<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlantForm;
use App\Models\Contributer;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Plant;
use Illuminate\Support\Facades\Auth;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plant/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\PlantForm  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlantForm $request)
    {
        $request->merge(['user' => Auth::id()]); 
        Plant::create($request->all());

        return redirect('home')->with('success','You added a new post!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function show(Plant $plant)
    {
        $contributions = Contributer::where('plant', $plant->id)->with('contribution')->get();
        $images = Image::where('plant', $plant->id)->with('likes')->latest('updated_at')->paginate('5');

        return view('plant/show', compact('plant', 'images', 'contributions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function edit(Plant $plant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plant $plant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plant $plant)
    {
        $plant->delete();

        return redirect('/home');
    }
}
