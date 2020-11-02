<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    // Si on a reçu un id
    if(isset($_GET['lastId'])){
        // On le change en entier
        $lastId = (int)strip_tags($_GET['lastId']);

        try {
            $base = new PDO('mysql:host=localhost;dbname=users', 'admin', ']weCRJnL84');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $sql = "SELECT * FROM `messages` ORDER BY messageid DESC LIMIT 1";
        $reponse = $base->query($sql);
        $donnees = $reponse->fetch();

        // Si l'id du dernier message est supérieur à celui reçu
       if ($donnees['messageid'] > $lastId)
    {  
        // On renvoie les derniers messages
        include('display_chats.php');
    }
        // Sinon on retourne un code 304 car le document n'est pas modifié
        else {
            http_response_code(304);
            echo(json_encode(['message' => 'HTTP 405 : Unmodified document']));
            }
        }
    }
else{
    // Si la méthode n'est pas GET, on retourne un code 405
    http_response_code(405);
    echo(json_encode(['message' => 'HTTP 405 : Method not allowed']));
    };
?>