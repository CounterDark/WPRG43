<?php
require_once __DIR__.'/'.'../../shared/components/quiz_element.php';
class Game implements JsonSerializable{
    private $id;
    private $quiz_elements;
    private $current_index;
    private $score;
    private $finished;
    
    public function __construct($id, $quiz_elements) {
        $this->id = $id;
        $this->quiz_elements = $quiz_elements;
        $this->current_index = 0;
        $this->score = 0;
        $this->finished = false;
    }

    public function getId() {
        return $this->id;
    }

    public function getQuizElements() {
        return $this->quiz_elements;
    }

    public function getCurrentIndex() {
        return $this->current_index;
    }

    public function getScore() {
        return $this->score;
    }

    public function getFinished() {
        return $this->finished;
    }

    public function setCurrentIndex($current_index) {
        $this->current_index = $current_index;
    }

    public function setScore($score) {
        $this->score = $score;
    }

    public function setFinished($finished) {
        $this->finished = $finished;
    }

    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'quiz_elements' => $this->quiz_elements,
            'current_index' => $this->current_index,
            'score' => $this->score,
            'finished' => $this->finished
        ];
    }

    public function getQuestion() {
        if ($this->finished === true) {
            return null;
        }
        return unserialize($this->quiz_elements[$this->current_index]);
    }

    public function incrementIndex() {
        $this->current_index++;
        if ($this->current_index >= count($this->quiz_elements)) {
            $this->finished = true;
        }
    }

    public function checkAnswer($answer) {
        $question = unserialize($this->quiz_elements[$this->current_index]);
        if ($question->getCorrectAnswer() === $answer) {
            $this->score++;
            return true;
        }
        return false;
    }

    public function getLength() {
        return count($this->quiz_elements);
    }

    public static function endGame() {
        unset($_SESSION['game']);
        unset($_SESSION['checked']);
        unset($_SESSION['game_ended']);
        unset($_SESSION['answer']);
    }
}
?>