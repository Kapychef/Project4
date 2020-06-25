<?php
use App\Constant\GenericConstant;
$title = 'Jean Forteroche Blog';
?>

<?php ob_start(); ?>
    <script src="https://cdn.tiny.cloud/1/y3zr92wfvr4s5qcyixsr249bsq5fpdvxl3l9jev5tpyzap6u/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea#comment',
            height : 150,
            menubar: false,
            toolbar : false
        });
    </script>
 <script type="text/javascript">
        tinymce.init({
            selector: 'textarea#edited-comment',
            height : 150,
            menubar: false,
            toolbar : false
        });
    </script>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= GenericConstant::URL_HOMEPAGE ?>">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= strip_tags($post['title']) ?></li>
        </ol>
    </nav>

    <div id="article">
        <div id="article-title">
            <h2>
                <?= $post['title'] ?>
            </h2>
            <em>le <?= $post['creation_date'] ?></em>
        </div>
        <div class="horizontal-separator"></div>
        <div id = "article-content">
            <?= ($post['content']) ?>
        </div>
    <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
    ?>
        <div id="article-edit">
            <button  id="edit-post-button" class="btn btn-primary" ><a class="no-link" href="<?= GenericConstant::URL_EDITOR_EDIT.$post['id'] ?>" >Éditer</a></button>
            <button id="delete-post-button" class="btn btn-primary" ><a class="no-link" href="<?= GenericConstant::URL_POST_DELETE.$post['id'] ?>" >Supprimer</a></button>
        </div>

    <?php } ?>
    </div>
    <div class="horizontal-separator"></div>
    <div id="comments">
        <h3>Commentaires</h3>
        <form action="<?= GenericConstant::URL_ADD_COMMENT.$post['id'] ?>" method="post">
            <div id="posted-comment-author">
                 <?php
                 if(isset($_SESSION['id']))
                    {
                        ?>
                        <p> <?=  $_SESSION['name'] ?>&nbsp:&nbsp</p>
                <?php
                    }
                    else {
                        ?>
                        <p> Anonyme :&nbsp</p>
                <?php
                    } ?>
            </div>
            <div id="posted-comment">
                <div id="posted-comment-content">

                    <textarea id="comment" name="comment" placeholder="Entrez votre commentaire ici..."></textarea>
                </div>
                <div id="posted-comment-button">
                    <input type="submit" class="btn btn-primary"/>
                </div>
            </div>

        </form>
        <?php
        while ($comment = $comments->fetch())
        {
            ?>
            <div class="loaded-comments">
                <div id="loaded-comment-title">
                    <p><strong><?= $comment['author'] ?></strong> le <?= $comment['comment_date'] ?></p>
                    <?php  if($comment['reported'] == 1) {?>
                        <span id="icon-reported"><i class="fas fa-exclamation-triangle"></i></span>
                    <?php  }?>
                </div>
                <div id="comment-body"><?= $comment['comment'] ?></div>
                <div id="comment-feature">
                <?php if (isset($_SESSION['id']) && $comment['author_id'] === $_SESSION['id']) {?>
                    <button id="edit-comment-button" class="btn btn-primary"><a class="link-comment" href="<?= GenericConstant::URL_EDITOR_COMMENT.$post['id'].GenericConstant::URL_ID.$comment['id']?>" >éditer</a></button>
                <?php } ?>

                <?php if (isset($_SESSION['id']) && $comment['author_id'] === $_SESSION['id'] ||  isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {?>
                    <button id="delete-comment-button" class="btn btn-primary" ><a class="link-comment" href="<?= GenericConstant::URL_DELETE_COMMENT.$post['id'].GenericConstant::URL_ID.$comment['id']?>" >Supprimer</a></button>
                <?php } ?>
                 <?php
                 if($comment['reported'] != 1){
                     if (isset($_SESSION['id']) && $comment['author_id'] != $_SESSION['id'] &&  isset($_SESSION['admin']) && $_SESSION['admin'] != 1) {?>
                        <button id="report-comment-button" class="btn btn-warning" ><a class="warning-link" href="<?= GenericConstant::URL_REPORT_COMMENT.$post['id'].GenericConstant::URL_ID.$comment['id']?>" >Signaler</a></button>
                    <?php } }?>
                </div>
            </div>

            <?php
        ;}
        ?>
    </div>

<?php $pageContent = ob_get_clean(); ?>

<?php require (getcwd().GenericConstant::TEMPLATE_VIEW); ?>