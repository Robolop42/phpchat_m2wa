<div id="chat_container">
    <div id="chats">
        <div id="loadmore">Load more</div>
        <?php
        $sql = "SELECT * FROM (SELECT * FROM `messages` ORDER BY messageid DESC LIMIT 50) Var1 ORDER BY messageid ASC";
        $reponse = $base->query($sql);

        while ($donnees = $reponse->fetch()) {
            echo ("
        <div class='chatInfo ");
        if ($donnees['author'] == $_SESSION['name'])
         {
            echo('myinfo');
         };
        echo("'>
            <span class='msgdate'>" . date("H:i", strtotime($donnees['date'])) . "</span>");
            if ($donnees['author'] != $_SESSION['name'])
            {
               echo("<span class='msgauthor'>" . $donnees['author'] . "</span>");
            };
            echo("
        </div>
        <div class='message ");
        if ($donnees['author'] == $_SESSION['name'])
         {
            echo('mymessages');
         };
        echo("'>
        " . htmlspecialchars($donnees['message'], ENT_QUOTES, 'UTF-8') . "
        </div>");

            // <table>
            //     <tr>
            //         <td>" .  . " </td>
            //         <td>" . date("H:i", strtotime($donnees['date'])) . "</td>
            //     </tr>
            //     <tr>
            //         <td>" . htmlspecialchars($donnees['message'], ENT_QUOTES, 'UTF-8') . "</td>
            //     </tr>
            // </table>
            // <hr/>
            // ");
        }

        $reponse->closeCursor();

        ?>

    </div>
    <div id='form' class='send_msg'>
        <form action='' method='post'>
            <input type='text' name='message'><br>
            <input type='submit' value='Envoyer'>
        </form>
    </div>

</div>

<style type="text/css">
    <?php
    $css = file_get_contents('styles/chat.css');
    echo $css;
    ?>
</style>

<script type="text/javascript">
    window.onload = function() {
        var objDiv = document.getElementById("chats");
        objDiv.scrollTop = objDiv.scrollHeight;
    }
</script>

<!-- <div id='form' class=''>
        <form action='' method='post'>
            <label>Message</label>
            <input type='text' name='message'><br>
            <input type='submit' value='Envoyer'>
        </form>
        </div> -->