<?php
    $nmessage = [
        'FERR1' => 'Certains champs sont incomplets',
        'FERR2' => 'Email déjà utilisé',
        'FERR3' => 'Certains champs dépassent la limitation de caractères',
        'FERR4' => 'Format de l\'email incorrect',
        'FERR5' => 'Les mots de passe ne correspondent pas',
        'FERR6' => 'Email non existant',
        'FERR7' => 'Email ou mot de passe incorrect',
        'FERR8' => 'Tel déjà utilisé',
        'FSUC1' => 'Données modifiées avec succès',
        'FSUC2' => 'Connexion réussie',
        'CEERR1' => 'Échec de la vérification',
        'CESUC1' => 'Vérification terminée',
        'DSUC1' => 'Déconnexion réussie',
        'OERR1' => 'Veuillez vérifier votre email pour passer une commande',
        'OERR2' => 'Nombre de pains doit être compris entre 0 et 5 inclus',
        'OSUC1' => 'Commande réussie',
        'FPSUC1' => 'Un email à été envoyé pour réinitialiser le mot de passe',
    ];

    if (isset($_GET['n'])) {
        if(strpos($_GET['n'], 'ERR') !== false){
            $type = 'notif-error';
        } else if(strpos($_GET['n'], 'SUC') !== false){
            $type = 'notif-success';
        } else {
            $type = '';
        }
        echo('<div id="notification" class="'.$type.'">'.$nmessage[htmlspecialchars($_GET['n'])].' <button onclick="closeNotification()">Fermer</button></div>');
        unset($_GET['n']);
    }
?>