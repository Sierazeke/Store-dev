<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Jauns klients</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        nav { display: flex; gap: 16px; margin-bottom: 24px; background: #222; padding: 12px 20px; border-radius: 6px; }
        nav a { text-decoration: none; color: #fff; font-weight: 500; }
        nav a:hover { color: #aaa; }
        form { display: flex; flex-direction: column; gap: 12px; max-width: 400px; }
        label { font-size: 14px; color: #555; display: block; margin-bottom: 4px; }
        input { padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px; width: 100%; }
        button { padding: 10px; background: #222; color: #fff; border: none; border-radius: 4px; cursor: pointer; font-size: 14px; }
        button:hover { background: #444; }
    </style>
</head>
<body>
    <?php require __DIR__ . '/nav.php'; ?>
    <h1>Jauns klients</h1>
    <form method="POST" action="/customers">
        <div>
            <label for="first_name">Vārds</label>
            <input type="text" name="first_name" id="first_name" required>
        </div>
        <div>
            <label for="last_name">Uzvārds</label>
            <input type="text" name="last_name" id="last_name" required>
        </div>
        <div>
            <label for="email">E-pasts</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="birth_date">Dzimšanas datums</label>
            <input type="date" name="birth_date" id="birth_date" required>
        </div>
        <div>
            <label for="points">Punkti</label>
            <input type="number" name="points" id="points" value="0" min="0">
        </div>
        <button type="submit">Izveidot klientu</button>
    </form>
</body>
</html>