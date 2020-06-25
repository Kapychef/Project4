<?php
namespace App\Constant;

interface QueryConstant
{
    const DB_INFOS = 'mysql:host=db5000500291.hosting-data.io;port=3306;dbname=dbs480234;charset=utf8';
    const DB_USER = 'dbu75112';
    const DB_PW = 'Anaskip_030030';

    const GET_COMMENTS_QUERY = 'SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y \') AS comment_date, reported, author_id FROM comments WHERE post_id = ? ORDER BY comment_date ASC';
    const GET_COMMENT_QUERY = 'SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y \') AS comment_date, reported, author_id, post_id FROM comments WHERE id = ? ';
    const POST_COMMENT_QUERY = 'INSERT INTO comments(post_id, author, comment, author_id) VALUES(?, ?, ?, ?)';
    const EDIT_COMMENT_QUERY = 'UPDATE comments SET comment = ? WHERE id= ?';
    const REPORT_COMMENT_QUERY = 'UPDATE comments SET reported = 1 WHERE id= ?';
    const DELETE_COMMENT_QUERY = 'DELETE FROM comments WHERE id=?';
    const GET_REPORTED_COMMENTS = 'SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y \') AS comment_date, reported, author_id, post_id FROM comments WHERE reported = 1 ORDER BY comment_date ASC';

    const GET_POSTS_QUERY = 'SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y \') AS creation_date FROM posts ORDER BY id ASC';
    const GET_POST_QUERY = 'SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y \') AS creation_date FROM posts WHERE id = ?';
    const ADD_POST_QUERY = 'INSERT INTO posts (title, content) VALUES ( ?, ?) ';
    const EDIT_POST_QUERY = 'UPDATE posts SET content = ?, title = ? WHERE id = ?';
    const DELETE_POST_QUERY = 'DELETE FROM posts WHERE id=?';

    const GET_USER_QUERY = 'SELECT id, user_email, name, password, admin FROM blogers WHERE user_email = ?';
    const ADD_USER_QUERY = 'INSERT INTO blogers (user_email, name, password) VALUES (?, ?, ?)';

}