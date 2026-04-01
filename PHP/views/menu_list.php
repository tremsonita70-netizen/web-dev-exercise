<div class="order-container">
    <h1>Menu List</h1>
    <a href="new_menu">Add Menu</a>
    <a href="/">Top</a>
    <?= $message ??'' ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th></th>
            </tr>
        </thead>
    <tbody>
        <?php foreach($menus as $menu): ?>
            <tr>
                <td><?= h($menu['id']) ?></td>
                <td><?= h($menu['name']) ?></td>
                <td><?= h($menu['category']) ?></td>
                <td><?= h($menu['price']) ?>Riel</td>
                <td><a href="/edit_menu?id=<?= h($menu['id']) ?>">Edit</a></td>
            </tr>
            <?php endforeach; ?>
            
    </tbody>
    </table>
    </div>
    
