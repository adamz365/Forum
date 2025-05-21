<?php
include 'db.php';
$thread_id = $_POST['thread_id'] ?? 0;
$author = $_POST['author'] ?? '';
$content = $_POST['content'] ?? '';

// větvení 3 – kontrola
if (!$thread_id || !$author || !$content) {
    die("Vyplň všechna pole.");
}

// INSERT odpovědi
$stmt = $conn->prepare("INSERT INTO posts (thread_id, author, content) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $thread_id, $author, $content);
$stmt->execute();

header("Location: thread.php?id=$thread_id");
exit;
?>
