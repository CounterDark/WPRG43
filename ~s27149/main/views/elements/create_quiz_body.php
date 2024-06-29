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
    <div class="quiz-create-wrapper">
        <div class="quiz-create-header">
            <h1>Tworzenie quizów</h1>
        </div>
        <form class="quiz-create-box" method="post">
            <div class="quiz-create-box-header">
                <div class="header-elem">
                    <label for="quiz_name">Nazwa quizu:</label>
                    <input type="text" name="quiz_name" id="quiz_name" maxlength="45">
                </div>
                <div class="header-elem">
                    <label for="amount_of_questions">Ilość pytań:</label>
                    <input type="number" name="amount_of_questions" id="amount_of_questions" min="1" max="15" value="1" oninput="onInputChanged()">
                </div>
            </div>
            <div class="quiz-create-box-body">
            </div>
            <div class="quiz-create-box-footer">
                <button type="submit">Utwórz quiz</button>
            </div>
        </form>
    </div>
</section>
<script>
    'use strict'
    function onInputChanged() {
        let questionAmount = document.getElementById('amount_of_questions').value || 1;
        const body = document.querySelector('.quiz-create-box-body');
        const columnElements = body.getElementsByClassName('column-elem');
        let length = columnElements.length;
        if (questionAmount < length) {
            for (let i = length; i >= questionAmount; i--) {
                body.removeChild(columnElements[i - 1]);
                length--;
            }
        }
        for (let i = length+1; i <= questionAmount; i++) {
            let columnElem = document.createElement('div');
            columnElem.classList.add('column-elem');
            columnElem.innerHTML = `
            <div class="question-group">
                <div class="question-elem">
                    <label for="question_${i}">Pytanie ${i}:</label>
                    <input type="text" name="question_${i}" id="question_${i}" maxlength="80">
                </div>
                <div class="answer-group">
                    <div class="answer-elem">
                    <label for="answer_1_for_question_${i}">Odpowiedź 1:</label>
                    <input type="text" name="answer_1_for_question_${i}" id="answer_1_for_question_${i}" maxlength="45">
                    </div>
                    <div class="answer-elem">
                    <label for="answer_2_for_question_${i}">Odpowiedź 2:</label>
                    <input type="text" name="answer_2_for_question_${i}" id="answer_2_for_question_${i}" maxlength="45">
                    </div>
                    <div class="answer-elem">
                    <label for="answer_3_for_question_${i}">Odpowiedź 3:</label>
                    <input type="text" name="answer_3_for_question_${i}" id="answer_3_for_question_${i}" maxlength="45">
                    </div>
                    <div class="answer-elem">
                    <label for="answer_4_for_question_${i}">Odpowiedź 4:</label>
                    <input type="text" name="answer_4_for_question_${i}" id="answer_4_for_question_${i}" maxlength="45">
                    </div>
                </div>
                <div class="correct-answer">
                    <label for="correct_answer_for_question_${i}">Poprawna odpowiedź:</label>
                    <input type="number" name="correct_answer_for_question_${i}" id="correct_answer_for_question_${i}" min="1" max="4" value="1">
                </div>
            </div>
            `;
            body.appendChild(columnElem);
        }
    }
    onInputChanged();
</script>