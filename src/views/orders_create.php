<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Jauns pasūtījums</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        nav { display: flex; gap: 16px; margin-bottom: 24px; background: #222; padding: 12px 20px; border-radius: 6px; }
        nav a { text-decoration: none; color: #fff; font-weight: 500; }
        nav a:hover { color: #aaa; }
        form { display: flex; flex-direction: column; gap: 12px; max-width: 400px; }
        label { font-size: 14px; color: #555; display: block; margin-bottom: 4px; }
        input, select, textarea { padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px; width: 100%; }
        button { padding: 10px; background: #222; color: #fff; border: none; border-radius: 4px; cursor: pointer; font-size: 14px; }
        button:hover { background: #444; }
    </style>
</head>
<body>
    <?php require __DIR__ . '/../views/nav.php'; ?>
    <h1>Jauns pasūtījums</h1>
    <form method="POST" action="/orders">
        <div>
            <label for="customer_id">Klients</label>
            <select name="customer_id" id="customer_id" required>
                <?php foreach ($customers as $customer): ?>
                <option value="<?= $customer->customer_id ?>">
                    <?= htmlspecialchars($customer->first_name . ' ' . $customer->last_name) ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="order_date">Pasūtījuma datums</label>
            <input type="date" name="order_date" id="order_date" value="<?= date('Y-m-d') ?>" required>
        </div>
        <div>
            <label for="status">Statuss</label>
            <select name="status" id="status" required>
                <option value="pending">Pending</option>
                <option value="processing">Processing</option>
                <option value="shipped">Shipped</option>
                <option value="delivered">Delivered</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>
        <div>
            <label for="comment">Komentārs</label>
            <textarea name="comment" id="comment" rows="3"></textarea>
        </div>
        <div>
            <label for="delivery_date">Piegādes datums</label>
            <input type="date" name="delivery_date" id="delivery_date">
        </div>
        <button type="submit">Izveidot pasūtījumu</button>
    </form>
</body>
</html>