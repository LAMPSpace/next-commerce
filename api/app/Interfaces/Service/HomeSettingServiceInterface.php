<?php

namespace App\Interfaces\Service;

use App\Models\HomeSetting;

interface HomeSettingServiceInterface extends BaseServiceInterface
{
    public function current(): HomeSetting;
}
