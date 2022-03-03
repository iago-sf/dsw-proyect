<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Plant;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Models\Plant $plant
     * @return \Illuminate\Http\Response
     */
    public function generatePDF(Plant $plant)
    {
        $image = Image::where('plant', $plant->id)->withCount('likes')->orderBy('likes_count', 'desc')->first();

        $data = [
            'name' => $plant->name,
            'cientificName' => $plant->cientificName,
            'family' => $plant->family,
            'description' => $plant->description,
            'contributions' => $plant->contributions,
            'image' => $image->image,
            'date' => date('m/d/Y')
        ];
        
        //dd($data);

        $pdf = PDF::loadView('PDF/PDF', $data);
    
        return $pdf->download( $plant->cientificName . '.pdf');
    }
}
