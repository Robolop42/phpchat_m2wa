<?php
  function logout() {
    session_destroy();
  }


?>

<form action="" method="post">
<input type="submit" value="logout" name="logout">
</form>
</html>