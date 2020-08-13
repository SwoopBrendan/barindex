<?php

namespace App\Services;

use App\Models\Bar;

class BarOwnerService
{
    /**
     * @param $barOwnerId
     *
     * @return mixed
     */
    public function getBarOwnerBars($barOwnerId)
    {
        return Bar::where('bar_owner_id', $barOwnerId)->get();
    }
}
