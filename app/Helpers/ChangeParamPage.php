<?php

namespace App\Helpers;

class PagePagination
{
    function getPageNumber($url)
    {
        $queryString = parse_url($url, PHP_URL_QUERY);
        parse_str($queryString, $params);
        return $params['page'] ?? 1;
    }
}
