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
            <label>Connection</label>
            <input type='text' name='name'><br>
            <input type='password' name='password'><br>
            <input type='submit' value='Se connecter'>
        </form>
        <div><a href='signup.php'>S'inscrire</a></div>
        </div>"); 
    }
    ?>