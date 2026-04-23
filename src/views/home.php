<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>DevStore</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        nav { display: flex; gap: 16px; margin-bottom: 24px; }
        nav a { text-decoration: none; color: #333; font-weight: 500; }
        nav a:hover { color: #000; }
        .stats { display: flex; gap: 20px; margin-bottom: 30px; }
        .card { border: 1px solid #ccc; border-radius: 8px; padding: 20px 30px; text-align: center; }
        .card h2 { margin: 0; font-size: 36px; }
        .card p { margin: 4px 0 0; color: #666; font-size: 14px; }
        table { border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 8px 20px; text-align: left; }
        th { background-color: #f0f0f0; }
    </style>
</head>
<body>
    <?php require __DIR__ . '/nav.php'; ?>
    <h1>DevStore</h1>
    <div class="stats">
        <div class="card">
            <h2><?= $customerCount ?></h2>
            <p>Klienti</p>
        </div>
        <div class="card">
            <h2><?= $orderCount ?></h2>
            <p>Pasūtījumi</p>
        </div>
    </div>
    <h2>Pasūtījumi pēc statusa</h2>
    <table>
        <tr>
            <th>Statuss</th>
            <th>Skaits</th>
        </tr>
        <?php foreach ($ordersByStatus as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['status']) ?></td>
            <td><?= htmlspecialchars($row['count']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>