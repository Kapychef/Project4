<?php
use App\Constant\GenericConstant;
$title = 'Jean Forteroche Blog'; ?>

<?php ob_start(); ?>
    <div class="list-title">
        <figure id="picture-author">
            <img src="App/Public/Images/Author.jpg" />
        </figure>
        <h2 >Derniers épisodes</h2>
    </div>

<?php
while ($data = $posts->fetch())
{
    ?>
    <div class="card-container" >
        <div class="homemade-card">
                <h5 class="homemade-card-title"><?= $data['title'] ?></h5>
                <p class="homemade-card-text"><?php  echo (strip_tags(substr($data['content'], 0, 400))."..." )?> </p>
                <a href="<?= GenericConstant::URL_POST.$data['id'] ?>" class="btn btn-primary">Accéder à l'épisode</a>
        </div>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $pageContent = ob_get_clean(); ?>


<?php require (getcwd().GenericConstant::TEMPLATE_VIEW) ;
 ?>