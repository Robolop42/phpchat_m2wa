<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    // Si on a reçu un id
    if(isset($_GET['lastId'])){
        // On le change en entier
        $lastId = (int)strip_tags($_GET['lastId']);
        $channel = $_GET['channel'];

        try {
            $base = new PDO('mysql:host=172.28.100.14;port=3306;dbname=users', 'chat', ']weCRJnL84');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        $sql = "SELECT * FROM `messages`  WHERE channel = ". "'". $channel ."'ORDER BY messageid DESC LIMIT 1";
        $reponse = $base->query($sql);
        $donnees = $reponse->fetch();
        $reponse->closeCursor();
        // Si l'id du dernier message est supérieur à celui reçu
       if ($donnees['messageid'] > $lastId)
    {  
        // On renvoie les derniers messages
        // include('display_chats.php');
        $sql = "SELECT * FROM (SELECT * FROM `messages` WHERE channel = ". "'". $channel ."'ORDER BY messageid DESC LIMIT 50) Var1 ORDER BY messageid ASC";
        $reponse = $base->query($sql);

        while ($donnees = $reponse->fetch()) {
            echo ("
        <div class='chatInfo ");
  
            echo ($donnees['author']);
            echo ("'>
            <span class='msgdate'>" . date("H:i", strtotime($donnees['date'])) . "</span>");
            // if ($donnees['author'] != $_SESSION['name']) {
                echo ("<span class='msgauthor ". $donnees['author']."'>" . $donnees['author'] . "</span>");
            // };
            echo ("
        </div>
        <div class='message ");
        echo ($donnees['author']);
            // if ($donnees['author'] == $_SESSION['name']) {
            //     echo ('mymessages');
            // };
        echo("' id='".$donnees['messageid']."'>". htmlspecialchars($donnees['message'], ENT_QUOTES, 'UTF-8')."</div>");

        }

        $reponse->closeCursor();






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