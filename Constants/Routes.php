<?php

namespace app\constants;

class Routes
{
    private static string $BaseIndexRoute = '/web/index.php/';
    private static string $BaseLaboratoryRoute = '?r=laboratory/';
    private static string $BaseSecondLaboratoryRoute = 'second-laboratory-work%2F';

    /**
     * Return route: /web/index.php/?r=laboratory/second-laboratory-work%2F
     * @return string
     */
    public static function GetSecondLaboratoryRoute(): string
    {
        return self::GetLaboratoryBaseRoute() . self::$BaseSecondLaboratoryRoute;
    }

    /**
     * Return route: /web/index.php/?r=laboratory/second-laboratory-work/%2Fauthors
     * @return string
     */
    public static function GetAuthorsRoute(): string
    {
        return self::GetSecondLaboratoryRoute() . 'authors';
    }

    /**
     * Return route: /web/index.php/?r=laboratory/second-laboratory-work/%2Fauthors
     * @return string
     */
    public static function GetGenresRoute(): string
    {
        return self::GetSecondLaboratoryRoute() . 'genres';
    }

    /**
     * Return route: /web/index.php/?r=laboratory/
     * @return string
     */
    private static function GetLaboratoryBaseRoute(): string
    {
        return self::$BaseIndexRoute . self::$BaseLaboratoryRoute;
    }
}