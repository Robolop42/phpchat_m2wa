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
    // Scrolling to bottom chats (most recents)
    window.onload = function() {


        // objDiv.scrollTop = objDiv.scrollHeight;
        fetchdata(true)
    }


    function fetchdata(scroll) {
        $.ajax({
            url: 'fetch_chats.php',
            type: 'post',
            success: function(data) {
                var objDiv = document.getElementById("chats");
                $('#chats').html(data);
                if (scroll === true) {
                    objDiv.scrollTop = objDiv.scrollHeight;
                }
                //  objDiv.scrollTop = objDiv.scrollHeight;
                // location.reload();

            },
            complete: function(data) {
                setTimeout(function() {fetchdata(false)}, 5000);
            }
        });
    }

    // function loadXMLDoc() {
    //     var xmlhttp = new XMLHttpRequest();

    //     xmlhttp.onreadystatechange = function() {
    //         console.log('ready');
    //         if (xmlhttp.readyState == XMLHttpRequest.DONE) {
    //             if (xmlhttp.status == 200) {
    //                 console.log(xmlhttp.responseText);
    //             } else {
    //                 alert('something else other than 200 was returned');
    //             }
    //         }
    //     };

    //     xmlhttp.open("GET", "fetch_chats.php", true);
    //     xmlhttp.send();
    // }
</script>