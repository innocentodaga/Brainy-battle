<?php

require_once "conn.php";


// REGISTRATION CRUDS

// Function to create a user
function createUser($username, $parentsEmail, $parentsContact, $password, $pupilsName) {
    global $connection;

    // Start a transaction
    mysqli_begin_transaction($connection);

    // Insert into parents table
    $query1 = "INSERT INTO parents (username, email, contact) VALUES (?, ?, ?)";
    $stmt1 = mysqli_prepare($connection, $query1);
    mysqli_stmt_bind_param($stmt1, "sss", $username, $parentsEmail, $parentsContact);
    $result1 = mysqli_stmt_execute($stmt1);

    // Check if insertion into parents table was successful
    if ($result1) {
        // Get the inserted parent's ID
        $parent_id = mysqli_insert_id($connection);

        // Insert into pupils table
        $query2 = "INSERT INTO pupils (name, password, parent_id) VALUES (?, ?, ?)";
        $stmt2 = mysqli_prepare($connection, $query2);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password
        mysqli_stmt_bind_param($stmt2, "ssi", $pupilsName, $hashedPassword, $parent_id);
        $result2 = mysqli_stmt_execute($stmt2);

        // Commit the transaction if both inserts were successful
        if ($result2) {
            mysqli_commit($connection);
            return "Registered successfully"; // Return success message
        } else {
            mysqli_rollback($connection); // Rollback if the second insert failed
            return "Registration failed"; // Return failure message
        }
    } else {
        mysqli_rollback($connection); // Rollback if the first insert failed
        return "Registration failed"; // Return failure message
    }
}

function getUsers() {
    global $connection;
    $sql = "SELECT * FROM parents";
    $parents_results = [];
    $result = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $parents_results[] = $row;
    }
    return $parents_results;
}
function getUserById($user_id) {

}
function updateUser() {}
function deleteUser($user_id) {}



// SUBJECT CRUDS
function createSubject($name) {
    global $connection;
    $sql = "INSERT INTO subject (name) VALUES ('{$name}')";
    
    $result = mysqli_query($connection, $sql);

    if ($result) {
        echo json_encode("Subject created successfully");
    } else {
        echo json_encode("ERROR_: creating subject");
    }

    mysqli_close($connection);

}

function getSubjects() {
    global $connection;
    $sql = "SELECT * FROM subject";
    $result = mysqli_query($connection, $sql);
    $subjects = [];
    
    while ($row = mysqli_fetch_assoc($result)) {
        $subjects = $row;
    }

    mysqli_close($connection);

    return $subjects;
}

function editSubject($subject_id, $editedSubject) {
    global $connection;
    $sql = "UPDATE subject SET name = '{$editedSubject}' WHERE subject_id = '{$subject_id}' ";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        echo json_encode("Subject edited successfully");
    } else {
        echo json_encode("ERROR_ editing subject");
    }
    mysqli_close($connection);
}

// LEVEL CRUDS
function createlevel($subject_id) {
    global $connection;
    $sql = "INSERT INTO level (subject_id) VALUES ('{$subject_id}')";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        echo json_encode("Level created successfully");
    } else {
        echo json_encode("ERROR_: creating level");
    }
    
    mysqli_close($connection);
}

function readLevel($subject_id) {
    global $connection;
    $sql = "SELECT * FROM level WHERE subject_id='{$subject_id}' ";
    $result = mysqli_query($connection, $sql);
    $level = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $level[] = $row;
    }
    mysqli_close($connection);
    return $level;
}

// QUESTION CRUDS
function addQuestion($question, $answers, $correctAnswerIndex, $level_id, $subject_id) {
    global $connection;

    // Insert question into questions table
    $query = "INSERT INTO questions (question, level_id, subject_id) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "sii", $question, $level_id, $subject_id);
    mysqli_stmt_execute($stmt);
    $question_id = mysqli_insert_id($connection);

    // Insert answers into answers table
    foreach($answers as $index => $answer) {
        $is_correct = $index == $correctAnswerIndex ? 1 : 0;

        $query = "INSERT INTO answers (question_id, answer, is_correct) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "isi", $question_id, $answer, $is_correct);
        mysqli_stmt_execute($stmt);
    }
}

function getAllQuestions($level_id, $subject_id) {
    global $connection;

    // Select questions and related answers from the database based on level and subject
    $query = "SELECT q.question, GROUP_CONCAT(a.answer) AS options, GROUP_CONCAT(CASE WHEN a.is_correct = 1 THEN a.answer END) AS correct_option
              FROM questions q 
              JOIN answers a ON q.question_id = a.question_id 
              WHERE q.level_id = ? AND q.subject_id = ?
              GROUP BY q.question_id";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "ii", $level_id, $subject_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $questions = array();
    while($row = mysqli_fetch_assoc($result)) {
        $question = array(
            'question' => $row['question'],
            'options' => explode(",", $row['options']),
            'correct_option' => $row['correct_option']
        );
        $questions[] = $question;
    }

    return json_encode($questions);
}

// VIDEO CRUDS
function uploadVideo($subject_id, $level_id, $video_url) {
    // uploads the video
}
function getVideo( $subject_id, $level_id) {
    // returns the video url for the particular level and subject
}

?>