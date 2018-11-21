<?php
namespace AntoineTB\PhpBinarySearch;

class ArraySearch {
  /**
   * @param $needle
   * @param array $haystack
   * @param $compare
   * @param $high
   * @param int $low
   * @param bool $containsDuplicates
   * @return bool|int
   */
  public static function binarySearch(
    $needle,
    array $haystack,
    $compare,
    $high,
    $low = 0,
    $containsDuplicates = false
  ) {
    $key = -1;
    while ($high >= $low) {
      $mid = (int)floor(($high + $low) / 2);
      $cmp = call_user_func($compare, $needle, $haystack[$mid]);
      if ($cmp < 0) {
        $high = $mid - 1;
      } elseif ($cmp > 0) {
        $low = $mid + 1;
      } else {
        if ($containsDuplicates) {
          while ($mid > 0 && call_user_func($compare, $haystack[($mid - 1)], $haystack[$mid]) === 0) {
            $mid--;
          }
        }
        $key = $mid;
        break;
      }
    }
    return $key;
  }
}
