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

<body>
    <div class="jumbotron jumbotron-fluid" id="jumbotronEditor">
        <h1 class="display-4">Éditeur d'Article</h1>
    </div>
    <form action="<?= GenericConstant::URL_POST_ADD?>" method="post">
        <div id="edit-title">
            <label for="title"><h3>Titre</h3></label>
            <textarea id="title" name="title"></textarea>
        </div>
        <div id="edit-content">
            <label for="content"><h3>Contenu</h3></label>
            <textarea id="content" name="content"></textarea>
        </div>
        <div id="edit-button">
             <input type="submit" class="btn btn-primary"/>
        </div>
    </form>
</body>
<?php $pageContent = ob_get_clean(); ?>

<?php require (getcwd().GenericConstant::TEMPLATE_VIEW); ?>

