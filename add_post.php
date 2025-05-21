<?php
include 'db.php';

// proměnné
$title = $_POST['title'] ?? null;
$author = $_POST['author'] ?? '';
$content = $_POST['content'] ?? '';

// větvení 1 – kontrola prázdných vstupů
if (!$title || !$author || !$content) {
    die("Vyplň všechna pole.");
}

// INSERT do threads
$stmt = $conn->prepare("INSERT INTO threads (title, author) VALUES (?, ?)");
$stmt->bind_param("ss", $title, $author);
$stmt->execute();
$thread_id = $stmt->insert_id;

// INSERT do posts
$stmt = $conn->prepare("INSERT INTO posts (thread_id, author, content) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $thread_id, $author, $content);
$stmt->execute();

header("Location: thread.php?id=$thread_id");
exit;
?>
