<?php
function getTotal($pdo, $userId, $type, $period = 'month') {
    $where = ($period == 'today') ? "DATE(date) = CURDATE()" : "MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE())";
    
    $stmt = $pdo->prepare("SELECT SUM(amount) as total FROM transactions WHERE user_id = ? AND type = ? AND $where");
    $stmt->execute([$userId, $type]);
    $result = $stmt->fetch();
    
    return $result['total'] ?? 0;
}

function getWeekData($pdo, $userId) {
    $stmt = $pdo->prepare("
        SELECT DATE(date) as day, 
               SUM(CASE WHEN type = 'sale' THEN amount ELSE 0 END) AS sales,
               SUM(CASE WHEN type = 'expense' THEN amount ELSE 0 END) AS expenses
        FROM transactions
        WHERE user_id = ? AND WEEK(date) = WEEK(CURDATE()) AND YEAR(date) = YEAR(CURDATE())
        GROUP BY DATE(date)
    ");
    $stmt->execute([$userId]);
    return $stmt->fetchAll();
}
