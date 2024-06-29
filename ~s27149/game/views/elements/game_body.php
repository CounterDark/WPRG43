<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once __DIR__.'/'.'../../../shared/utils/getRelativePathString.php';
require_once getRelativePath(__DIR__ ,'../../components/game.php');
require_once getRelativePath(__DIR__ ,'../../../shared/components/quiz_element.php');

$game = unserialize($_SESSION['game']);
$questionElem = $game->getQuestion();

if ($questionElem === null) {
    $_SESSION['game_ended'] = true;
    header('Location: ./game.php');
    exit();
}

$question = $questionElem->getQuestion();
$answers = $questionElem->getAnswers();
?>
<section class="content-wrapper">
    <div class="game-wrapper">
        <div class="game-header">
            <h1>Quiz</h1>
        </div>
        <form class="game-box" method="post">
            <div class="game-box-body">
                <div class="grid-elem question">
                    <h3><?php echo $question; ?></h3>
                </div>
                <div class="grid-elem answer">
                        <input type="radio" name="answer" value="1">
                        <span><?php echo $answers[0]; ?></span>
                </div>
                <div class="grid-elem answer">
                    <input type="radio" name="answer" value="2">
                    <span><?php echo $answers[1]; ?></span>
                </div>
                <div class="grid-elem answer">
                    <input type="radio" name="answer" value="3">
                    <span><?php echo $answers[2]; ?></span>
                </div>
                <div class="grid-elem answer">
                    <input type="radio" name="answer" value="4">
                    <span><?php echo $answers[3]; ?></span>
                </div>
            </div>
            <div class="game-box-footer">
                <a href="./logic/stop_game.php">Anuluj</a>
                <?php
                if (isset(($_SESSION['checked']))) {
                    $msg = $_SESSION['checked'] ? "Dobrze" : "Źle";
                    echo "<span>$msg</span>";
                    echo "<a href=\"./logic/next.php\">Następne pytanie</a>";
                } else {
                    echo "<button type=\"submit\">Sprawdź</button>";
                }
                ?>
            </div>
        </form>
    </div>
</section>