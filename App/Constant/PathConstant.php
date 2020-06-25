<?php
namespace App\Constant;

interface PathConstant
{
    const DOCUMENT_ROOT = 'DOCUMENT_ROOT';

    const LIST_POST_VIEW = '/App/Views/listPostsViews.php';
    const POST_VIEW = '/App/Views/PostViews.php';
    const EDIT_POST = '/App/Views/EditorView.php' ;
    const REFACTOR_POST = '/App/Views/RefactorView.php' ;
    const LOGIN_VIEW = '/App/Views/loginView.php' ;
    const EDIT_COMMENT = '/App/Views/RefactorCommentView.php' ;
    const ADMIN_COMMENT ='/App/Views/AdminCommentView.php';
    const TEMPLATE_VIEW ='/App/Views/template.php';


    const REDIRECT_TO_POST_ID = 'Location: '.GenericConstant::URL_HOMEPAGE.'/article/id/';
    const REDIRECT_TO_INDEX =  'Location:'.GenericConstant::URL_HOMEPAGE    ;
}