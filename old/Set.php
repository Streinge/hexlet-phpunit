<?php

namespace Hexlet\Phpunit;

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
    return $coll;
}
$coll = [
    'a' => [
        'b' => [
            'c' => 3
        ]
    ]
];

/*set($coll, ['a', 'b', 'c', null], 5);
print_r($coll);
//=> [
//=>     "a" => [
//=>         "b" => [
//=>             "c" => 4,
//=>         ],
//=>     ],
//=> ]*/