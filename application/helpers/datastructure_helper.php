<?php

class DataStructure{

  public static function associativeToArray($arr){
    $ret = array();
    if($arr == NULL) return $ret;
    foreach($arr as $a){
      $ret[] = $a;
    }
    return $ret;
  }

  public static function keyValue($arr, $key, $value = NULL){
    $ret = array();
    if($arr == NULL) return $ret;
    foreach($arr as $a){
      $ret[$a[$key]] = $value != NULL ? $a[$value] : $a;
    }
    return $ret;
  }

  // arr: [{a: 'gg', b: 'wp'}, {a: 'ee', b: 'tt'}]
  // key: a
  // output: ['gg', 'ee']
  public static function toOneDimension($arr, $key){
    $ret = array();
    if($arr == NULL) return $ret;
    foreach($arr as $a){
      $ret[] = $a[$key];
    }
    return $ret;
  }
  
  public static function slice($arr, $fields){
    $ret = array();
    if($fields == NULL) return $ret;
    foreach($fields as $f){
      if(isset($arr[$f]) || array_key_exists($f, $arr)) 
        $ret[$f] = $arr[$f];
    }
    return $ret;
  }

  public static function selfGrouping($arr, $parentForeign, $childName){
    $ret = array();
    foreach($arr as $a){
      if($a[$parentForeign] == null){
        $ret[$a['id']] = $a; 
        $ret[$a['id']][$childName] = array();
      }
    }

    foreach($arr as $a){
      if($a[$parentForeign] != null){
        $ret[$a[$parentForeign]][$childName][] = $a; 
      }
    }

    return $ret;
  }

  public static function filter($arr, $cond){
    $ret = [];
    foreach($arr as $a){
      $satisfy = true;
      foreach($cond as $field => $value){
        if(!isset($a[$field]) || $a[$field] != $value) $satisfy = $satisfy && false;
      }
      if($satisfy == true) $ret[] = $a;
    }
    return $ret;
  }
}