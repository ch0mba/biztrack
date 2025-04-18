<?php
session_start();
require '../includes/db.php';
require '../includes/functions.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../public/login.php");
    exit;
}

$userId = $_SESSION['user_id'];

// Fetch totals
$salesToday = getTotal($pdo, $userId, 'sale', 'today');
$expensesToday = getTotal($pdo, $userId, 'expense', 'today');
$salesMonth = getTotal($pdo, $userId, 'sale');
$expensesMonth = getTotal($pdo, $userId, 'expense');
$balance = $salesMonth - $expensesMonth;
$weekData = getWeekData($pdo, $userId);

// Handle filters
$where = "user_id = ?";
$params = [$userId];

if (!empty($_GET['from'])) {
    $where .= " AND date >= ?";
    $params[] = $_GET['from'];
}

if (!empty($_GET['to'])) {
    $where .= " AND date <= ?";
    $params[] = $_GET['to'];
}

if (!empty($_GET['type'])) {
    $where .= " AND type = ?";
    $params[] = $_GET['type'];
}

$stmt = $pdo->prepare("SELECT * FROM transactions WHERE $where ORDER BY date DESC");
$stmt->execute($params);
$transactions = $stmt->fetchAll();

// Include the view
include '../public/dashboard.php';
