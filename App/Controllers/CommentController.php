<?php
namespace App\Controllers;

use App\Constant\GenericConstant;
use App\Model\CommentManager;
use mysql_xdevapi\BaseResult;

class CommentController implements GenericConstant
{
    private $commentManager;

    public function __construct()
    {
        $this->commentManager = new CommentManager();
    }

    function addComment($postId, $comment)
    {
        if (isset($_SESSION['name']) && isset($_SESSION['id'])){
            $postedComment = $this->commentManager->postComment($postId ,$_SESSION['name'], $comment, $_SESSION['id']);
        }
        else {
            $postedComment = $this->commentManager->postComment($postId ,'Anonyme', $comment, 0);
        }

        if ($postedComment === false) {
            header(GenericConstant::REDIRECT_TO_POST_ID.$postId.GenericConstant::ADD_COMMENT_ERROR);
        }
        else {
            header(GenericConstant::REDIRECT_TO_POST_ID.$postId.GenericConstant::ADD_COMMENT_SUCCESS);
        }
    }

    function editComment($content, $id, $postId) {

        $editedComment = $this->commentManager->editComment($content , $id);

        if ($editedComment === false) {
            header(GenericConstant::REDIRECT_TO_POST_ID.$postId.GenericConstant::EDIT_COMMENT_ERROR);
        }
        else {
            header(GenericConstant::REDIRECT_TO_POST_ID.$postId.GenericConstant::EDIT_COMMENT_SUCCESS);
        }
    }
    function reportComment( $id, $postId) {
        $reportedComment = $this->commentManager->reportComment($id);
        $comment = $this->commentManager->getCommentById($id);
        $message = 'Le commentaire de l\'utilisateur : '.$comment['author']." dont le message est : ".$comment['message']." a été signalé par la communauté.";
        mail('theo.biolchini@gmail.com', GenericConstant::MAIL_SUBJECT, $message);
        header(GenericConstant::REDIRECT_TO_POST_ID.$postId.GenericConstant::REPORT_COMMENT_SUCCESS);

    }


    public function deleteComment($id, $postId)
    {
        $post = $this->commentManager->deleteComment($id);
        header(GenericConstant::REDIRECT_TO_POST_ID.$postId.GenericConstant::DELETE_COMMENT_SUCCESS);
    }

    public function editor($id)
    {
        $comment = $this->commentManager->getCommentById($id);

        if ($_SESSION['id'] == $comment['author_id']) {
            require_once getcwd().GenericConstant::EDIT_COMMENT;
        }
        else {
            header(GenericConstant::REDIRECT_TO_INDEX);
        }
    }

    public function commentManagement()
    {
        if ($_SESSION['admin'] === '1') {
            $comments = $this->commentManager->getReportedComments();

            require_once getcwd().GenericConstant::ADMIN_COMMENT;
        }
        else {
            header(GenericConstant::REDIRECT_TO_INDEX);
        }
    }
}