<?php $title = 'Jean Forteroche Blog';

use App\Constant\GenericConstant; ?>

<?php ob_start(); ?>

<script src="https://cdn.tiny.cloud/1/y3zr92wfvr4s5qcyixsr249bsq5fpdvxl3l9jev5tpyzap6u/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
    tinymce.init({
        selector: 'textarea#content',
        height : 550
    });
</script>
<script>
    tinymce.init({
        selector : 'textarea#title',
        menubar: false,
        toolbar: 'undo redo'
    });
</script>
    <div class="jumbotron jumbotron-fluid" id="jumbotronEditor">
        <h1 class="display-4">Éditeur d'Article</h1>
    </div>
    <form action="<?= GenericConstant::URL_POST_EDIT.$post['id'] ?>" method="post">
        <div>
            <label for="title">Titre</label>
            <textarea id="title" name="title"><?= $post['title'] ?></textarea>
        </div>
        <div>
            <label for="content">Contenu</label>
            <textarea id="content" name="content"><?= $post['content'] ?></textarea>
        </div>
        <div>
            <input type="submit" class="btn btn-primary"/>
        </div>
    </form>

<?php $pageContent = ob_get_clean(); ?>

<?php require (getcwd().GenericConstant::TEMPLATE_VIEW); ?>

