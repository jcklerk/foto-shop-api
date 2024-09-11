<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreatePaymentRequest;
use App\Models\Picture;
use Mollie\Laravel\Facades\Mollie;


class PictureProcessController extends Controller
{
    public function index()
    {
        try {
            $picture = Picture::where('processed', 'false')->firstOrFail();
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'No pictures to process',
            ], 404);
        }
        
        return [
            "id" => $picture->id,
            "imgUrl" => env('AWS_URL') . "/" . $picture->img,
        ];
    }



    public function store(Request $request)
    {
        $search = implode(" ", $request->result);

        Picture::where('id', $request->id)->update([
            'processed' => 'true',
            'searchText' => $search,
        ]);

        return response()->json("success",200);
    }
}
