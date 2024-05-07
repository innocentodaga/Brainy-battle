<?php
require_once "../functions.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(
        isset($_POST['username']) &&
        isset($_POST['parents_email']) &&
        isset($_POST['parents_contact']) &&
        isset($_POST['password']) &&
        isset($_POST['pupils_name'])
        ) {
        $username = $_POST['username'];
        $parentsEmail = $_POST['parents_email'];
        $parentsContact = $_POST['parents_contact'];
        $password = $_POST['password'];
        $pupilsName = $_POST['pupils_name'];

        $result = createUser($username, $parentsEmail, $parentsContact, $password, $pupilsName);
        echo $result;

    } else {
        echo json_encode(array('error'=> 'Parameters not set'));
    }
}

?>