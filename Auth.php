<?php
    require_once __DIR__ . '/Utente.php';
    class Auth {
        private $users;
      
        public function __construct() {
          // Connessione al database e recupero degli utenti
            $conn = mysqli_connect('localhost', 'root', 'root', 'loginauth');
            $query = "SELECT * FROM users";
            $result = mysqli_query($conn, $query);
      
          // Creazione degli oggetti User
            $this->users = array();
            while($row = mysqli_fetch_assoc($result)) {
                $user = new Utente($row['email'], $row['password'], $row['lastName']);
                $this->users[] = $user;
            }
        }
        public function login($email, $password) {
            foreach($this->users as $user) {
              if($user->getEmail() == $email && $user->getPassword() == $password) {
                // Credenziali corrette, creazione della sessione
                $_SESSION['email'] = $email;
                return true;
              }
            }
        
            // Credenziali errate, restituzione di false
            return false;
          }
        
          public function logout() {
            // Distruzione della sessione
            session_destroy();
          }
          public function isAuthenticated() {
            // Verifica se l'utente è autenticato
            return isset($_SESSION['email']);
          }
        }

// Creazione dell'oggetto Auth
$auth = new Auth();

// Gestione delle richieste di login e logout
if(isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  if($auth->login($email, $password)) {
    header("Location: profile.php");
    exit();
  } else {
    $error = "email o password errati.";
  }
} else if(isset($_POST['logout'])) {
  $auth->logout();
  header("Location: login.php");
  exit();
}// Controllo se l'utente è autenticato 
if($auth->isAuthenticated()) {
  // L'utente è autenticato, reindirizzamento alla pagina di profilo
  header("Location: profile.php");
  exit();
}
?>



<?php
// Mostra messaggio di errore se presente
if(isset($error)) {
  echo $error;
}
?>
                      