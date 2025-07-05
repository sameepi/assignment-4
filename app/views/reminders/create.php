<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create Reminder</title>
    <link rel="stylesheet" href="/assignment4/public/style.css">
</head>
<body>
<div class="container">
    <div class="card">
        <h2>Create Reminder</h2>

        <form method="POST" action="/assignment4/public/index.php?url=reminders/create">
            <input type="text" name="subject" placeholder="Reminder subject" required>
            <button type="submit">Add</button>
        </form>
    </div>
</div>
</body>
</html>
