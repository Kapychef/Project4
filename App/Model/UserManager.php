<?php

namespace App\Model;

use App\Constant\GenericConstant;

class UserManager implements GenericConstant
{
    function loginUser($userEmail) {
        $db = DatabaseConnect::dbConnect();
        $db->setAttribute($db::ATTR_ERRMODE, $db::ERRMODE_EXCEPTION);
        $req = $db->prepare(GenericConstant::GET_USER_QUERY);
        $req->execute(array($userEmail));
        $user = $req->fetch();
        return $user;
    }

    function addUser($email, $name, $password){
        $db = DatabaseConnect::dbConnect();
        $db->setAttribute($db::ATTR_ERRMODE, $db::ERRMODE_EXCEPTION);

        $req = $db->prepare(GenericConstant::ADD_USER_QUERY);
        $user = $req->execute(array($email, $name, $password));
        return $user;
    }
}