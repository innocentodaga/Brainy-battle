<?php
require_once "../functions.php";

/*
This accepts the following
 question -> String
 answer -> Array of Strings e.g., ['option1', 'option2', 'option3']
 correct_answer -> boolean e.g., 0 or 1
 level_id -> Int, level for the subject you want to upload to
 subject_id -> Int, takes the subject id
*/

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        isset($_POST['question']) &&
        isset($_POST['answer']) &&
        isset($_POST['correct_answer']) &&
        isset($_POST['level_id']) &&
        isset($_POST['subject_id'])
        ) {

        $question = $_POST['question'];
        $answers = json_decode($_POST['answer']); // Decode the JSON string into an array
        $correctAnswerIndex = $_POST['correct_answer'];
        $level_id = $_POST['level_id'];
        $subject_id = $_POST['subject_id'];

        // Ensure $answers is an array
        if (!is_array($answers)) {
            echo json_encode(array('error'=> 'Answers must be an array'));
            exit; // Stop execution if answers are not an array
        }

        addQuestion($question, $answers, $correctAnswerIndex, $level_id, $subject_id);
        } else {
            echo json_encode(array('error'=> 'Parameters not set'));
        }
}


?>