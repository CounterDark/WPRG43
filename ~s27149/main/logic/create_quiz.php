<?php
    if(!isset($_SESSION)) {
        session_start();
    }

    require_once __DIR__.'/'.'../../user/components/user.php';
    require_once __DIR__.'/'.'../../shared/components/quiz_element.php';
    require_once __DIR__.'/'.'../utils/parseCreateQuiz.php';

    $dbhost = $_SESSION['db_host'];
    $dbuser = $_SESSION['db_user'];
    $dbpass = $_SESSION['db_pass'];

    $user = unserialize($_SESSION['user']);
    $login = $user->getLogin();
    $userName = $user->getName();

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, 's27149');

    if(isset($_POST)) {
        $formData = parseCreateQuiz($mysqli, $_POST);
        //check all needed static fields exist
        if (!key_exists('quiz_name', $formData)) {
            $_SESSION['error'] = 'Wypełnij wszystkie pola w formularzu. Brakujące pole: nazwa quizu';
            header('Location: ./create_quiz.php');
            exit();
        }
        if (!key_exists('amount_of_questions', $formData)) {
            $_SESSION['error'] = 'Wypełnij wszystkie pola w formularzu. Brakujące pole: ilość pytań';
            header('Location: ./create_quiz.php');
            exit();
        }
        if (strlen($formData['quiz_name']) < 3) {
            $_SESSION['error'] = 'Nazwa quizu musi zawierać co najmniej 3 znaki';
            header('Location: ./create_quiz.php');
            exit();
        }
        if (strlen($formData['quiz_name']) > 45) {
            $_SESSION['error'] = 'Nazwa quizu nie może zawierać więcej niż 45 znaków';
            header('Location: ./create_quiz.php');
            exit();
        }
        $quizName = $formData['quiz_name'];
        //check if quiz with this name already exists
        $query = "SELECT * FROM quiz WHERE name = '$quizName' AND author_uid = '$login'";
        $result = $mysqli->query($query);
        if ($result->num_rows > 0) {
            $_SESSION['error'] = 'Quiz o podanej nazwie już istnieje';
            header('Location: ./create_quiz.php');
            exit();
        }
        
        if ($formData['amount_of_questions'] < 1) {
            $_SESSION['error'] = 'Quiz musi zawierać co najmniej jedno pytanie';
            header('Location: ./create_quiz.php');
            exit();
        }
        if ($formData['amount_of_questions'] > 15) {
            $_SESSION['error'] = 'Quiz nie może zawierać więcej niż 15 pytań';
            header('Location: ./create_quiz.php');
            exit();
        }
        $questionAmount = $formData['amount_of_questions'];
        
        $quizElements = [];
        for ($i = 1; $i <= $questionAmount; $i++) {
            if (!key_exists("question$i", $formData)) {
                $_SESSION['error'] = 'Wypełnij wszystkie pola w formularzu. Brakujące pola dla pytania: '.$i."\nPytanie $1: ".print_r($formData, true);
                header('Location: ./create_quiz.php');
                exit();
            }
            $questionElem = $formData['question'.$i];
            $question = $questionElem->getQuestion();
            if (strlen($question) < 3) {
                $_SESSION['error'] = 'Pytanie musi zawierać co najmniej 3 znaki';
                header('Location: ./create_quiz.php');
                exit();
            }
            if (strlen($question) > 80) {
                $_SESSION['error'] = 'Pytanie nie może zawierać więcej niż 80 znaków';
                header('Location: ./create_quiz.php');
                exit();
            }
            $answers = $questionElem->getAnswers();
            foreach ($answers as $j => $answer) {
                if (strlen($answer) < 1) {
                    $_SESSION['error'] = 'Odpowiedź musi zawierać co najmniej 3 znaki';
                    header('Location: ./create_quiz.php');
                    exit();
                }
                if (strlen($answer) > 45) {
                    $_SESSION['error'] = 'Odpowiedź nie może zawierać więcej niż 45 znaków';
                    header('Location: ./create_quiz.php');
                    exit();
                }
            }
            $correctAnswer = $questionElem->getCorrectAnswer();
            if ($correctAnswer < 1 || $correctAnswer > 4) {
                $_SESSION['error'] = 'Niepoprawna odpowiedź';
                header('Location: ./create_quiz.php');
                exit();
            }
            $quizElements[] = $questionElem;
        }

        $json = json_encode($quizElements);
        if ($json === false) {
            $_SESSION['success'] = false;
            header('Location: ./create_quiz.php');
            exit();
        }
        $query = "INSERT INTO quiz (name, author_uid, questions, author_name) VALUES ('$quizName', '$login', '$json', '$userName')";
        $success = $mysqli->query($query);
        $_SESSION['success'] = $success;
        header('Location: ./create_quiz.php');
        exit();
    }
?>