<?php
namespace App\Services;

class DebugService {

    public function __construct() {
    }

    public static function array(array $param =[]): void {
        echo "<pre>";
        print_r($param);
        echo "</pre>";
    }

    public static function dump($param): void {
        echo "<pre>";
        var_dump($param);
        echo "</pre>";
    }
}