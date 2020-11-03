<!-- <?php
    // try {
    //     $base = new PDO('mysql:host=172.28.100.14;port=3306;dbname=users', 'chat', ']weCRJnL84');
    // } catch (Exception $e) {
    //     die('Erreur : ' . $e->getMessage());
    // }
    
    //     $sql = "SELECT * FROM (SELECT * FROM `messages` WHERE channel = ". "'". $channel ."'ORDER BY messageid DESC LIMIT 50) Var1 ORDER BY messageid ASC";
    //     $reponse = $base->query($sql);

    //     while ($donnees = $reponse->fetch()) {
    //         echo ("
    //     <div class='chatInfo ");
  
    //         echo ($donnees['author']);
    //         echo ("'>
    //         <span class='msgdate'>" . date("H:i", strtotime($donnees['date'])) . "</span>");
    //         // if ($donnees['author'] != $_SESSION['name']) {
    //             echo ("<span class='msgauthor ". $donnees['author']."'>" . $donnees['author'] . "</span>");
    //         // };
    //         echo ("
    //     </div>
    //     <div class='message ");
    //     echo ($donnees['author']);
    //         // if ($donnees['author'] == $_SESSION['name']) {
    //         //     echo ('mymessages');
    //         // };
    //     echo("' id='".$donnees['messageid']."'>". htmlspecialchars($donnees['message'], ENT_QUOTES, 'UTF-8')."</div>");

    //     }

    //     $reponse->closeCursor(); -->
