<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlantForm;
use App\Models\Plant;
use Illuminate\Support\Facades\Auth;

class PlantController extends Controller
{
    /**
     * Contructor for declaring a middleware, this middleware prevents the access to some funtionalities.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plants = Plant::all();

        return response()->json(['Plants' => $plants], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlantForm $request)
    {
        $request->merge(['user' => Auth::id()]); 
        $plant = Plant::create($request->all());

        return response()->json([
            'Message' => 'Plant created successfully',
            'Plant' => $plant
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function show(Plant $plantpedium)
    {
        $plant = Plant::where('id', $plantpedium->id)->get();
        
        return response()->json(['Plant' => $plant], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function update(PlantForm $request, Plant $plantpedium)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plant $plantpedium)
    {
        $plantpedium->delete();

        return response()->json(['Message' => 'The plant was eliminated'], 200);
    }
}
