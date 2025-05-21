<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Nové téma</title></head>
<body>
<h1>Vytvořit nové téma</h1>
<form method="POST" action="add_post.php">
    <input name="title" placeholder="Název tématu" required><br>
    <input name="author" placeholder="Tvé jméno" required><br>
    <textarea name="content" placeholder="Úvodní příspěvek" required></textarea><br>
    <button type="submit">Odeslat</button>
</form>
</body>
</html>
