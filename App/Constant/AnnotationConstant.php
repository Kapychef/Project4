<?php
namespace App\Constant;

interface AnnotationConstant
{
    const ADD_POST_SUCCESS = '?annotation=add-post-success';
    const DELETE_POST_SUCCESS = '?annotation=delete-post-success';
    const EDIT_POST_SUCCESS = '?annotation=edit-post-success';
    const ADD_POST_ERROR = '?annotation=add-post-error';
    const DELETE_POST_ERROR = '?annotation=delete-post-error';
    const EDIT_POST_ERROR = '?annotation=edit-post-error';
    const READ_POST_ERROR = '?annotation=read-post-error';

    const ADD_COMMENT_SUCCESS = '?annotation=add-comment-success';
    const EDIT_COMMENT_SUCCESS = '?annotation=edit-comment-success';
    const REPORT_COMMENT_SUCCESS = '?annotation=report-comment-success';
  	const DELETE_COMMENT_SUCCESS = '?annotation=delete-comment-success';
    const ADD_COMMENT_ERROR = '?annotation=add-comment-error';
    const EDIT_COMMENT_ERROR = '?annotation=edit-comment-error';
    const READ_COMMENT_ERROR = '?annotation=read-comment-error';
    const REPORT_COMMENT_ERROR = '?annotation=report-comment-error';

    const URL_ERROR = '?annotation=url-error';
    const ERROR = 'Erreur : ';

    const SIGNUP_SUCCESS = '?annotation=signup-success';
     const SIGNUP_ERROR = '?annotation=signup-error';
    const SIGNIN_ERROR = '?annotation=signin-error';
}