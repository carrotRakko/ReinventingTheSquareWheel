<?php

namespace Tests\ArrayFunction;

use PHPUnit\Framework\TestCase;

use function CarrotRakko\ReinventingTheSquareWheel\ArrayFunction\array_reverse;

require_once __DIR__ . '/../../ArrayFunction/array_reverse.php';

class ArrayReverseTest extends TestCase
{
    /**
     * Test for `array_reverse()` , without `$preserve_keys` passed
     *
     * @test
     * @dataProvider arrayReverseDataProviderWithoutPreserveKeys
     *
     * @param array $expected
     * @param array $array
     */
    public function arrayReverseTestWithoutPreserveKeys(array $expected, array $array)
    {
        $reversed_array = array_reverse($array);
        $this->assertSame($expected, $reversed_array);
    }

    /**
     * DataProvider for `arrayReverseTestWithoutPreserveKeys()`
     * @return array Test cases
     */
    public function arrayReverseDataProviderWithoutPreserveKeys(): array
    {
        return [
            'EmptyArray'    => [[],                                   []                                  ],
            'IntIndexed'    => [[3, 2, 1],                            [1, 2, 3]                           ],
            'StringIndexed' => [['baz' => 3, 'bar' => 2, 'foo' => 1], ['foo' => 1, 'bar' => 2, 'baz' => 3]],
        ];
    }

    /**
     * Test for `array_reverse()` , with `$preserve_keys` passed
     *
     * @test
     * @dataProvider arrayReverseDataProviderWithPreserveKeys
     *
     * @param array $expected
     * @param array $array
     * @param bool  $preserve_keys
     */
    public function arrayReverseTestWithPreserveKeys(array $expected, array $array, bool $preserve_keys)
    {
        $reversed_array = array_reverse($array, $preserve_keys);
        $this->assertSame($expected, $reversed_array);
    }

    /**
     * DataProvider for `arrayReverseTestWithPreserveKeys()`
     *
     * @return array Test cases
     */
    public function arrayReverseDataProviderWithPreserveKeys(): array
    {
        return [
            'EmptyArray_PreserveKey'       => [[],                                   [],                                   true ],
            'EmptyArray_NotPreserveKey'    => [[],                                   [],                                   false],
            'IntIndexed_PreserveKey'       => [[3, 2, 1],                            [2 => 1, 1 => 2, 0 => 3],             true ],
            'IntIndexed_NotPreserveKey'    => [[3, 2, 1],                            [1, 2, 3],                            false],
            'StringIndexed_PreserveKey'    => [['baz' => 3, 'bar' => 2, 'foo' => 1], ['foo' => 1, 'bar' => 2, 'baz' => 3], true ],
            'StringIndexed_NotPreserveKey' => [['baz' => 3, 'bar' => 2, 'foo' => 1], ['foo' => 1, 'bar' => 2, 'baz' => 3], false],
        ];
    }
}
