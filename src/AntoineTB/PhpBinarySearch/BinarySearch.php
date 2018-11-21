<?php
namespace AntoineTB\PhpBinarySearch;

class BinarySearch {
  /**
   * @param mixed $needle What is being search
   * @param array $haystack The sorted array to look through
   * @param string|function|null $compare The function 
   * @param int|null $high If null given, will compute automatically
   * @param int $low Defaults to 0
   * @param bool $containsDuplicates
   * @return int The index of the element or -1 if not found
   */
  public static function binarySearch(
    $needle,
    array $haystack,
    $compare = null,
    $high = null,
    $low = 0,
    $containsDuplicates = false
  ) {
    if(is_null($compare)){$compare = function($a, $b) : int {return $a<=>$b;};}
    if(is_null($high)){$high = count($haystack)-1;}
    $key = -1;
    while($high >= $low){
      $mid = (int)floor(($high + $low) / 2);
      $cmp = $compare($needle, $haystack[$mid]);
      if    ($cmp < 0) {$high = $mid - 1;}
      elseif($cmp > 0) {$low  = $mid + 1;}
      else{
        if($containsDuplicates){
          while($mid > 0 && $compare($haystack[($mid - 1)], $haystack[$mid]) === 0){$mid--;}
        }
        $key = $mid;
        break;
      }
    }
    return $key;
  }
}
