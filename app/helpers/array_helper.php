<?php

  function removeElementWithValue($array, $key, $value){
    foreach($array as $subKey => $subArray){
         if($subArray[$key] == $value){
              unset($array[$subKey]);
         }
    }
    return $array;
  }

  // convert an object to an array (nested)
  function convertObjectToArray ($object) {
    if(!is_object($object) && !is_array($object))
        return $object;

    return array_map('convertObjectToArray', (array) $object);
  }

  // check if array has a certain key
  function hasKey(array $arr, $key) {

    // is in base array?
    if (array_key_exists($key, $arr)) {
        return true;
    }

    // check arrays contained in this array
    foreach ($arr as $element) {
        if (is_array($element)) {
            if (hasKey($element, $key)) {
                return true;
            }
        }

    }
    return false;
  }

  // get a list of value from key type in array
  // this list is converted in this format '#value,#value,#value'
  function getListValuesToQuery($array,$key) {
    $arrayValues = array();
    foreach ($array as $subarray) {
      array_push($arrayValues,$subarray[$key]);
    }
    $arrayValues = array_values($arrayValues);
    $arrayValues = implode(",",$arrayValues);
    return $arrayValues;
  }