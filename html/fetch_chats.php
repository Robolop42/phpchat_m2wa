<?php
    try {
        $base = new PDO('mysql:host=localhost;dbname=users', 'admin', ']weCRJnL84');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
$sql = "SELECT * FROM `messages` ORDER BY messageid DESC LIMIT 1";
$reponse = $base->query($sql);
$donnees = $reponse->fetch();
// print_r($donnees['messageid']);

$last = print("<script>$('.message:last').attr('id');</script>");

if ($donnees['messageid'] > $last)
    {  
        include('display_chats.php');
    }
?>