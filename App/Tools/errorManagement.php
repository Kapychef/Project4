<?php


namespace App\Tools;


class errorManagement
{
    static function management($message)
    {
        switch($message){
            //Annotations de réussite sur les articles
            CASE 'add-post-success' :
                return 'Votre article a bien été ajouté.';
                break;

            CASE 'edit-post-success' :
                return 'Votre article a bien été modifié.';
                break;

            CASE 'delete-post-success' :
                return 'Votre article a bien été supprimé.';
                break;

            //Annotations d'erreur sur les articles
            CASE 'add-post-error' :
                return 'Impossible d\'ajouter l\'article, informations manquantes !';
                break;
            CASE 'edit-post-error' :
                return 'Impossible d\'éditer l\'article, informations manquantes !';
                break;
            CASE 'delete-post-error' :
                return 'Impossible de supprimer l\'article, informations manquantes !';
                break;
            CASE 'read-post-error' :
                return 'Aucun ID d\'article envoyé';
                break;

            //Annotations de réussite sur les commentaires
            CASE 'add-comment-success' :
                return 'Votre commentaire a bien été ajouté.';
                break;
            CASE 'edit-comment-success' :
                return 'Votre commentaire a bien été modifié.';
                break;
            CASE 'delete-comment-success' :
                return 'Votre commentaire a bien été supprimé.';
                break;
            CASE 'report-reported-success' :
                return 'Ce commentaire a bien été signaler aux administarteurs';
                break;

            //Annotations d'erreur sur les commentaires
            CASE 'add-comment-error' :
                return 'Impossible d\'ajouter le commentaire, informations manquantes !';
                break;
             CASE 'edit-comment-error' :
                return 'Impossible d\'éditer le commentaire, informations manquantes !';
                break;
             CASE 'delete-comment-error' :
                return 'Impossible de supprimer le commentaire, informations manquantes !';
                break;
             CASE 'report-comment-error' :
                return 'Impossible de signaler le commentaire, informations manquantes !';
                break;
            CASE 'read-comment-error' :
                return 'Aucun ID d\'article ou de commentaire envoyé';
                break;

            //Annotations de connexion
            CASE 'signin-error' :
                return 'Erreur dans la combinaison Nom d\'utilsiateur/Mot de passe.';
                break;
            CASE 'signup-error' :
                return 'Veuillez renseigner tous les champs.';
                break;
            CASE 'signup-success' :
                return 'Votre inscription a bien été enregistrée.';
                break;

            //Annotation d'erreur d'URL générique
            CASE 'url-error':
                return 'Cet URL n\'est pas reconnu.';

            //Erreur inattendu
            default :
                return 'Une erreur inattendu s\'est produite.';
                break;
        }
    }
}