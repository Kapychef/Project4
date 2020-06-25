<?php

namespace App\Model;

use App\Constant\GenericConstant;

class PostManager implements GenericConstant
{

    public function getAllPosts()
    {
        $db = DatabaseConnect::dbConnect();
        $posts = $db->query(GenericConstant::GET_POSTS_QUERY);
        return $posts;
    }

    public static function getPostById($postId)
    {
        $db = DatabaseConnect::dbConnect();
        $req = $db->prepare(GenericConstant::GET_POST_QUERY);
        $req->bindParam(1, $postId);
        $req->execute();
        $post = $req->fetch();
        return $post;
    }

    public function addPost($title, $content)
    {
        $db = DatabaseConnect::dbConnect();
        //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req = $db->prepare(GenericConstant::ADD_POST_QUERY);
        $req->bindParam(1, $title);
        $req->bindParam(2, $content);
        $post = $req->execute();
        return $post;
    }

    public function editPost($title, $content, $id)
    {
        $db = DatabaseConnect::dbConnect();
        //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req = $db->prepare(GenericConstant::EDIT_POST_QUERY);
        $req->bindParam(1, $content);
        $req->bindParam(2, $title);
        $req->bindParam(3, $id);
        $post = $req->execute();
        return $post;
    }
    public function deletePost($id)
    {
        $db = DatabaseConnect::dbConnect();
        //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req = $db->prepare(GenericConstant::DELETE_POST_QUERY);
        $req->bindParam(1, $id);
        $post = $req->execute();
        return $post;
    }
}

