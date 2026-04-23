<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Klienti</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        nav { display: flex; gap: 16px; margin-bottom: 24px; background: #222; padding: 12px 20px; border-radius: 6px; }
        nav a { text-decoration: none; color: #fff; font-weight: 500; }
        nav a:hover { color: #aaa; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px 12px; text-align: left; }
        th { background-color: #f0f0f0; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .top { display: flex; align-items: center; gap: 16px; margin-bottom: 16px; }
        .top h1 { margin: 0; }
        .btn { padding: 8px 14px; background: #222; color: #fff; text-decoration: none; border-radius: 4px; font-size: 14px; }
        .btn:hover { background: #444; }
        .btn-delete { background: #cc0000; border: none; cursor: pointer; font-size: 13px; padding: 6px 12px; color: #fff; border-radius: 4px; }
        .btn-delete:hover { background: #aa0000; }
        ul { margin: 0; padding-left: 20px; }
        li { margin: 4px 0; font-size: 13px; }
    </style>
</head>
<body>
    <?php require __DIR__ . '/nav.php'; ?>
    <div class="top">
        <h1>Klientu saraksts</h1>
        <a href="/customers/create" class="btn">+ Jauns klients</a>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Vārds</th>
            <th>Uzvārds</th>
            <th>E-pasts</th>
            <th>Dzimšanas datums</th>
            <th>Punkti</th>
            <?php if (isset($customers[0]) && !empty($customers[0]->orders)): ?>
            <th>Pasūtījumi</th>
            <?php endif; ?>
            <th>Darbības</th>
        </tr>
        <?php foreach ($customers as $customer): ?>
        <tr>
            <td><?= htmlspecialchars($customer->customer_id) ?></td>
            <td><?= htmlspecialchars($customer->first_name) ?></td>
            <td><?= htmlspecialchars($customer->last_name) ?></td>
            <td><?= htmlspecialchars($customer->email) ?></td>
            <td><?= htmlspecialchars($customer->birth_date) ?></td>
            <td><?= htmlspecialchars($customer->points) ?></td>
            <?php if (!empty($customer->orders)): ?>
            <td>
                <ul>
                    <?php foreach ($customer->orders as $order): ?>
                    <li>#<?= $order->order_id ?> — <?= $order->order_date ?> — <?= $order->status ?></li>
                    <?php endforeach; ?>
                </ul>
            </td>
            <?php endif; ?>
            <td>
                <form method="POST" action="/customers/<?= $customer->customer_id ?>/delete">
                    <button type="submit" class="btn-delete">Dzēst</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>