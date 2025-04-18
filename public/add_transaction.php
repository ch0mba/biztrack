<?php include '../templates/header.php'; ?>

<h2>Add Sale / Expense</h2>
<form method="POST" action="../actions/add_transaction_actions.php">
    <select name="type" required>
        <option value="sale">Sale</option>
        <option value="expense">Expense</option>
    </select>
    <input type="text" name="description" placeholder="Description" required>
    <input type="number" name="amount" step="0.01" placeholder="Amount" required>
    <input type="text" name="category" placeholder="Category (optional)">
    <input type="date" name="date" required value="<?= date('Y-m-d') ?>">
    <button type="submit">Add</button>
</form>

<?php include '../templates/footer.php'; ?>
