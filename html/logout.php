<?php
  function logout() {
    session_destroy();
  }

  if (isset($_POST['logout'])) {
    logout();
  }
?>

<form action="" method="post">
<input type="submit" value="logout" name="logout">
</form>
</html>