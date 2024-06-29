<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once __DIR__.'/'.'../../../shared/utils/getRelativePathString.php';
require_once getRelativePath(__DIR__ ,'../../components/game.php');
require_once getRelativePath(__DIR__ ,'../../../shared/components/quiz_element.php');

$game = unserialize($_SESSION['game']);

$score = $game->getScore();
$length = $game->getLength();

Game::endGame()
?>
<section class="content-wrapper">
    <div class="game-wrapper">
        <div class="game-header">
            <h1>Quiz</h1>
        </div>
        <form class="game-box" method="post">
            <div class="game-ended-box-body">
                <h2>Gratulacje!</h2>
                <p>Udało Ci się ukończyć quiz!</p>
                <p>Twój wynik to: <?php echo $score.'/'.$length; ?></p>
            </div>
            <div class="game-ended-box-footer">
                <a href="../index.php">Wroć do menu</a>
            </div>
        </form>
    </div>
</section>