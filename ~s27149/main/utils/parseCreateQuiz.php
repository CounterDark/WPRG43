<?php
    function parseCreateQuiz($mysqli, $postData) {
        $formData = [];
        $lastQuestionId = null;
        $currentQuestionId = null;
        $currentQuestion = '';
        $answersForQuestion = [];
        $correctAnswer = null;
        foreach($_POST as $key => $value) {
            $value = $mysqli->real_escape_string(htmlspecialchars(trim($value)));
            if(empty($value)) {
                $_SESSION['error'] = 'Wypełnij wszystkie pola w formularzu. Brakujące pole: '.$key;
                header('Location: ./create_quiz.php');
                exit();
            }
            if(strlen($value) < 1) {
                $_SESSION['error'] = 'Pola muszą zawierać co najmniej 1 znak';
                header('Location: ./create_quiz.php');
                exit();
            }
            if(str_starts_with($key, 'question')) {
                if($currentQuestionId !== null) {
                    $quizElement = new QuizElement($currentQuestionId, $currentQuestion, $answersForQuestion, $correctAnswer);
                    $formData["question".$currentQuestionId] = $quizElement;
                    $lastQuestionId = $currentQuestionId;
                    $answersForQuestion = [];
                }
                $currentQuestionId = explode('_', $key)[1];
                $currentQuestion = $value;
                continue;
            }
            if(str_starts_with($key, 'answer')) {
                $answersForQuestion[] = $value;
                continue;
            }
            if(str_starts_with($key, 'correct')) {
                $correctAnswer = $value;
                continue;
            }
            $formData[$key] = $value;
        }
        if($currentQuestionId !== null) {
            $quizElement = new QuizElement($currentQuestionId, $currentQuestion, $answersForQuestion, $correctAnswer);
            $formData["question".$currentQuestionId] = $quizElement;
        }
        return $formData;
    }
?>