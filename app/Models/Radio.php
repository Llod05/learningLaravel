<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Radio{
    public static function all() : array{
        return [
            [
                'id'=> 1,
                'name'=>'Radio 1',
                'country'=>'Hungary'
            ],
            [   'id'=> 2,
                'name'=>'Kiss FM',
                'country'=>'Romania'
            ],
            [   'id'=> 3,
                'name'=>'Ibiza Global Radio',
                'country'=>'Spain'
            ]
        ];
    }
    public static function find(int $id) : array
    {
        $radio = Arr::first(static::all(), fn($radio) => $radio['id'] == $id);
        if (!$radio) {
            abort(404);
        }
        return $radio;
    }
}
