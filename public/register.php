<?php include '../templates/header.php'; ?>

<form action="../actions/register_actions.php" method="POST">
    <input name="full_name" placeholder="Full Name" required>
    <input name="email" type="email" placeholder="Email" required>
    <input name="password" type="password" placeholder="Password" required>
    <button type="submit">Register</button>
</form>

<?php include '../templates/footer.php'; ?>
