<?php
class Logout {

    public function processLogout() {
        session_start();
        $_SESSION = [];
        session_destroy();
        header("Location: ../signin.php");
        exit();
    }
?>

