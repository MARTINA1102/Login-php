<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h2>Accesso all'area riservata</h2>
  <form action="controllaLogin.php" method=”post”>
    <p>
      email: <input type="text" name="email" size="40" />
      Password: <input type="password" name="password" size="40" /><br/>
    </p>
    <p>
      <input type="submit" name="invio" value="Login" />
      <input type="reset" name="cancella" value="Annulla" />
    </p>
  </form>
</body>
</html>
