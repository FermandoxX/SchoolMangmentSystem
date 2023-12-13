<?php

function condtion($key){

    $newKey = str_replace(['__not_in','__in','__like','__ilike','__null'],["",""],$key);

    $array = [
        "{$newKey}__not_in" => '!=',
        "{$newKey}__in" => '=',
        "{$newKey}__like" => 'like',
        "{$newKey}__ilike" => 'ilike',
        "{$newKey}__null" => 'is'
    ];
   return array($array, $newKey);

}








?>