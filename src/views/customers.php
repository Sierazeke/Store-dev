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
        ul { margin: 0; padding-left: 20px; }
        li { margin: 4px 0; font-size: 13px; }
    </style>
</head>
<body>
    <?php require __DIR__ . '/nav.php'; ?>
    <h1>Klientu saraksts</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Vārds</th>
            <th>Uzvārds</th>
            <th>E-pasts</th>
            <th>Dzimšanas datums</th>
            <th>Punkti</th>
            <?php if (isset($customers[0]['orders'])): ?>
            <th>Pasūtījumi</th>
            <?php endif; ?>
        </tr>
        <?php foreach ($customers as $customer): ?>
        <tr>
            <td><?= htmlspecialchars($customer['customer_id']) ?></td>
            <td><?= htmlspecialchars($customer['first_name']) ?></td>
            <td><?= htmlspecialchars($customer['last_name']) ?></td>
            <td><?= htmlspecialchars($customer['email']) ?></td>
            <td><?= htmlspecialchars($customer['birth_date']) ?></td>
            <td><?= htmlspecialchars($customer['points']) ?></td>
            <?php if (isset($customer['orders'])): ?>
            <td>
                <?php if (empty($customer['orders'])): ?>
                    <em>Nav pasūtījumu</em>
                <?php else: ?>
                    <ul>
                        <?php foreach ($customer['orders'] as $order): ?>
                        <li>
                            #<?= htmlspecialchars($order['order_id']) ?>
                            — <?= htmlspecialchars($order['order_date']) ?>
                            — <?= htmlspecialchars($order['status']) ?>
                            <?php if ($order['comment']): ?>
                                (<?= htmlspecialchars($order['comment']) ?>)
                            <?php endif; ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </td>
            <?php endif; ?>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>