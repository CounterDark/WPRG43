<?php
if (!isset($_SESSION)) {
    session_start();
}
$error = $_SESSION['error'] ?? '';
?>
<section class="content-wrapper">
    <div class="register-wrapper">
        <div class="register-box">
            <div class="register-box-header">
                <h1>Rejestracja</h1>
            </div>
            <div class="register-box-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="register">Login:</label>
                        <input type="text" name="register" id="register" class="form-control" autocomplete="username" required >
                    </div>
                    <div class="form-group">
                        <label for="password">Hasło:</label>
                        <input type="password" name="password" id="password" class="form-control" autocomplete="new-password" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Nazwa:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Zarejestruj</button>
                    </div>
                </form>
            </div>
            <div class="register-box-footer">
                <a href="login.php">Zaloguj się</a>
            </div>
        </div>
        <?php
            if (!empty($error)) {
                echo '<div class="error-box">'.$error.'</div>';
                unset($_SESSION['error']);
            }
        ?>
    </div>
</section>
