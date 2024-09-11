<?php

namespace App\Http\Controllers;

use Carbon\Traits\ToStringFormat;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return [
            [
                "id" => 1,
                "name" => "ZwolleRun",
                "city" => "Zwolle",
                "img" => "https://picsum.photos/500/500",
                "startDate" => "2-2-2024",
                "endDate" => "2-2-2024",
                "organization" => [
                    "orgId" => 1,
                    "orgName" => "name van organisatie",
                    "orgLogo" => "https://picsum.photos/501/501",
                ],
                "runs" => [
                    [
                        "runID" => 1,
                        "runName" => "title",
                        "runDistance_km" => 5
                    ],
                    [
                        "runID" => 2,
                        "runName" => "title2",
                        "runDistance_km" => 20
                    ],
                ],
            ],
        ];
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
        return             [
                "id" => "1",
                "name" => "ZwolleRun",
                "city" => "Zwolle",
                "img" => "https://url.test/img.png",
                "eventURL" => "https://url.test/event",
                "startDate" => "2-2-2024",
                "endDate" => "2-2-2024",
                "type" => "cartNumber", // "cartNumbers" || "NumberInPicture"
                "organization" => [
                    "orgId" => 1,
                    "orgName" => "name van organisatie",
                    "orgLogo" => "https://url.test/logo.png",
                    "orgURL" => "https://url.test/"
                ],
                "runs" => [
                    [
                        "runID" => 1,
                        "runName" => "title",
                        "runDistance_km" => 5,
                        "img" => "https://url.test/img.png",
                    ],
                    [
                        "runID" => 2,
                        "runName" => "title2",
                        "runDistance_km" => 20,
                        "img" => "https://url.test/img.png",
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
