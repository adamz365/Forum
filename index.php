<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Fórum</title><link rel="stylesheet" href="style.css"></head>
<body>
<h1>Fórum – Témata</h1>
<a href="new_thread.php">+ Nové téma</a>
<hr>

<?php
$result = $conn->query("SELECT * FROM threads ORDER BY id DESC");

// cyklus 1 – výpis témat
while ($row = $result->fetch_assoc()) {
    echo "<div><a href='thread.php?id={$row['id']}'>" . htmlspecialchars($row['title']) . "</a> – <em>{$row['author']}</em></div>";
}
?>
</body>
</html>
