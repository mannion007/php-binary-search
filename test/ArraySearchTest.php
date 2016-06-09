<?php

namespace Mannion007\PhpBinarySearch\Tests;

use Mannion007\PhpBinarySearch\ArraySearch;
use phpunit\framework\TestCase;

class ArraySearchTest extends TestCase
{
    public function testBinarySearchWhenNeedleDoesNotExistInArrayWithNoDupes()
    {
        $needle = 'bradley@gmail.com';
        $haystack = array(
            'aaron@gmail.com',
            'james@gmail.com',
            'john@gmail.com',
            'michael@gmail.com',
            'peter@gmail.com',
        );

        $this->assertEquals(
            -1,
            ArraySearch::binarySearch($needle, $haystack, 'strcmp', count($haystack) -1, 0, false)
        );
    }

    public function testBinarySearchWhenNeedleDoesNotExistInArrayWithDupes()
    {
        $needle = 'bradley@gmail.com';
        $haystack = array(
            'aaron@gmail.com',
            'james@gmail.com',
            'john@gmail.com',
            'michael@gmail.com',
            'peter@gmail.com',
            'peter@gmail.com',
        );

        $this->assertEquals(
            -1,
            ArraySearch::binarySearch($needle, $haystack, 'strcmp', count($haystack) -1, 0, true)
        );
    }

    public function testBinarySearchWhenNeedleExistsInArrayWithNoDupes()
    {
        $haystack = array(
            'aaron@gmail.com',
            'james@gmail.com',
            'john@gmail.com',
            'michael@gmail.com',
            'peter@gmail.com',
        );

        foreach ($haystack as $key => $needle) {
            $this->assertEquals(
                $key,
                ArraySearch::binarySearch($needle, $haystack, 'strcmp', count($haystack) -1, 0, false)
            );
        }
    }

    public function testBinarySearchWhenNeedleExistsInArrayWithDupesWhenNeedleIsNotOneOfTheDupes()
    {
        $needle = 'john@gmail.com';
        $haystack = array(
            'aaron@gmail.com',
            'james@gmail.com',
            'james@gmail.com',
            'john@gmail.com',
            'michael@gmail.com',
            'michael@gmail.com',
            'peter@gmail.com',
            'peter@gmail.com',
        );

        $this->assertEquals(
            3,
            ArraySearch::binarySearch($needle, $haystack, 'strcmp', count($haystack) -1, 0, false)
        );
    }

    public function testBinarySearchWhenNeedleExistsInArrayWithDupesWhenNeedleIsOneOfTheDupes()
    {
        $needle = 'peter@gmail.com';
        $haystack = array(
            'aaron@gmail.com',
            'james@gmail.com',
            'james@gmail.com',
            'john@gmail.com',
            'michael@gmail.com',
            'michael@gmail.com',
            'peter@gmail.com',
            'peter@gmail.com',
        );

        $this->assertEquals(
            6,
            ArraySearch::binarySearch($needle, $haystack, 'strcmp', count($haystack) -1, 0, false)
        );
    }
}