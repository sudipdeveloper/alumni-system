<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\PhotoModel;
use Illuminate\Support\Facades\Response;
class PhotoController extends Controller
{
    function getSliderImages()
    {
       $imagesData =PhotoModel::all();

        $formattedImages = [];
        foreach ($imagesData as $imageData) {
            $formattedImages[] = [
                'id' => $imageData->id,
                'image' => base64_encode($imageData->image),
            ];
        }

        return response()->json(["success"=>true,'data' => $formattedImages]);
    }
}
