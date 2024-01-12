<?php

namespace App\Implementations;

function set(&$coll, array $path, $value)
{
    $length = count($path);
    $lastIndex = $length - 1;
    $index = 0;
    $nested = &$coll;

    while ($index < $length) {
        $key = $path[$index];
        $newValue = $value;
        if ($index !== $lastIndex) {
            $newValue = [];
        }
        $nested[$key] = $newValue;
        $nested = &$nested[$key];
        $index += 1;
    }
    return $coll;
}
$coll = [
    'a' => [
        'b' => [
            'c' => 3
        ]
    ]
];
var_dump(count($coll));

set($coll, ['x', 'y', 'z'], 4);
print_r($coll);
var_dump(count($coll));

//=> [
//=>     "a" => [
//=>         "b" => [
//=>             "c" => 4,
//=>         ],
//=>     ],
//=> ]*/
