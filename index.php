<?php
session_start();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
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
        <label for="email">* Email</label>
        <input type="email" name="email" id="email" required
               <?php
               if(isset($_SESSION['errors']['email'])): ?>
                    value="<?= $_SESSION['errors']['email'] ?>"
               <?php endif ?>
               name="email"> <!-- le name est obli  -->
      </div>

      <div>
          <label for="vemail">* Verifier l'email</label>
          <input type="email" name="vemail" id="vemail" required
              <?php
              if(isset($_SESSION['errors']['vemail'])): ?>
                  value="<?= $_SESSION['errors']['vemail'] ?>"
              <?php endif ?>
                 name="vemail">
      </div>

        <div>
            <label for="phone">Téléphone</label>    
            <input type="tel"
                   id="phone"
                <?php
                if(isset($_SESSION['errors']['phone'])): ?>
                    value="<?= $_SESSION['errors']['phone'] ?>"
                <?php endif ?>
                   name="phone">
        </div>
        
        <div>
            <label for="country">Pays</label>
            <input list="country">
            <datalist id="country">
                <option value="Belgique"></option>
                <option value="France"></option>
            </datalist>
        </div>


        <?php if (isset($_SESSION['errors'])): ?>
        <div>
            <p><?=$_SESSION['errors'] ?></p>
        </div>
        <?php endif;?>
    </fieldset>
    <button type="submit">Déclarer mon animal</button>
  </form>
</body>
</html>

<?php
$_SESSION['error'] = null;
