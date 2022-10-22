<?php

namespace app\constants;

class Routes
{
    private static string $BaseIndexRoute = '/web/index.php/';
    private static string $BaseLaboratoryRoute = '?r=laboratory/';
    private static string $BaseAdminRoute = '?r=admin/';
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
     * Return route: /web/index.php/?r=admin/
     * @return string
     */
    public static function GetAdminRoute(): string
    {
        return self::$BaseIndexRoute . self::$BaseAdminRoute;
    }

    /**
     * Return route: /web/index.php/?r=admin/author
     * @return string
     */
    public static function GetAdminAuthorRoute():string
    {
        return self::GetAdminRoute() . 'author';
    }

    /**
     * Return route: /web/index.php/?r=admin/author
     * @return string
     */
    public static function GetAdminBooksRoute():string
    {
        return self::GetAdminRoute() . 'books';
    }

    /**
     * Return route: /web/index.php/?r=admin/genres
     * @return string
     */
    public static function GetAdminGenresRoute():string
    {
        return self::GetAdminRoute() . 'genres';
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
     * Return route: /web/index.php/?r=laboratory/second-laboratory-work/%2Fdelete-author&authorId
     * @return string
     */
    public static function GetDeleteAuthorRoute(string $authorId): string
    {
        return self::GetSecondLaboratoryRoute() . 'delete-author&authorId=' . $authorId;
    }

    /**
     * Return route: /web/index.php/?r=laboratory/second-laboratory-work/%2Fdelete-author&authorId
     * @return string
     */
    public static function GetSaveAuthorRoute(): string
    {
        return self::GetSecondLaboratoryRoute() . 'save-author';
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
     * Return route: /web/index.php/?r=laboratory/second-laboratory-work/%2Fauthors
     * @return string
     */
    public static function GetBooksRoute(): string
    {
        return self::GetSecondLaboratoryRoute() . 'books';
    }

    /**
     * Return route: /web/index.php/?r=laboratory/second-laboratory-work/%2Ftwentieth-century
     * @return string
     */
    public static function GetBooksInTwentiethCenturyRoute(): string
    {
        return self::GetSecondLaboratoryRoute() . 'twentieth-century';
    }

    /**
     * Return route: /web/index.php/?r=laboratory/second-laboratory-work/%2Fauthors-and-total-books
     * @return string
     */
    public static function GetAuthorsAndTotalBooksRoute(): string
    {
        return self::GetSecondLaboratoryRoute() . 'authors-and-total-books';
    }

    /**
     * Return route: /web/index.php/?r=laboratory/second-laboratory-work/%2Ffind-author
     * @return string
     */
    public static function GetFindAuthorRoute(): string
    {
        return self::GetSecondLaboratoryRoute() . 'find-author';
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