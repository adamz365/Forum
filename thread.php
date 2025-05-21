<?php
include 'db.php';
$id = $_GET['id'] ?? 0;

// větvení 2 – kontrola, že ID je číslo
if (!is_numeric($id)) die("Neplatné ID.");

$thread = $conn->query("SELECT * FROM threads WHERE id = $id")->fetch_assoc();
if (!$thread) die("Téma nenalezeno.");
?>
<!DOCTYPE html>
<html>
<head><title><?= htmlspecialchars($thread['title']) ?></title></head>
<body>
<h1><?= htmlspecialchars($thread['title']) ?></h1>
<p><em>Založil: <?= $thread['author'] ?></em></p>
<hr>

<?php
$posts = $conn->query("SELECT * FROM posts WHERE thread_id = $id");

// cyklus 2 – výpis příspěvků
while ($p = $posts->fetch_assoc()) {
    echo "<div><strong>{$p['author']}:</strong><br>" . htmlspecialchars($p['content']) . "</div><hr>";
}
?>

<h3>Odpovědět:</h3>
<form method="POST" action="add_post_reply.php">
    <input type="hidden" name="thread_id" value="<?= $id ?>">
    <input name="author" placeholder="Tvé jméno" required><br>
    <textarea name="content" placeholder="Text příspěvku" required></textarea><br>
    <button type="submit">Odeslat</button>
</form>
</body>
</html>
