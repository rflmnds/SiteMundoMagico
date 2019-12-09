<?php
    $local = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'mundomagico';

    $conn = mysqli_connect($local, $user, $pass, $db) or die ('Falha ao conectar no banco de dados');
?>