<?php
require_once "../functions.php"; 

// requires the subject_id for which the level will be created
// You give id of the subject and create the level for that subject
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['subject_id'])) {
        $subject_id = $_POST['subject_id'];
        createlevel($subject_id);
    } else {
        echo json_encode(array('error'=> 'Parameters not set'));
    }
}

?>