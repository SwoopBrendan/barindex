<?php

namespace App\Services;

use App\Models\Bar;

class BarService
{
    public function isBarDetailsComplete($barId)
    {
        $bar = Bar::findOrFail($barId);
    }
}
