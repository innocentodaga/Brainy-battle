<?php

require_once "../functions.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if( isset($_POST['edit_id']) && isset($_POST['edited_subject']) ) {
        $id = $_POST['edit_id'];
        $subject = $_POST['edited_subject'];
        editSubject($id, $subject);
    } else {
        echo json_encode(array('error'=> 'Parameters not set'));
    }
}

?>