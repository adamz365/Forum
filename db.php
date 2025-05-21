<?php
// Připojení k databázi
$conn = new mysqli("localhost", "hrona", "hron456adam@", "hrona_forum");
if ($conn->connect_error) {
    die("Chyba připojení: " . $conn->connect_error);
}
?>