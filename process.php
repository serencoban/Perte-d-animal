<?php
session_start();
/*
 * valider les 2 champs
 */

 /*
 * s'il ya des erreurs, on redirige vers la page du formulaire, en mémorisanr le tps d'une requête les erreurs et les anciennes données
 */
$_SESSION['errors']['email']='Oops';

if (!is_null($_SESSION['errors']))
    $_SESSION['old'] = $_REQUEST;
header('Location: /index.php');
exit(); /*Pour interrompre le script car le navigateur pourrait envoyer la suite */
$_SESSION['old']['email'];

/*
 * assurer le rendu récapitulatif des données soumises
 */


?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Récapitulatif</title>
</head>
<body>
<h1>Récapitulatif des données soumises</h1>
<dl>
    <div>
        <dt>Email:</dt>
        <dd><?= $_REQUEST['email'] ?></dd> <!-- on va demander à php de chercher les données entré par l'utilisateur-->
    </div>
</dl>

</body>
</html>