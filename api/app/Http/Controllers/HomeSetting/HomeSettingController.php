<?php

namespace App\Http\Controllers\HomeSetting;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomeSetting\CreateHomeSettingRequest;
use App\Http\Requests\HomeSetting\UpdateHomeSettingRequest;
use App\Http\Resources\HomeSetting\HomeSettingCollection;
use App\Http\Resources\HomeSetting\HomeSettingResource;
use App\Interfaces\Service\HomeSettingServiceInterface;
use Illuminate\Http\Request;

class HomeSettingController extends Controller
{
    protected $service;

    public function __construct(HomeSettingServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $homeSettings = $this->service->list($request->all());
        return new HomeSettingCollection($homeSettings);
    }

    public function store(CreateHomeSettingRequest $request)
    {
        $homeSetting = $this->service->create($request->all());
        return new HomeSettingResource($homeSetting);
    }

    public function show(string $id)
    {
        $homeSetting = $this->service->find($id);
        return new HomeSettingResource($homeSetting);
    }

    public function update(UpdateHomeSettingRequest $request, string $id)
    {
        $update = $this->service->update($request->all(), $id);
        return $update;
    }

    public function destroy(string $id)
    {
        $delete = $this->service->delete($id);
        return $delete;
    }

    public function current()
    {
        $homeSetting = $this->service->current();
        return new HomeSettingResource($homeSetting);
    }
}
