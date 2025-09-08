<?php
include 'conndb.php';

$dbname = "bank";
if($conn -> select_db($dbname)){
    
} else {
    echo "Error selecting database: ".$conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deposit_amount = $_POST['deposit_amount'];
    $date = $_POST['date'];
    $account_number = $_POST['account_number'];

    
    $stmt_net = $conn->prepare("SELECT net_amount, account_id FROM account WHERE account_number = ?");
    $stmt_net->bind_param("s", $account_number);
    $stmt_net->execute();
    $stmt_net->bind_result($net_amount, $account_id);
    $stmt_net->fetch();
    $stmt_net->close();

    if ($account_id) {
        $result = $net_amount + $deposit_amount;

        $stmt = $conn->prepare("INSERT INTO deposit (account_id, deposit_amount, account_number, date, result) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iissi", $account_id, $deposit_amount, $account_number, $date, $result);

        if ($stmt->execute()) {
            $stmt_update = $conn->prepare("UPDATE account SET net_amount = ? WHERE account_id = ?");
            $stmt_update->bind_param("is", $result, $account_id);
            if ($stmt_update->execute()) {
                echo "Deposit successful and account updated!";
            } else {
                echo "failed to update account: " . $stmt_update->error;
            }
            $stmt_update->close();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Account number not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สร้างบัญชีใหม่</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div textalign="center">
            <h1>ฝากเงิน</h1>
    <form action="deposit.php" method="post">
        <div class="mb-3">
            <label for="deposit_amount">เงินฝาก:</label>
            <input type="number" id="deposit_amount" name="deposit_amount" class="form-control" required><br><br>
        </div>
    
        <div class="mb-3">
            <label for="date">วันที่:</label>
            <input type="text" id="date" name="date" class="form-control" required><br><br>
        </div>
    
        <div class="mb-3">
            <label for="account_number">เลขที่บัญชี:</label>
            <input type="text" id="account_number" name="account_number" class="form-control" required><br><br>
        </div>
    
        <input type="submit" value="OK"  class="btn btn-primary">
    </div>
    </form>
    </div>
    
</body>
</html>

