<?php
$oldCategory = $old['category'] ?? '';
$id = $old['id'] ?? '';
?>


<?php if (empty($id)) : ?>
    <h1>New Menu</h1>
<?php else : ?>
    <h1>Edit Menu</h1>
<?php endif; ?>

<?php if (empty($id)): ?>
    <form action="create_menu" method="post">
    <?php else: ?>
        <form action="update_menu" method="post">
        <?php endif; ?>
        <input type="hidden" name="id" value="<?= h($id) ?>" />

        <div class="menu-form-container">
            <lable>Menu Name</lable>

            <?php if (!empty($errors)) : ?>
                <ul style="color:red" ;>
                    <?php foreach ($errors as $error) : ?>
                        <li><?= h($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <div class="form-group">
            <input type="text" name="menu_name" value="<?= h($old['menu_name'] ?? '') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label>Category</label>
            <select name="category">
                <option value="" <?= empty($oldCategory) ? "selected " : "" ?>>Choose a category</option>
                <option value="1" <?= empty($oldCategory === 1) ? "selected " : "" ?>>Drink</option>
                <option value="2" <?= empty($oldCategory === 2) ? "selected " : "" ?>>icecream</option>
                <option value="3" <?= empty($oldCategory === 3) ? "selected " : "" ?>>Cake</option>
                <option value="4" <?= empty($oldCategory === 4) ? "selected " : "" ?>>Food</option>
            </select>
        </div>
        <div class="form-group">
            <lable>Price</lable>
            <input type="text" name="price" value="<?= h($old['price'] ?? '') ?>" />
        </div>
        <div class="form-group">
            <button type="submit"><?= empty($id) ? "Create" : "Edit" ?></button>
        </div>
        <a href="menu_list">Back To Menu List</a>

        </form>