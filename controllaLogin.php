<?php
$host = "localhost";
$username = "root";
$password = "root";
$db_nome = "loginauth";
$tab_nome = "users";
$conn = new mysqli($host, $username, $password, $db_nome);

if ($conn->connect_error) {
  die("Connessione fallita: " . $conn->connect_error);
};

// acquisizione dati dal form HTML
$email = '';
if(isset($_POST["email"]) && isset($_POST["password"])) {
  // acquisizione dati dal form HTML
  $email = $_POST["email"];
  $password = $_POST["password"];
}

// lettura della tabella utenti
$sql = "SELECT * FROM $tab_nome WHERE Email='$email'";
$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  if (password_verify($password, $row["Password"])) {
    // ...
  }
} else {
  echo "Identificazione non riuscita: nome utente o password errati <br />";
  echo "Torna a pagina di <a href=\"index.php\">login</a>";
}
