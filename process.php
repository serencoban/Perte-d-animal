<?php
session_start();
$countries = require './config/countries.php';
require './core/validation.php';

check_required('email');
check_required('vemail');
check_email('email');
check_same('vemail', 'email');
check_phone('tel');

check_in_collection('country', 'countries');



/** @var array $countries */ // elle a été ajouté grace au 'show context action' sur $countries

/*
 * valider les 2 champs
 */
$email='';
$vemail='';

/****************Email********************/

if (array_key_exists('email', $_REQUEST)) {
    $email = trim($_REQUEST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errors']['email'] = 'L’email doit être un email';
    }
} else {
    $_SESSION['errors']['email'] = 'L’email est requis';
}
/****************Vmail********************/

if (array_key_exists('vemail', $_REQUEST)) {
    $vemail = trim($_REQUEST['vemail']);
    if ($email !== $vemail) {
        $_SESSION['errors']['vemail'] = 'L’email doit être confirmé';
    }
} else {
    $_SESSION['errors']['vemail'] = 'L’email de confirmation est requis';
}

/**************Tel**********************/
/*
 * +32 (0)4 666 66 66
 * +32 (0)4 6666666
 * +32 (0)46666666
 * (0)46666666
 * 046666666
 */

if ((array_key_exists('tel', $_REQUEST)) &&
    strlen($_REQUEST['tel']) < 9 &&
    !is_numeric(str_replace(['+' , '(' , ')', ' '], '', $_REQUEST['tel']))){
        $_SESSION['errors']['tel'] ="Ce format de téléphone n‘est pas comptabile";

}

/****************Pays********************/

if (array_key_exists('country', $_REQUEST)){
    if (!array_key_exists($_REQUEST['country'], $countries)){
        $_SESSION['errors']['country'] = 'Ce pays n‘est pas pris en compte';
    }
}

 /*
 * s'il ya des erreurs, on redirige vers la page du formulaire, en mémorisanr le tps d'une requête les erreurs et les anciennes données
 */

if (!is_null($_SESSION['errors']))
    $_SESSION['old'] = $_REQUEST;
header('Location: /index.php');
exit(); /*Pour interrompre le script car le navigateur pourrait envoyer la suite */


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
        <dd><?= $email ?></dd> <!-- on va demander à php de chercher les données entré par l'utilisateur-->
    </div>
</dl>

</body>
</html>