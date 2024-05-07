<?php
require_once "../functions.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['subject_name'])) {
        $subject = $_POST['subject_name'];
        createSubject($subject);
    } else {
        echo json_encode(array('error'=> 'Parameters not set'));
    }
}

?>