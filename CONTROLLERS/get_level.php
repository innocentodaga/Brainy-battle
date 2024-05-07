<?php
require_once "../functions.php";

// Gets the levels of the subject by giving its subject_id
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['subject_id'])) {
        $subject_id = $_GET['subject_id'];
        echo json_encode(readLevel($subject_id));
    } else {
        echo json_encode(array('error'=> 'Parameters not set'));
    }
}

?>