
<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body > 

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 ">
            <h2 class="text-center mb-4">Login</h2>

            <form method="POST" action="login_process.php">
                <div class="form-group">
                    <label>Username:</label>
                    <input type="text" name="username" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>

                <?php
                if (!empty($_SESSION['login_error'])) {
                    echo "<p style='color:red;' class='text-center'>* " . $_SESSION['login_error'] . "</p>";
                    unset($_SESSION['login_error']);
                }
                ?>
            </form>
        </div>
    </div>
</div>

</body>
</html>
