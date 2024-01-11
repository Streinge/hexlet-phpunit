<?php
/*Задание

tests/SolutionTest.php
Напишите тесты для функции set(array $coll, array $path, $value), которая изменяет (или добавляет) значение по указанному пути. Функция изменяет переданный массив.

<?php

$coll = [
    'a' => [
        'b' => [
            'c' => 3
        ]
    ]
];

set($coll, ['a', 'b', 'c'], 4);
print_r($coll);
//=> [
//=>     "a" => [
//=>         "b" => [
//=>             "c" => 4,
//=>         ],
//=>     ],
//=> ]

set($coll, ['x', 'y', 'z'], 5);
print_r($coll); // => 5
//=> [
//=>     "a" => [
//=>         "b" => [
//=>             "c" => 4,
//=>          ],
//=>     ],
//=>     "x" => [
//=>         "y" => [
//=>             "z" => 5,
//=>         ],
//=>     ],
//=> ]
Подсказки
Переиспользуйте объект данных
Тесты не должны зависеть друг от друга
Помните о том, что неверная реализация функции set() может изменять массив совершенно непредсказуемо
namespace App\Tests; */

use PHPUnit\Framework\TestCase;

use function App\Implementations\set;

class SolutionTest extends TestCase
{
    //BEGIN (write your solution here)
    private $data;
    private $dataCopy;

    public function setUp(): void
    {
        $this->data = [
            'a' => [
                'b' => [
                    'c' => 'd'
                ]
            ]
        ];
        $this->dataCopy = $this-> data;
    }

    public function testSolutionWithPlainSet(): void
    {
        set($this->data, ['a'], 'value');
        $this->dataCopy['a'] = 'value';
        $this->assertEquals($this->dataCopy, $this->data);
    }

    public function testSolutionWithNestedSet(): void
    {
        set($this->data, ['a', 'b', 'c'], 'value');
        $this->dataCopy['a']['b']['c'] = 'value';
        $this->assertEquals($this->dataCopy, $this->data);
    }

    public function testSolutionWithNewProperty(): void
    {
        set($this->data, ['a', 'b', 'd'], 'value');
        $this->dataCopy['a']['b']['d'] = 'value';
        $this->assertEquals($this->dataCopy, $this->data);
    }
    //END
}
