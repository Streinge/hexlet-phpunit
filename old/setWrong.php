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
            $objValue = $nested[$key] ?? null;
            $newValue = is_array($objValue) ? $objValue : [];
        }
        $nested[$key] = $newValue;
        $nested = &$nested[$key];
        $index += 1;
    }
    $coll['key'] = 'value';
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

set($coll, ['a', 'b', 'c'], 4);
print_r($coll);
var_dump(count($coll));

//=> [
//=>     "a" => [
//=>         "b" => [
//=>             "c" => 4,
//=>         ],
//=>     ],
//=> ]*/