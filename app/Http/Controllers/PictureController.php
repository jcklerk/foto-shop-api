<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePictureRequest;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Picture::all(),200);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePictureRequest $request)
    {
        $md5Name = md5_file($request->file('img')->getRealPath());
        $guessExtension = $request->file('img')->guessExtension();
        $path = $request->file('img')->storeAs('photos', $md5Name.'.'.$guessExtension  ,'s3');

        Picture::create([
            'img' => $path,
            'processed' => 'false',
        ]);

        return response()->json($path,200);

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $search = Picture::where('searchText', 'LIKE', '%'.$id.'%')->get();
        if (count($search) == 0) {
            return response()->json("not found",404);
        }
        return response()->json($search,200);
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
