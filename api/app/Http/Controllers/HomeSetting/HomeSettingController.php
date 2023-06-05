<?php

namespace App\Http\Controllers\HomeSetting;

use App\Http\Controllers\Controller;
use App\Http\Resources\HomeSettingCollection;
use App\Interfaces\Service\HomeSettingServiceInterface;
use Illuminate\Http\Request;

class HomeSettingController extends Controller
{
    protected $service;

    public function __construct(HomeSettingServiceInterface $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $homeSettings = $this->service->list($request);
        return new HomeSettingCollection($homeSettings);
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
        //
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
