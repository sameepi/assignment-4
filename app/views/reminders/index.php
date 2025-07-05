<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reminders</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<div class="container">
    <div class="card">
        <h1>Reminders</h1>
        <a href="/index.php?url=reminders/create" class="button-link">Create New Reminder</a>
        <ul>
        <?php foreach ($reminders as $reminder): ?>
            <li>
                <?= htmlspecialchars($reminder['subject']) ?> 
                (<?= $reminder['created_at'] ?>)
                <form method="POST" action="/index.php?url=reminders/delete" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $reminder['id'] ?>">
                    <button type="submit">Delete</button>
                </form>
                <a href="/index.php?url=reminders/update&id=<?= $reminder['id'] ?>">Edit</a>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>
</div>
</body>
</html>
