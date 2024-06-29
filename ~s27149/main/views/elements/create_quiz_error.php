<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    $errorMsg = $_SESSION['error'];
?>
<section>
    <div class="quiz-message-box">
        <div class="quiz-message-box-body">
            <h3><?php echo $errorMsg; ?></h3>
        </div>
        <div class="quiz-message-box-button">
            <a href="/~s27149/main/create_quiz.php">Spróbuj ponownie</a>
        </div>
    </div>
</section>