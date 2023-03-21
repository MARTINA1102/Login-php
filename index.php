<?php
include_once __DIR__ . '/Utente.php';
include_once __DIR__ . '/Auth.php';

?>
<!-- Form di login -->
<form method="post" action="">
  <label for="email">Email:</label>
  <input type="text" name="email" required>

  <label for="password">Password:</label>
  <input type="password" name="password" required>

  <input type="submit" name="login" value="Login">
</form>
