<?php
require_once('database.php');

if (isset($_POST['register'])) {
    $firstname = $_POST['firstname'] ?? '';
    $lastname = $_POST['lastname'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $isEmailValid = filter_var(
        $email,
        FILTER_VALIDATE_EMAIL, [
            "options" => [
                "regexp" => "/^(([^<>()\[\]\\.,;:\s@\"]+(\.[^<>()\[\]\\.,;:\s@\"]+)*)|(\".+\"))@(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,})$/"
            ]
        ]
    );
    $pwdLenght = mb_strlen($password);
    
    if (empty($email) || empty($password)) {
        $msg = 'Compila tutti i campi %s';
    } elseif (false === $isEmailValid) {
        $msg = 'L\' email non è valida.';
    } elseif ($pwdLenght < 8 || $pwdLenght > 10) {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $query = "
            SELECT id
            FROM users
            WHERE email = :email
        ";
        
        $check = $pdo->prepare($query);
        $check->bindParam(':email', $email, PDO::PARAM_STR);
        $check->execute();
        
        $user = $check->fetchAll(PDO::FETCH_ASSOC);
        
        if (count($user) > 0) {
            $msg = 'Email già in uso %s';
        } else {
            $query = "
                INSERT INTO users
                VALUES (0, :firstname, :lastname, :email, :password)
            ";
        
            $check = $pdo->prepare($query);
            $check->bindParam(':firstname', $firstname, PDO::PARAM_STR);
            $check->bindParam(':lastname', $lastname, PDO::PARAM_STR);
            $check->bindParam(':email', $email, PDO::PARAM_STR);
            $check->bindParam(':password', $password_has, PDO::PARAM_STR);
            $check->execute();
            
            if ($check->rowCount() > 0) {
                $msg = 'Registrazione eseguita con successo';
            } else {
                $msg = 'Problemi con l\'inserimento dei dati %s';
            }
        }
    }
    
    printf($msg, '<a href="register.html">torna indietro</a>');
}