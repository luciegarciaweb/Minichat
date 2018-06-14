
<?php
function _e($string){
    echo htmlspecialchars($string, ENT_QUOTES,'UTF-8');
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Mini CHAT</title>
      
    </head>
    <body background="img/owlet.jpg">
        
        <br>
        <br>
        <p>
            
            Bienvenue sur mon minichat à tester!
            
        </p>

        <br>
        <br>
        
        <!--minichat use-->
        <form action="minichat_post.php" method="POST">
            <label>Entrer pseudo<input type="text" name="pseudo" required="required"></label><br><br>
            <label>Entrer message <input type="text" name="message" required="required"></label>
            <p> <input type="submit" value="valider"/></p> <br><br>

            
                <?php
                //connection to mySQL data base 'minichat'
                $bdd = new PDO('mysql:host=localhost;dbname=minichat', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

                $requete = $bdd->query('SELECT created_date,pseudo,message FROM minichat ORDER BY id DESC LIMIT 10');

                // Loop while, fetch  get 1 new line from the table
                while ($data = $requete->fetch()) {
                    //show with protection: fonction _e (htmlspecialchars):
                    _e( '['. $data['created_date'] . '] '. $data['pseudo'] . ' : ' . $data['message']);
                    echo '<br>';
                
                    
                } 
                ?>
            
        </form>
    </body>
</html>
