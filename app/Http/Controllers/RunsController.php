<?php

namespace App\Http\Controllers;

use App\Models\Run;
use Illuminate\Http\Request;

class RunsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Run::orderBy('id', 'desc')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $run = Run::with(["pictures" => function ($query) {
            // return $query->where([['type', '=', 'original'], ['processed', '<>', 'false']])->select("id","searchText","img","original_creation_date","run_id"); // change to 'thumbnail' for production

            return $query->where([['type', '=', 'original']])->select("id","searchText","img","original_creation_date","run_id"); // change to 'thumbnail' for production
        }])->find($id);

        $run->pictures->map(function ($picture) {
            $picture->number = array_map('intval', explode(" ", $picture->searchText));
            return $picture;
        });

        return $run;
        // return [
        //         "runID" => 1,
        //         "runName" => "title",
        //         "runDistance_km" => 5,
        //         "img" => "https://url.test/img.png",
        //         "pictures" => [
        //             [
        //                 "id" => 1,
        //                 "number" => [22],
        //                 "img" => "https://url.test/img.png",
        //                 "dateTime" => (new \DateTime())
        //             ],
        //             [
        //                 "id" => 2,
        //                 "number" => [22, 24, 22],
        //                 "img" => "https://url.test/img.png",
        //                 "dateTime" => (new \DateTime())
        //             ],
        //                                 [
        //                 "id" => 3,
        //                 "number" => [2],
        //                 "img" => "https://url.test/img.png",
        //                 "dateTime" => (new \DateTime())
        //             ],
        //                                 [
        //                 "id" => 4,
        //                 "number" => [100, 22],
        //                 "img" => "https://url.test/img.png",
        //                 "dateTime" => (new \DateTime())
        //             ],
        //         ],
        // ];
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
