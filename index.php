<?php
session_start(); /* pour avoir acces au données de la session*/
$countries = require'./config/countries.php';

/* les données sont utilisables le tmps d'une requête */

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <script defer src="/js/main.js"></script>
    <title>J'ai perdu mon animal</title>
</head>
<body>
  <h1>
      Déclaration de perte d'animal
  </h1>
  <form action="/process.php" method="post">
    <fieldset>
      <legend>Vos coordonnées</legend>

        <div>
            <label for="email"><abbr title="requis">*</abbr>&nbsp;Email</label>
            <input type="email"
                   name="email"
                   id="email"
                <?php
                if (isset($_SESSION['old']['email'])): ?>
                    value="<?= $_SESSION['old']['email'] ?>"
                <?php
                endif; ?>
                   placeholder="gg@gmail.com"
                   required>
        </div>
        <?php
        if (isset($_SESSION['errors']['email'])): ?>
        <div><p><?= $_SESSION['errors']['email'] ?></p></div>
        <?php
        endif; ?>



        <div>
            <label for="vemail"><abbr title="requis">*</abbr>&nbsp;Confirmez l'email</label>
            <input type="email"
                   name="vemail"
                   id="vemail"
                <?php
                if (isset($_SESSION['old']['vemail'])): ?>
                    value="<?= $_SESSION['old']['vemail'] ?>"
                <?php
                endif; ?>
                    placeholder="gg@gmail.com"
                   required>
        </div>
        <?php
        if (isset($_SESSION['errors']['vemail'])): ?>
            <div><p><?= $_SESSION['errors']['vemail'] ?></p></div>
        <?php
        endif; ?>



        <div>
            <label for="tel">Téléphone <small>par exemple&nbsp;+32 (0)4 666 66 66</small></label>
            <input type="tel"
                   name="tel"
                   id="tel"

                <?php if (isset($_SESSION['old']['tel'])): ?>
                    value="<?= $_SESSION['old']['tel'] ?>"
                <?php endif; ?>

                   placeholder="0477843212"
                   required>
        </div>

        <?php
        if (isset($_SESSION['errors']['tel'])): ?>
            <div><p><?= $_SESSION['errors']['tel'] ?></p></div>
        <?php
        endif; ?>


        <div>
            <label for="country">Pays</label>
            <select name="country" id="country">

                <?php foreach ($countries as $code => $name): ?>
                    <option value="<?= $code ?>"
                            <?php if (isset($_SESSION['old']['country']) && $_SESSION['old']['country'] === $code): ?>
                            selected
                            <?php endif ?>

                    ><?= $name ?></option> ?>
                <?php endforeach; ?>
            </select>
        </div>
        <?php
            if (isset($_SESSION['errors']['country'])): ?>
            <div>
                <p>
                    <?= $_SESSION['errors']['country'] ?>
                </p>
            </div>
            <?php endif; ?>



    </fieldset>
    <button type="submit">Déclarer mon animal</button>
  </form>
</body>
</html>


<?php
$_SESSION['error'] = null;  /* à la fin , il faut vider les données de session => des données flash */
$_SESSION['old'] = null;
