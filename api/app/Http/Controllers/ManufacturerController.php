<?php

namespace App\Http\Controllers;

use App\Http\Resources\ManufacturerCollection;
use App\Interfaces\Service\ManufacturerServiceInterface;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    protected $service;

    public function __construct(ManufacturerServiceInterface $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $manufacturers = $this->service->list($request);
        return new ManufacturerCollection($manufacturers);
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
