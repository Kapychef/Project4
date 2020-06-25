<?php

namespace App\Constant;

$baseUrl = 'http://'.$_SERVER['SERVER_NAME'];
$path = '/index.php';
$url = $baseUrl.$path;
define("URL_HOME", $url);
define("BASE_URL", $baseUrl);

interface GenericConstant extends AnnotationConstant, PathConstant, QueryConstant
{
    const ID = 'id';
    const MAIL_ADDRESS = 'gestion.forteroche.blog@gmail.com';
    const MAIL_SUBJECT = 'Un commentaire a été signalé';

    const URL_HOMEPAGE = URL_HOME;

    const URL_POST = self::URL_HOMEPAGE.'/article/id/';
    const URL_POST_ADD = self::URL_HOMEPAGE.'/article/ajouter/';
    const URL_POST_EDIT = self::URL_HOMEPAGE.'/article/modifier/id/';
    const URL_POST_DELETE = self::URL_HOMEPAGE.'/article/supprimer/id/';

    const URL_ADD_COMMENT = self::URL_HOMEPAGE.'/commentaire/ajouter/article-id/';
    const URL_EDIT_COMMENT = self::URL_HOMEPAGE.'/commentaire/modifier/article-id/';
    const URL_DELETE_COMMENT = self::URL_HOMEPAGE.'/commentaire/supprimer/article-id/';
    const URL_REPORT_COMMENT = self::URL_HOMEPAGE.'/commentaire/signaler/article-id/';

    const URL_LOGIN = self::URL_HOMEPAGE.'/connexion';
    const URL_LOGOUT = self::URL_HOMEPAGE.'/compte/deconnexion';
    const URL_SIGNIN = self::URL_HOMEPAGE.'/compte/connexion';
    const URL_SIGNUP = self::URL_HOMEPAGE.'/compte/inscription';

    const URL_EDITOR_ADD = self::URL_HOMEPAGE.'/editeur/ecrire';
    const URL_EDITOR_EDIT = self::URL_HOMEPAGE.'/editeur/modifier/id/';
    const URL_EDITOR_COMMENT = self::URL_HOMEPAGE.'/editeur/commentaire/article-id/';

    const URL_MANAGEMENT_COMMENT = self::URL_HOMEPAGE.'/admin/commentaires';

    const URL_ID = '/id/';

    const CSS_URL = BASE_URL.'/App/Public/CSS/style.css';
}