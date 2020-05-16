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

    public function buildTree(array $flat, string $pidKey = 'parent_id', string $idKey = 'id', string $sibKey = 'children', string $typeKey = 'type', $parent_id_start = null): array
    {
        // Группируем по родительским элементам
        // при необходимости в качестве ключей можно выставить id элемента в качестве ключа $sub['id']
        $grouped = [];
        foreach ($flat as $value) {
            $grouped[$value[$pidKey]][] = $value;
        }

        // Воспользуемся функцией высшего порядка вызывая ее на каждом элементе, которая будет рекурсивной
        $fnBuilder = function ($siblings) use (&$fnBuilder, $grouped, $idKey, $sibKey, $typeKey) {
            foreach ($siblings as $k => $sibling) {
                $id = $sibling[$idKey];
                if (isset($grouped[$id])) {
                    $sibling[$sibKey] = $fnBuilder($grouped[$id]);
                } else {
                    if ($sibling[$typeKey] == 0) {
                        $sibling[$sibKey] = [];
                    }
                }
                $siblings[$k] = $sibling;
            }
            return $siblings;
        };
        // Вызываем функцию с нужного ключа
        return $fnBuilder($grouped[$parent_id_start]);
    }
}
