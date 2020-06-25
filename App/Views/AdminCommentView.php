<?php $title = 'Jean Forteroche Blog';

use App\Constant\GenericConstant;
use App\Model\PostManager;
?>

<?php ob_start(); ?>

<div class="jumbotron jumbotron-fluid" id="jumbotronEditor">
    <h1 class="display-4">Administration des commentaires</h1>
</div>
<?php
 $postManager = new PostManager();
 while ($comment = $comments->fetch())
        {
   			
			$post = $postManager->getPostById($comment['post_id']);
            var_dump($post);
            ?>
            <div class="comments-section">
                <div class="loaded-comments">
                    <div id="loaded-comment-title">
                        <p><strong><?= $comment['author'] ?></strong> le <?= $comment['comment_date'] ?></p>
                    </div>
                    <div id="comment-body"><?= $comment['comment'] ?></div>
                    <div id="comment-feature">

                        <?php if (isset($_SESSION['id']) && $comment['author_id'] === $_SESSION['id'] ||  isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {?>
                            <button id="delete-comment-button" class="btn btn-primary" ><a class="link-comment" href="<?= GenericConstant::URL_DELETE_COMMENT.$comment['post_id'].GenericConstant::URL_ID.$comment['id']?>" >Supprimer</a></button>
                        <?php } ?>
                    </div>
                </div>
                <div class="post-related">
                    <p>Sur l'article : <?= $post['title'] ?></p>
                    <button id="view-post-button" class="btn btn-primary" ><a class="link-comment" href="<?= GenericConstant::URL_POST.$comment['post_id'] ?>" >Voir</a></button>
                </div>
            </div>
            <?php
        };
$comments->closeCursor();?>

      <?php  $pageContent = ob_get_clean(); ?>

<?= require getcwd().GenericConstant::TEMPLATE_VIEW;
?>