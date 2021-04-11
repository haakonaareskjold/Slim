<?php


namespace App;


class Helpers
{
    public static function dd($args): void
    {
        die(dump($args));
    }

}