<?php
if (!isset($_SESSION)) {
    session_start();
}
$error = $_SESSION['error'] ?? '';
?>

<section class="content-wrapper">
    <div class="login-wrapper">
        <div class="login-box">
            <div class="login-box-header">
                <h1>Logowanie</h1>
            </div>
            <div class="login-box-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="login">Username:</label>
                        <input type="text" name="login" id="login" class="form-control" autocomplete="username" required >
                    </div>
                    <div class="form-group">
                        <label for="password">Hasło:</label>
                        <input type="password" name="password" id="password" class="form-control" autocomplete="current-password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Zaloguj</button>
                    </div>
                </form>
            </div>
            <div class="login-box-footer">
                <a href="register.php">Zarejestruj się</a>
            </div>
            <?php
            if (!empty($error)) {
                echo '<div class="error-box">'.$error.'</div>';
                unset($_SESSION['error']);
            }
            ?>
        </div>
    </div>
</section>
