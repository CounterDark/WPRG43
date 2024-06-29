<?php
class QuizElement implements JsonSerializable{
    private $id;
    private $question;
    private $answers;
    private $correct_answer;

    public function __construct($id, $question, $answers, $correct_answer) {
        $this->id = $id;
        $this->question = $question;
        $this->answers = $answers;
        $this->correct_answer = $correct_answer;
    }

    public function getQuestion() {
        return $this->question;
    }

    public function getAnswers() {
        return $this->answers;
    }

    public function getCorrectAnswer() {
        return intval($this->correct_answer);
    }

    public function setQuestion($question) {
        $this->question = $question;
    }

    public function setAnswers($answers) {
        $this->answers = $answers;
    }

    public function setCorrectAnswer($correct_answer) {
        $this->correct_answer = $correct_answer;
    }

    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'question' => $this->question,
            'answers' => $this->answers,
            'correct_answer' => $this->correct_answer
        ];
    }
}
?>