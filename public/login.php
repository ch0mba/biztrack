<?php include '../templates/header.php'; ?>

<form action="../actions/login_actions.php" method="POST">
    <input name="email" type="email" placeholder="Email" required>
    <input name="password" type="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>

<?php include '../templates/footer.php'; ?>
