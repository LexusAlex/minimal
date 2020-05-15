<?php

declare(strict_types=1);

namespace App\Service;

use App\Helpers\Service;

class TreeService extends Service
{
    public function getAll(): array
    {
        return $this->tree->getAll();
    }
}
