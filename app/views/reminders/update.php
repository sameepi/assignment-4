<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Reminder</title>
    <link rel="stylesheet" href="/assignment4/public/style.css">
</head>
<body>
<div class="container">
    <div class="card">
        <h2>Edit Reminder</h2>
        <form method="POST" action="/assignment4/public/index.php?url=reminders/update">
            <input type="hidden" name="id" value="<?= $reminder['id'] ?>">
            <input type="text" name="subject" value="<?= htmlspecialchars($reminder['subject']) ?>" required>
            <button type="submit">Update</button>
        </form>
    </div>
</div>
</body>
</html>