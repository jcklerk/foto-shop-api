<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePictureRequest;
use Illuminate\Support\Facades\Storage;

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
     * Store a newly created resource in storage. CreatePictureRequest
     */ 
    public function store(Request $request)
    {
        if ($request->hasFile('img')) {
            $files = $request->file('img');

            foreach ($files as $file) {

                $md5Name = md5_file($file->getRealPath());
                $guessExtension = $file->guessExtension();
                if (!Storage::disk('s3')->exists('photos/' . $md5Name.'.'.$guessExtension))
                {
                    $path = $file->storeAs('photos', $md5Name.'.'.$guessExtension  ,'s3');
                    // Optional: You might want to validate or log the $path or handle errors
                    if (!$path) {
                        return response()->json(['status' => 'File upload failed'], 500);
                    }
                    Picture::create([
                        'img' => $path,
                        'processed' => 'false',
                    ]);
                } else {
                    print("File already exists");
                }              
            }

            return response()->json(['status' => 'Files uploaded successfully'], 200);
        }

        return response()->json(['status' => 'No files provided'], 400);
    
        // return response()->json($request,200);
        //print($request);
        // reqest contains mutiple files posted as form data
        // $files = $request->file('img');
        // $path = $request->file('img')->store('photos');
        // return response()->json($path,200);
        
        // $md5Name = md5_file($request->file('img')->getRealPath());
        // $guessExtension = $request->file('img')->guessExtension();
        // $path = $request->file('img')->storeAs('photos', $md5Name.'.'.$guessExtension  ,'s3');

        // Picture::create([
        //     'img' => $path,
        //     'processed' => 'false',
        // ]);

        // return response()->json($path,200);

        
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
