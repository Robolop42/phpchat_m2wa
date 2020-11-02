<div id="chat_container">
    <div id="chats">
        <div class="message" id="0"></div>
        <!-- <div id="loadmore">Load more</div> -->
        <!-- <?php
                // $sql = "SELECT * FROM (SELECT * FROM `messages` ORDER BY messageid DESC LIMIT 50) Var1 ORDER BY messageid ASC";
                // $reponse = $base->query($sql);

                // while ($donnees = $reponse->fetch()) {
                //     echo ("
                // <div class='chatInfo ");
                //     if ($donnees['author'] == $_SESSION['name']) {
                //         echo ('myinfo');
                //     };
                //     echo ("'>
                //     <span class='msgdate'>" . date("H:i", strtotime($donnees['date'])) . "</span>");
                //     if ($donnees['author'] != $_SESSION['name']) {
                //         echo ("<span class='msgauthor'>" . $donnees['author'] . "</span>");
                //     };
                //     echo ("
                // </div>
                // <div class='message ");
                //     if ($donnees['author'] == $_SESSION['name']) {
                //         echo ('mymessages');
                //     };
                // echo("' id='".$donnees['messageid']."'>". htmlspecialchars($donnees['message'], ENT_QUOTES, 'UTF-8')."</div>");

                // }

                // $reponse->closeCursor();

                ?> -->

    </div>
    <div id='form' class='send_msg'>
        <form action='' method='post'>
            <input type='text' autocomplete='off' name='message'><br>
            <input type='submit' value='Envoyer'>
        </form>
    </div>

</div>


<style type="text/css">
    <?php
    $css = file_get_contents('styles/chat.css');
    echo $css;


    echo (".chatInfo." . $_SESSION['name'] . "{justify-content: flex-end;}
        .message." . $_SESSION['name'] . "{    
            background-color: plum;
            margin-right: 5px;
            margin-left:auto;}
        .msgauthor." . $_SESSION['name'] . "{display:none;}")
    ?>
</style>

<script type="text/javascript">
    // // Scrolling to bottom chats (most recents)
    window.onload = function() {


        // objDiv.scrollTop = objDiv.scrollHeight;
        fetch_chats(true)
    }


    // function fetchdata(scroll) {
    //     $.ajax({
    //         url: 'fetch_chats.php',
    //         type: 'post',
    //         success: function(data) {
    //             var objDiv = document.getElementById("chats");
    //             $('#chats').html(data);
    //             if (scroll === true) {
    //                 objDiv.scrollTop = objDiv.scrollHeight;
    //             }
    //             //  objDiv.scrollTop = objDiv.scrollHeight;
    //             // location.reload();

    //         },
    //         complete: function(data) {
    //             setTimeout(function() {
    //                 fetchdata(false)
    //             }, 5000);
    //         }
    //     });
    // }

    let lastid = 0;
    setInterval(fetch_chats, 2000);

    function fetch_chats(scroll) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) { // Si le document est reçu et prêt
                var chats = document.getElementById("chats"); 
                chats.innerHTML = this.responseText; //Insérer le contenu du document pour 
                // var lastmsg  = ;
                // 
                if (chats.lastChild) {
                    lastid = chats.lastChild.getAttribute('id')
                }
                console.log(lastid);
                if (scroll === true) {
                    chats.scrollTop = chats.scrollHeight;
                }
            }
        };
        xhttp.open("GET", "fetch_chats.php?lastId=" + lastid, true);
        xhttp.send();
    }
    
</script>