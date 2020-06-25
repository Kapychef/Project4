<?php
if(!isset($_SESSION)){
    session_start();
}
use App\Constant\GenericConstant;
use App\Model\PostManager;
use App\Tools\errorManagement;

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/7d013ed9d8.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<?= GenericConstant::CSS_URL?>">
        <title><?= $title ?></title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="<?= GenericConstant::URL_HOMEPAGE ?>"><span id="icon-blog"><i class="fas fa-atlas"></i></span>  Jean ForteRoche Blog</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Épisode
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            $postManager = new PostManager();
                            $i=0;
                            $posts = $postManager->getAllPosts();
                                foreach ($posts as $post){
                                    $i++;
                                    $id = $post["id"] ?>
                            <a class="dropdown-item" href="<?= GenericConstant::URL_POST.$id ?>">Épisode <?= $i?></a>
                            <?php
                                }
                            ?>
                        </div>
                    </li>
                    <?php
                    if(isset($_SESSION['id']))
                        {
                            ?>
                    <li>
                        <a class="nav-link" href="<?= GenericConstant::URL_LOGOUT ?>" role="button" aria-haspopup="true" aria-expanded="false">
                            Déconnexion
                        </a>
                    </li>
                    <?php
                        }
                        else {
                            ?>
                    <li>
                        <a class="nav-link" href="<?= GenericConstant::URL_LOGIN ?>" role="button" aria-haspopup="true" aria-expanded="false">
                            Connexion
                        </a>
                    </li>
                    <?php
                        }

                    if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
                        ?>
                        <li>
                        <a class="nav-link" href="<?= GenericConstant::URL_EDITOR_ADD ?>" role="button" aria-haspopup="true" aria-expanded="false">
                            Écrire
                        </a>
                        </li>
                        <li>
                        <a class="nav-link" href="<?= GenericConstant::URL_MANAGEMENT_COMMENT ?>" role="button" aria-haspopup="true" aria-expanded="false">
                            Gestion
                        </a>
                        </li>
                   <?php
                    } ?>
                </ul>
            </div>
        </nav>
            <?php
            if(isset($_SESSION['id'])){
                ?>
        <div id="user-info">
            <span id="icon-user"><i class="fas fa-user-circle"></i></span>
            <p>Bienvenue - </p>
            <p> <?= $_SESSION['name']?> </p>
        </div>
            <?php
            } ?>

            <?php
                if (isset($_GET['annotation'])) {
                    ?>
        <div id="annotation">
            <p><?= errorManagement::management($_GET['annotation']);?></p>
        </div>
                <?php
                }
            ?>

        <div class="container">
            <?= $pageContent ?>
        </div>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>


