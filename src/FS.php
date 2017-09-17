<?php namespace Batch;

class FS {

    public static function Convert($file)
    {
         $filesize = (filesize($file) * .0009765625) * .0009765625; // bytes to MB
         return round($filesize, 2) . 'MB';
    }
}
