<?php
session_start();
require 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: public/login.php");
    exit;
}

$id = $_GET['id'] ?? 0;
$userId = $_SESSION['user_id'];

// Fetch existing transaction
$stmt = $pdo->prepare("SELECT * FROM transactions WHERE id = ? AND user_id = ?");
$stmt->execute([$id, $userId]);
$transaction = $stmt->fetch();

if (!$transaction) {
    echo "Transaction not found.";
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $category = $_POST['category'];

    $stmt = $pdo->prepare("UPDATE transactions SET type = ?, amount = ?, description = ?, date = ?, category = ? WHERE id = ? AND user_id = ?");
    $stmt->execute([$type, $amount, $description, $date, $category, $id, $userId]);

    header("Location: dashboard.php");
    exit;
}

// Render form
include 'edit_transaction_form.php';
