<?php

namespace App\Model;

use App\Constant\GenericConstant;

class CommentManager implements GenericConstant
{

    function getCommentsByPost($postId)
    {
        $db = DatabaseConnect::dbConnect();
        $req = $db->prepare(GenericConstant::GET_COMMENTS_QUERY);
        $req->bindParam(1, $postId);
        $req->execute();
        return $req;
    }

    function getCommentById($id)
    {
        $db = DatabaseConnect::dbConnect();
        $req = $db->prepare(GenericConstant::GET_COMMENT_QUERY);
        $req->bindParam(1, $id);
        $req->execute();
        return $req->fetch();
    }

    function getReportedComments()
    {
        $db = DatabaseConnect::dbConnect();
        $req = $db->prepare(GenericConstant::GET_REPORTED_COMMENTS);
        $req->execute();
        return $req;
    }

    function postComment($postId, $author, $comment, $authorId)
    {
        $db = DatabaseConnect::dbConnect();
        $req = $db->prepare(GenericConstant::POST_COMMENT_QUERY);
        $req->bindParam(1, $postId);
        $req->bindParam(2, $author);
        $req->bindParam(3, $comment);
        $req->bindParam(4, $authorId);
        $postedComment = $req->execute();
        return $postedComment;
    }

    function editComment($content, $id)
    {
        $db = DatabaseConnect::dbConnect();
        $req = $db->prepare(GenericConstant::EDIT_COMMENT_QUERY);
        $req->bindParam(1, $content);
        $req->bindParam(2, $id);
        $editedComment = $req->execute();
        return $editedComment;
    }
    function reportComment( $id)
    {
        $db = DatabaseConnect::dbConnect();
        $req = $db->prepare(GenericConstant::REPORT_COMMENT_QUERY);
        $req->bindParam(1, $id);
        $editedComment = $req->execute();
        return $editedComment;
    }

    function deleteComment($id)
    {
        $db = DatabaseConnect::dbConnect();
        //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req = $db->prepare(GenericConstant::DELETE_COMMENT_QUERY);
        $req->bindParam(1, $id);
        $comment = $req->execute();
        return $comment;
    }
}