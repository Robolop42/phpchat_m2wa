<?php 
    if(isset($_SESSION['name']))
    {
        echo("
        <form action='' method='post'>
            <input type='submit' value='logout' name='logout'>
        </form>");
    }
    else {
    echo("<div id='form' class=''>
        <form action='' method='post'>
            <label>Connection</label><br>
            <input type='text' name='name'>");
            if(isset($username_incorrect)) {echo(' username incorrect');}
            echo("<br>
            <input type='password' name='password'>");
            if(isset($password_incorrect)) {echo(' password incorrect');}
            echo("<br>
            <input type='submit' name='connect' value='Se connecter'>
        </form>
        <div><a href='signup.php'>S'inscrire</a></div>
        </div>"); 
    }
    ?>