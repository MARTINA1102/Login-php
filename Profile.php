<?php
    // include il file che definisce la classe 
    include __DIR__ . '/Utente.php';
    if (!isset($user)) {
        echo "Spiacenti, non è stato possibile caricare il tuo profilo.";
        exit;
    }

    // se l'utente è autenticato, visualizza il contenuto della pagina del profilo
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profilo Utente</title>
</head>
<body>
    <h1>Benvenuto nel tuo profilo, <?php echo $user->lastName; ?></h1>
    <!-- qui puoi aggiungere il resto del contenuto della pagina del profilo -->
</body>
</html>
