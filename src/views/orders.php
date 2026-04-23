<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Pasūtījumi</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px 12px; text-align: left; }
        th { background-color: #f0f0f0; }
        tr:nth-child(even) { background-color: #f9f9f9; }
    </style>
</head>
<body>
    <h1>Pasūtījumu saraksts</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Klients ID</th>
            <th>Datums</th>
            <th>Statuss</th>
            <th>Komentārs</th>
            <th>Piegādes datums</th>
        </tr>
        <?php foreach ($orders as $order): ?>
        <tr>
            <td><?= htmlspecialchars($order['order_id']) ?></td>
            <td><?= htmlspecialchars($order['customer_id']) ?></td>
            <td><?= htmlspecialchars($order['order_date']) ?></td>
            <td><?= htmlspecialchars($order['status']) ?></td>
            <td><?= htmlspecialchars($order['comment'] ?? '') ?></td>
            <td><?= htmlspecialchars($order['delivery_date'] ?? '') ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>