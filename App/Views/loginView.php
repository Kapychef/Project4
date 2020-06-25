<?php $title = 'Jean Forteroche Blog';

use App\Constant\GenericConstant; ?>

<?php ob_start(); ?>
<body>

        <section class="cadre">
        <!-- Formulaire d'inscription -->
        <form id="signUp"  action="<?= GenericConstant::URL_SIGNUP ?>" method="post">
            <h3>S'inscrire</h3>
            <div class="form-group">
                <label for="emailSignUp">Email</label>
                <input type="email" class="form-control" id="emailSignUp" name="emailSignUp" aria-describedby="emailHelp" placeholder="exemple@mail.com">
                <small id="emailHelp" class="form-text text-muted">Nous ne partagerons pas votre email.</small>
            </div>
            <div class="form-group">
                <label for="userName">Nom d'utilisateur</label>
                <input  class="form-control" id="userName" name="userName">
            </div>
            <div class="form-group">
                <label for="passwordSignUp">Mot de passe</label>
                <input type="password" class="form-control" id="passwordSignUp" name="passwordSignUp">
            </div>
            <button type="submit" class="btn btn-primary">S'Inscrire</button>
        </form>

        <div class="horizontal-separator"> </div>

        <!-- Formulaire de connexion -->
        <form id="signIn" action="<?= GenericConstant::URL_SIGNIN ?>" method="post">
            <h3>Se Connecter</h3>
            <div class="form-group">
                <label for="emailSignIn">Email</label>
                <input type="email" class="form-control" id="emailSignIn" name="emailSignIn" aria-describedby="emailHelp" >
            </div>
            <div class="form-group">
                <label for="passwordSignIn">Mot de passe</label>
                <input type="password" class="form-control" id="passwordSignIn"  name="passwordSignIn">
            </div>
            <button type="submit" class="btn btn-primary">Se Connecter</button>
        </form>
        </section>

</body>

<?php $pageContent = ob_get_clean(); ?>

<?php require (getcwd().GenericConstant::TEMPLATE_VIEW); ?>



