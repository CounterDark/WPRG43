<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once __DIR__.'/'.'../../shared/components/quiz_element.php';
require_once __DIR__.'/'.'../components/game.php';

$dbhost = $_SESSION['db_host'];
$dbuser = $_SESSION['db_user'];
$dbpass = $_SESSION['db_pass'];

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, 's27149');

//endGame in case of some unexpected data
Game::endGame();

$quizId = $_GET['id'];
$query = "SELECT * FROM quiz WHERE id = $quizId";
$result = $mysqli->query($query);
//check if quiz exists
//silently redirect to main menu if quiz not found
if ($result->num_rows <= 0) {
    error_log('Quiz not found');
    header('Location: ../main/main_menu.php');
    exit();
}

$quiz = $result->fetch_assoc();
$questions = json_decode($quiz['questions'], true);
$quizElements = [];
foreach ($questions as $question) {
    $quizElements[] = serialize(new QuizElement($question['id'], $question['question'], $question['answers'], $question['correct_answer']));
}
$id = bin2hex(random_bytes(3));
$_SESSION['game'] = serialize(new Game($id, $quizElements));

header('Location: ./game.php');
exit();
?>