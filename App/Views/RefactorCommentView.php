<?php $title = 'Jean Forteroche Blog';

use App\Constant\GenericConstant; ?>

<?php ob_start(); ?>

<script src="https://cdn.tiny.cloud/1/y3zr92wfvr4s5qcyixsr249bsq5fpdvxl3l9jev5tpyzap6u/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
    tinymce.init({
        selector: 'textarea#comment',
        height : 550
    });
</script>

    <div class="jumbotron jumbotron-fluid" id="jumbotronEditor">
        <h1 class="display-4">Éditeur de Commentaire</h1>
    </div>
    <form action="<?= GenericConstant::URL_EDIT_COMMENT.$comment['post_id'].GenericConstant::URL_ID.$comment['id'] ?>" method="post">
        <div>
            <label for="content">Contenu</label>
            <textarea id="comment" name="comment"><?= $comment['comment'] ?></textarea>
        </div>
        <div>
            <input type="submit" class="btn btn-primary"/>
        </div>
    </form>

<?php $pageContent = ob_get_clean(); ?>

<?php

require_once(getcwd().GenericConstant::TEMPLATE_VIEW);
?>

