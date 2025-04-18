<?php include '../templates/header.php'; ?>

<h2>Edit Transaction</h2>

<form method="POST" action="../actions/edit_transaction_actions.php">
    <label>Type:</label>
    <select name="type" required>
        <option value="sale">Sale</option>
        <option value="expense">Expense</option>
    </select><br><br>

    <label>Amount:</label>
    <input type="number" name="amount" step="0.01" value="" required><br><br>

    <label>Description:</label>
    <input type="text" name="description" value="" required><br><br>

    <label>Date:</label>
    <input type="date" name="date" value="" required><br><br>

    <label>Category:</label>
    <input type="text" name="category" value=""><br><br>

    <button type="submit">Update</button>
    <a href="../public/dashboard.php">Cancel</a>
</form>

<?php include '../templates/footer.php'; ?>
