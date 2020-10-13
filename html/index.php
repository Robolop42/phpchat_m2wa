<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Best PHP chat ever</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" async></script>
</head>

<body>
    <?php
    session_start();

    try {
        $base = new PDO('mysql:host=localhost;dbname=users', 'admin', ']weCRJnL84');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $log = isset($_POST['name']) ? $_POST['name'] : NULL;
    $pass = isset($_POST['password']) ? $_POST['password'] : NULL;


    // if (isset($_POST['name'])) {
    //     $status = "unvalid";
    //     $_SESSION['name'] = $log;
    // } elseif (isset($_SESSION['name']))
    // {
    //     // $status = "valid";
    // } else {
    //     $status = "unset";
    // }

    if (isset($_POST['logout'])) {
        session_destroy();
        header("Location: /index.php");
    }

    if (isset($_POST['message'])) {
        #Gestion des apostrophes
        $message = str_replace("'", "''", $_POST['message']);
        unset($_POST['message']);
        #Le nom de l'auteur est disponible dans les informations de sessions
        $author = $_SESSION['name'];
        #Génération et execution de la query SQL
        $sql1 = "INSERT INTO messages(author, message)
            VALUES ('$author','$message');";
        $base->exec($sql1);
        
    };

    $sql = "SELECT * FROM `usertable` WHERE (login='$log');";
    $reponse = $base->query($sql);

    $donnees = $reponse->fetch();
    if (is_array($donnees)) #Si la réponse est parvenue 
    {
        if (password_verify($pass, $donnees['password'])) #et si le mot de passe est vérifié
        {
            // $status == "valid"; #Action
            $_SESSION['name'] = $log;
        } else {
            $password_incorrect = True;
        }
    } elseif (isset($_POST['connect'])) {
        $username_incorrect = True;
    }



    $reponse->closeCursor();
    ?>


    <!-- Si le statut est valide alors on charge le chat -->
    <?php
    include("header.php");
    if (isset($_SESSION['name'])) {
        include("chat.php");
    }
    ?>

</body>



<script type="text/javascript">
</script>

</html>