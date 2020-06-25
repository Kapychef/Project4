<?php

namespace App\Tools;

class urlCheck
{
    public static function comments(array $url)
    {
        if ($url[4] == 'article-id') {
            if (!empty($url[5]) && $url[5] > 0) {
                if ($url[6] == 'id') {
                    if (!empty($url[7]) && $url[7] > 0) {
                        return true;
                    }

                }
            }
        }
        return false;
    }

    public static function post ($url) {
        if ($url[4] == 'id'){
            if(isset($url[5]) && $url[5] > 0) {
                return true;
            }
        }
        return false;
    }
}