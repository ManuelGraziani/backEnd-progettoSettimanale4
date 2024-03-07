<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require_once('database.php');
require_once('db_pdo.php');
require_once('userDTO.php');
$config = require_once('config.php');

use DB\DB_PDO as DB;

// Connessione al database
$PDOConn = DB::getInstance($config);
$conn = $PDOConn->getConnection();
$userDTO = new UserDTO($conn);

if (!isset($_SESSION['session_id'])) {
    // Reindirizza l'utente alla pagina di login
    header('Location: index.php');
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Pagina utente</a>
            <a href="logout.php" class="btn btn-outline-success">Logout</a>
        </div>
    </nav>
    <div class="container my-5 text-center">
        <h1>Ciao <?php echo $_SESSION['nomeutente'];  ?></h1>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>