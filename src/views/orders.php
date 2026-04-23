<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Pasūtījumi</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }

        /* Navigation bar */
        nav { display: flex; gap: 16px; margin-bottom: 24px; background: #cecece; padding: 12px 20px; border-radius: 6px; }
        nav a { text-decoration: none; color: #000000; font-weight: 700; border: 2px solid black; border-radius: 10px; padding: 6px 12px;}
        nav a:hover { color: #000000; background-color: #dddddd; }

        /* Table */
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px 12px; text-align: left; }
        th { background-color: #f0f0f0; }
        tr:nth-child(even) { background-color: #f9f9f9; }

        /* Top section */
        .top { display: flex; align-items: center; gap: 16px; margin-bottom: 16px; }
        .top h1 { margin: 0; }

        /* Buttons */
        .btn { padding: 8px 14px; background: #222; color: #fff; text-decoration: none; border-radius: 4px; font-size: 14px; }
        .btn:hover { background: #444; }
        
        .btn-delete { background: #e04040; border: none; cursor: pointer; font-size: 13px; padding: 6px 12px; color: #fff; border-radius: 4px; }
        .btn-delete:hover { background: #aa0000; }
    </style>
</head>
<body>
    <?php require __DIR__ . '/nav.php'; ?>
    <div class="top">
        <h1>Pasūtījumu saraksts</h1>
        <a href="/orders/create" class="btn">+ Jauns pasūtījums</a>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Klients ID</th>
            <th>Datums</th>
            <th>Statuss</th>
            <th>Komentārs</th>
            <th>Piegādes datums</th>
            <th>Darbības</th>
        </tr>
        <?php foreach ($orders as $order): ?>
        <tr>
            <td><?= htmlspecialchars($order->order_id) ?></td>
            <td><?= htmlspecialchars($order->customer_id) ?></td>
            <td><?= htmlspecialchars($order->order_date) ?></td>
            <td><?= htmlspecialchars($order->status) ?></td>
            <td><?= htmlspecialchars($order->comment ?? '') ?></td>
            <td><?= htmlspecialchars($order->delivery_date ?? '') ?></td>
            <td>
                <form method="POST" action="/orders/<?= $order->order_id ?>/delete">
                    <button type="submit" class="btn-delete">Dzēst</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>