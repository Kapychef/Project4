<?php
if(!isset($_SESSION)){
    session_start();
}

//use App\Controllers\EditorController;
use App\Controllers\CommentController;
use App\Constant\GenericConstant;
use App\Controllers\PostController;
use App\Controllers\loginController;
use App\Tools\urlCheck;


require 'App/Tools/Autoloader.php';
App\Tools\Autoloader::register();

$postController = new PostController();
$commentController = new CommentController();
$loginController = new loginController();

if ( isset($_SERVER['REQUEST_URI'])) {
    $url = explode('/', $_SERVER['REQUEST_URI']);
    switch ($url[2]) {

        //  Route : Listes des articles - Page d'Accueil
        case 'accueil' :
            $postController->listPosts();
            break;


        //  Route : Article et son CRUD
        case 'article' :
            if ($url[3] == 'ajouter') {
                if (!empty($_POST['title']) && !empty($_POST['content'])) {
                    $postController->createPost($_POST["title"], $_POST["content"]);
                } else {
                    header(GenericConstant::REDIRECT_TO_INDEX . GenericConstant::ADD_POST_ERROR);
                }
            } elseif ($url[3] == 'modifier') {
                if (urlCheck::post($url)) {
                    if (!empty($_POST['title']) && !empty($_POST['content'])) {
                        $postController->editPost($_POST["title"], $_POST["content"], $url[5]);
                    } else {
                        header(GenericConstant::REDIRECT_TO_INDEX . GenericConstant::EDIT_POST_ERROR);
                    }
                } else {
                    header(GenericConstant::REDIRECT_TO_INDEX . GenericConstant:: URL_ERROR);;
                }
            } elseif ($url[3] == 'supprimer') {
                if (urlCheck::post($url)) {
                    $postController->deletePost($url[4]);
                } else {
                    header(GenericConstant::REDIRECT_TO_INDEX . GenericConstant::DELETE_POST_ERROR);
                }
            } elseif ($url[3] == 'id') {
                if (isset($url[4]) && $url[4] > 0) {
                    $postController->post($url[4]);
                } else {
                    header(GenericConstant::REDIRECT_TO_INDEX . GenericConstant::READ_POST_ERROR);
                }
            }
            break;


        //  Route : Editeur d'articles & commentaires
        case 'editeur' :
            if ($url[3] == 'ecrire') {
                $postController->editor();
            } elseif ($url[3] == 'modifier') {
                if ($url[4] == 'id') {
                    if (!empty($url[5]) && $url[5] > 0) {
                        $postController->refactor($url[5]);
                    }
                } else {
                    header(GenericConstant::REDIRECT_TO_INDEX . GenericConstant::READ_POST_ERROR);
                }
            } elseif ($url[2] == 'commentaire') {
                if (urlCheck::comments($url)) {
                    $commentController->editor($url[7]);
                } else {
                    header(GenericConstant::REDIRECT_TO_INDEX . GenericConstant::READ_POST_ERROR);
                }
            }
            break;


        //  Route : Commentaire et son CRUD
        case 'commentaire':
            if ($url[3] == 'ajouter') {
                if ($url[4] == 'article-id') {
                    if (isset($url[5]) && $url[5] > 0 && !empty($_POST["comment"])) {
                        $commentController->addComment($url[5], $_POST["comment"]);
                    } else {
                        header(GenericConstant::REDIRECT_TO_INDEX . GenericConstant::ADD_COMMENT_ERROR);
                    }
                } else {
                    header(GenericConstant::REDIRECT_TO_INDEX . GenericConstant::READ_POST_ERROR);
                }
            } elseif ($url[3] == 'modifier') {
                if (urlCheck::comments($url)) {
                    $commentController->editComment($_POST["edited-comment"], $url[7], $url[5]);
                } else {
                    header(GenericConstant::REDIRECT_TO_INDEX . GenericConstant::EDIT_COMMENT_ERROR);
                }
            }

            elseif ($url[3] == 'signaler') {
                if(urlCheck::comments($url)){
                    $commentController->reportComment( $url[7], $url[5]);
                }
                else {
                    header(GenericConstant::REDIRECT_TO_INDEX . GenericConstant::REPORT_COMMENT_ERROR);
                }
            }

            elseif ($url[3] == 'supprimer') {
                if(urlCheck::comments($url)){
                    $commentController->deleteComment( $url[7], $url[5]);
                }
                else {
                    header(GenericConstant::REDIRECT_TO_INDEX . GenericConstant::DELETE_COMMENT_ERROR);
                }
            }
            break;


        // Page de connexion
        case 'connexion' :
            $loginController->login();
            break;


        // Route : Connexion et Inscription
        case 'compte':
            if ($url[3] == 'connexion') {
                if(isset($_POST["emailSignIn"]) && isset($_POST["passwordSignIn"]) ){
                    $loginController->getUser($_POST["emailSignIn"], $_POST["passwordSignIn"]);
                }
                else {
                    header(GenericConstant::REDIRECT_TO_INDEX . GenericConstant::SIGNIN_ERROR);
                }
            }

            if ($url[3] == 'deconnexion') {
                $loginController->logout();
            }

            if ($url[3] == 'inscription') {
                if(isset($_POST["emailSignUp"]) && isset($_POST["userName"]) && isset($_POST["passwordSignUp"]) ){
                    $loginController->addUser($_POST["emailSignUp"], $_POST["userName"], $_POST["passwordSignUp"]);
                }
                else {
                    header(GenericConstant::REDIRECT_TO_INDEX.GenericConstant::SIGNUP_ERROR);
                }
            }
            break;

        // Route : Administration
        case 'admin':
            if ($url[3] == 'commentaires') {
                $commentController->commentManagement();
            }
            break;

        // Route : Redirection par défaut -> liste des articles
        default :
            $postController->listPosts();
    }
}
else {
    $postController->listPosts();
}


