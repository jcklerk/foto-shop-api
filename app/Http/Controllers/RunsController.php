<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RunsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect("event.index"); // kijken wat ik met deze route wil.
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
        return [
                "runID" => 1,
                "runName" => "title",
                "runDistance_km" => 5,
                "img" => "https://url.test/img.png",
                "pictures" => [
                    [
                        "id" => 1,
                        "number" => [22],
                        "img" => "https://url.test/img.png",
                        "dateTime" => (new \DateTime())
                    ],
                    [
                        "id" => 2,
                        "number" => [22],
                        "img" => "https://url.test/img.png",
                        "dateTime" => (new \DateTime())
                    ],
                ],
        ];
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
