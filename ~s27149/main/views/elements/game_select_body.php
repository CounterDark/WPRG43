<?php
if (!isset($_SESSION)) {
    session_start();
}

function getErrorElem($error_msg)
{
    return "<div class=\"grid-elem error\"><p>$error_msg</p></div>";
}
?>
<section class="content-wrapper">
    <div class="quiz-select-wrapper">
        <div class="quiz-select-header">
            <h1>Wybierz quiz!</h1>
        </div>
        <div class="quiz-select-box">
            <div class="quiz-select-box-body">
                <?php
                
                $dbhost = $_SESSION['db_host'];
                $dbuser = $_SESSION['db_user'];
                $dbpass = $_SESSION['db_pass'];

                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

                $mysqli = new mysqli($dbhost, $dbuser, $dbpass, 's27149');

                $query = "SELECT * FROM quiz";
                $result = $mysqli->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class=\"grid-elem\">";
                        echo "<a href=\"/~s27149/game/start_game.php?id=" . $row['id'] . "\">" . $row['name'] . "</a>";
                        echo "</div>";
                    }
                } else {
                    echo getErrorElem("Brak quizów do wyświetlenia");
                }
                ?>
            </div>
        </div>
    </div>
</section>