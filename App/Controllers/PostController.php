<?php

namespace App\Controllers;

use App\Constant\GenericConstant;
use App\Model\CommentManager;
use App\Model\PostManager;

class PostController implements GenericConstant
{
    private $postManager;

    private $commentManager;

    public function __construct()
    {
        //Autoloader::register();
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
    }

    public function listPosts()
    {
        $posts = $this->postManager->getAllPosts();
        require_once getcwd().GenericConstant::LIST_POST_VIEW;
    }

    public function post($id)
    {
        $post = $this->postManager->getPostById($id);
        $comments = $this->commentManager->getCommentsByPost($id);
        if ($post != false)
        {
            require_once getcwd().GenericConstant::POST_VIEW;
        } else {
            header(GenericConstant::REDIRECT_TO_INDEX.GenericConstant::READ_POST_ERROR);
        }

    }

    public function editor()
    {
        if ($_SESSION['admin'] === '1') {
            require_once getcwd().GenericConstant::EDIT_POST;
        }
        else {
            header(GenericConstant::REDIRECT_TO_INDEX);
        }
    }
    public function refactor($id)
    {
        if ($_SESSION['admin'] === '1') {
            $post = $this->postManager->getPostById($id);
            require_once getcwd().GenericConstant::REFACTOR_POST;
        }
        else {
            header(GenericConstant::REDIRECT_TO_INDEX);
        }
    }

    public function createPost($title,$content)
    {
        $post = $this->postManager->addPost($title, $content);
        header(GenericConstant::REDIRECT_TO_INDEX.GenericConstant::ADD_POST_SUCCESS);
    }

    public function editPost($title, $content, $id)
    {
        $post = $this->postManager->editPost($title, $content, $id);
        header(GenericConstant::REDIRECT_TO_POST_ID.$id.GenericConstant::EDIT_POST_SUCCESS);
    }
    public function deletePost($id)
    {
        $post = $this->postManager->deletePost($id);
        header(GenericConstant::REDIRECT_TO_INDEX.GenericConstant::DELETE_POST_SUCCESS);
    }
}




