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

        return redirect('home')->with('success','You added a new plant!');
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
        dd($plant);
        $data = [
            'id' => $plant->id ?? '',
            'name' => $plant->name ?? '',
            'cientificName' => $plant->cientificName ?? '',
            'description' => $plant->description ?? ''
        ];

        return view('plant/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlantForm  $plant
     * @return \Illuminate\Http\Response
     */
    public function update(Plant $plant, PlantForm $request)
    {
        if(!Auth::user()->isMod()) return back();

        $plant->name = $request->name;
        $plant->description = $request->description;
        $plant->save();

        if(is_null(Contributer::where('contributer', Auth::id())->where('plant', $plant->id)->get()))
        {
            Contributer::create(['contributer' => Auth::id(), 'plant' => $plant->id]);
        }

        return redirect('plant/'. $plant->id);
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

        return redirect('home')->with('info','Plant deleted correctly.');
    }
}
