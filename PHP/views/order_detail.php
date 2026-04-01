    <h1>☕Order Detail</h1>
    <div class="order-card">
        <dl>
            <dt>Order ID</dt>
            <dd> <?= htmlspecialchars($order['id']) ?> </dd>
            <dt>Order Datetime</dt>
            <dd> <?= htmlspecialchars($order['order_datetime']) ?></dd>
            <dt> Customer Name</dt>
            <dd> <?= htmlspecialchars($order['customer_name']) ?></dd>
            <dt> Menu</dt>
            <dd> <?= htmlspecialchars($order['menu_name']) ?></dd>
            <dt>Qty</dt>
            <dd><?= htmlspecialchars($order['quantity']) ?></dd>
            <dt>Price</dt>
            <dd><?= htmlspecialchars($order['price']) ?></dd>
        </dl>
    </div>
    <a href="order_list">Back to Order List</a>
