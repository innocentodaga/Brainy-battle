<?php

require_once "./Database.php";

class ParentModel extends Database {
    public function createParent($username, $email, $contact) {
        $sql = "INSERT INTO Parents (username, email, contact) VALUES ('$username', '$email', '$contact')";
        return $this->conn->query($sql);
    }

    public function getParent() {
        $sql = "SELECT * FROM Parents";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    public function deleteParent($parent_id) {
        $sql = "DELETE FROM Parents WHERE parent_id = $parent_id";
        return $this->conn->query($sql);
    }

    public function getParentById($parent_id) {
        $sql = "SELECT * FROM Parents WHERE parent_id = $parent_id";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    public function editParent($parent_id, $username, $email, $contact) {
        $sql = "UPDATE Parents SET username = '$username', email = '$email', contact = '$contact' WHERE parent_id = $parent_id";
        return $this->conn->query($sql);
    }
}


?>