<?php
require_once "../functions.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo json_encode(getSubjects());
}

?>