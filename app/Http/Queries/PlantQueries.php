<?php

namespace App\Http\Queries;

use App\Models\Plant;

class PlantQueries
{
    public function search($search){
        $searchValues = preg_split('/\s+/', $search, -1, PREG_SPLIT_NO_EMPTY);

        $query = Plant::where(function ($q) use ($searchValues) {
            foreach($searchValues as $value){
                $q->orWhere('name', 'like', "%". $value ."%");
            }
        })->orWhere(function ($q) use ($searchValues) {
            foreach($searchValues as $value){
                $q->orWhere('cientificName', 'like', "%". $value ."%");
            }
        })->orWhere(function ($q) use ($searchValues) {
            foreach($searchValues as $value){
                $q->orWhere('Family', 'like', "%". $value ."%");
            }
        })->latest('updated_at')->paginate(12);
        
        return $query;
    }

    public function searchByUser($search, $user){
        $searchValues = preg_split('/\s+/', $search, -1, PREG_SPLIT_NO_EMPTY);

        $query = Plant::where('user', $user)->where(function ($q) use ($searchValues) {
            foreach($searchValues as $value){
                $q->orWhere('name', 'like', "%". $value ."%");
            }
        })->orWhere(function ($q) use ($searchValues) {
            foreach($searchValues as $value){
                $q->orWhere('cientificName', 'like', "%". $value ."%");
            }
        })->orWhere(function ($q) use ($searchValues) {
            foreach($searchValues as $value){
                $q->orWhere('Family', 'like', "%". $value ."%");
            }
        })->latest('updated_at')->paginate(12);
        
        return $query;
    }
}