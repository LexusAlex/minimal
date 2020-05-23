<?php

declare(strict_types=1);

namespace App\Repository;

use App\Helpers\Repository;

class TreeRepository extends Repository
{
    public function getAll(): array
    {
        $query = 'SELECT * FROM `tree` ORDER BY `id`';
        $statement = $this->mariadb->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }
}
