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
            <h1>สร้างบัญชีใหม่</h1>
            <form action="1.php" method="post">
                <div class="mb-3">
                    <label for="username">ชื่อผู้ใช้:</label>
                    <input type="text" id="username" name="username" class="form-control" required><br><br>
                </div>
        
                <div class="mb-3">
                    <label for="password">รหัสผ่าน:</label>
                    <input type="password" id="password" name="password" class="form-control" required><br><br>
                 </div>
        
                <div class="mb-3">
                    <label for="account_number">หมายเลขบัญชี</label>
                    <input type="text" id="account_number" name="account_number" class="form-control" required><br><br>
                </div>
        
                <div class="mb-3">
                    <label for="deposit">เงินฝาก</label>
                    <input type="text" id="deposit" name="deposit" class="form-control" required><br><br>
                </div>
        
                <div class="mb-3">
                     <label for="date">วันที่ฝาก</label>
                    <input type="text" id="date" name="date" class="form-control" required><br><br>
                 </div>
        
        
                <input type="submit" value="OK"  class="btn btn-primary">
                <input type="submit" value="SHOW"  class="btn btn-primary" href="show.php">
                <center><a href='h.php'><br>[Retrue]</a></center>
        </div>
    </form>
    </div>
    
</body>
</html>