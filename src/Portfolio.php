<?php namespace Vilbur\Portfolio;

class Portfolio
{
    public static function runPackage() {
        return \Config::get('Portfolio.config-test');
    }
}