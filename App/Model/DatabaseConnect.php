<?php

namespace App\Model;

use App\Constant\GenericConstant;

class DatabaseConnect implements GenericConstant
{

    public static function dbConnect() {
        try
        {
            $db = new \PDO(GenericConstant::DB_INFOS, GenericConstant::DB_USER, GenericConstant::DB_PW);
        }
        catch(\Exception $e)
        {
            die(GenericConstant::ERROR.$e->getMessage());
        }
        return $db;
    }
}

