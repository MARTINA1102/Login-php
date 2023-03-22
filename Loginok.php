<?php
session_start();
if(!isset($_SESSION['email'])) {
    header("Location: index.php");
}
?>
<html>
<body>
	Identificazione utente riuscita! <br />
    Benvenuto nell'area riservata <br />
    premi su <a href="Logout.php">Logout</a> per disconnetterti
</body>
</html>
