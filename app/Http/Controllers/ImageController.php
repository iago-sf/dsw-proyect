<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageForm;
use App\Models\Image;
use App\Models\Plant;

class ImageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Plant  $plant
     */
    public function create(Plant $plant)
    {
        $id = $plant->id;

        return view('image/create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageForm $request)
    {
        $request->file('image')->store('public');
        $image = new Image();

        $image->plant = $request->plant;
        $image->image = asset('storage/'.$request->file('image')->hashName());
        $image->save();

        return redirect('plant/' . $request->plant)->with('success', 'Your image was uploaded!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $Image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
