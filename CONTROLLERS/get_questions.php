<?php
require_once "../functions.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['level_id']) && isset($_GET['subject_id'])) {
        $level_id = $_GET['level_id'];
        $subject_id = $_GET['subject_id'];
        echo getAllQuestions($level_id, $subject_id);
    } else {
        echo json_encode(array('error'=> 'Parameters not set'));
    }
}

?>