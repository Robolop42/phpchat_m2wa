<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if(isset($_SESSION['channel'])){

    if(isset($_SESSION['name'])) {
        if (isset($_POST['message'])) {
            try {
                $base = new PDO('mysql:host=172.28.100.14;port=3306;dbname=users', 'chat', ']weCRJnL84');
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
            echo($_POST['message']);
            #Gestion des apostrophes
            $message = str_replace("'", "''", $_POST['message']);
            // unset($_POST['message']);
            // #Le nom de l'auteur est disponible dans les informations de sessions
            $author = $_SESSION['name'];
            $channel = $_SESSION['channel'];
            // #Génération et execution de la query SQL
            $sql1 = "INSERT INTO messages(channel, author, message)
                 VALUES ('$channel','$author','$message');";
            $base->exec($sql1);
            
        };
    };
};
};
?>