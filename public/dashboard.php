<h2>Dashboard</h2>
<div>
    <p>🟢 Sales Today: Ksh <?= number_format($salesToday) ?></p>
    <p>🔴 Expenses Today: Ksh <?= number_format($expensesToday) ?></p>
    <p>🟢 Sales This Month: Ksh <?= number_format($salesMonth) ?></p>
    <p>🔴 Expenses This Month: Ksh <?= number_format($expensesMonth) ?></p>
    <p>💰 Balance: Ksh <?= number_format($salesMonth - $expensesMonth) ?></p>
</div>

<canvas id="weekChart" height="100"></canvas>

<h1> Add Transaction</h1>
<a href="../public/add_transaction.php" class="btn btn-primary">Add Transaction</a>
<hr>
<h3>Transaction History</h3>

<form method="GET" action="../actions/dashboard_actions.php">
    <label>From:</label>
    <input type="date" name="from" value="<?= $_GET['from'] ?? '' ?>">
    <label>To:</label>
    <input type="date" name="to" value="<?= $_GET['to'] ?? '' ?>">
    <label>Type:</label>
    <select name="type">
        <option value="">All</option>
        <option value="sale" <?= ($_GET['type'] ?? '') === 'sale' ? 'selected' : '' ?>>Sales</option>
        <option value="expense" <?= ($_GET['type'] ?? '') === 'expense' ? 'selected' : '' ?>>Expenses</option>
    </select>
    <button type="submit">Filter</button>
</form>
<br>

<table border="1" cellpadding="5" cellspacing="0">
    <thead>
    
        <tr>
            <th>Date</th>
            <th>Type</th>
            <th>Description</th>
            <th>Amount (Ksh)</th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($transactions)): ?>
            <tr><td colspan="5">No records found.</td></tr>
        <?php else: ?>
            <?php foreach ($transactions as $t): ?>
                <tr>
                    <td><?= htmlspecialchars($t['date']) ?></td>
                    <td><?= ucfirst($t['type']) ?></td>
                    <td><?= htmlspecialchars($t['description']) ?></td>
                    <td><?= number_format($t['amount'], 2) ?></td>
                    <td><?= htmlspecialchars($t['category']) ?></td>
                    <td>
                    <a href="../public/edit_transaction.php?id=<?= $t['id'] ?>">✏️ Edit</a> |
                    <a href="../actions/delete_transaction_actions.php?id=<?= $t['id'] ?>" onclick="return confirm('Are you sure you want to delete this transaction?');">🗑️ Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
<br>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="../scripts/dashboard.js"></script>
<?php include '../templates/footer.php'; ?>