<div id="chat_container">
    <?php
    $sql = "SELECT * FROM (SELECT * FROM `messages` ORDER BY messageid DESC LIMIT 5) Var1 ORDER BY messageid ASC";
    $reponse = $base->query($sql);

    while ($donnees = $reponse->fetch()) {
        echo ("
        <table>
            <tr>
                <td>" . $donnees['author'] . " </td>
                <td>" . date("H:i", strtotime($donnees['date'])) . "</td>
            </tr>
            <tr>
                <td>" . htmlspecialchars($donnees['message'], ENT_QUOTES, 'UTF-8') . "</td>
            </tr>
        </table>
        <hr/>
        ");
    }

    $reponse->closeCursor();

    ?>

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

<!-- <div id='form' class=''>
        <form action='' method='post'>
            <label>Message</label>
            <input type='text' name='message'><br>
            <input type='submit' value='Envoyer'>
        </form>
        </div> -->