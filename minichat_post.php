
<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <p>
            <?php
            $bdd = new PDO('mysql:host=localhost;dbname=minichat', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            //récupère toutes les données de la base de données 
            $requete = $bdd->prepare('INSERT INTO minichat (pseudo, message) VALUES (:pseudo, :message)');
            $requete->bindValue(':pseudo', htmlspecialchars($_POST['pseudo']), PDO::PARAM_STR);
            $requete->bindValue(':message', htmlspecialchars($_POST['message']), PDO::PARAM_STR);
            $requete->execute();
            header( 'Location: index.php');
            ?>
        </p>
    </body>
</html>
