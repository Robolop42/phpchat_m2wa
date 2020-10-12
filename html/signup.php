<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Signup</title>

    <style>
        .hide {
            display: none;
        }
    </style>
</head>

<body>

    <?php

    try {
        $base = new PDO('mysql:host=localhost;dbname=users', 'admin', ']weCRJnL84');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $new_log = isset($_POST['new_name']) ? $_POST['new_name'] : NULL;
    $new_pass = isset($_POST['new_password']) ? $_POST['new_password'] : NULL;

    if (is_null($new_log)) {
        echo ('Veuillez indiquer un pseudonyme');
    } elseif (is_null($new_pass)) {
        echo ('Veuillez indiquer un mot de passe');
    } else {
        $hash_pass = password_hash($new_pass, PASSWORD_DEFAULT);
        $sql_signup = "INSERT INTO usertable(login, password) VALUES ('$new_log','$hash_pass');";
        echo($sql_signup);
        $base->exec($sql_signup);
        $err = $base->errorInfo();
        print_r($err);
        header("Location: /index.php");
        exit();
    }



echo($new_log . $new_pass)

    ?>

    <div id='form' class=''>
        <form action='' method='post'>
            <label>Inscription</label>
            <input type='text' name='new_name'><br>
            <input type='password' name='new_password'><br>
            <input type='submit' value="S'inscire">
        </form>
    </div>

    
</body>



<script type="text/javascript">
</script>

</html>