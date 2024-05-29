<?php
require_once 'database.php';

class User
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getPdo();
    }

    public function getUserById($userId)
    {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserByUsername($username)
{
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([$username]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function registerUser($username, $email, $password)
{
    if (empty($username)) {
        die("Username is required");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    if (strlen($password) < 6) {
        die("Password must be at least 6 characters long");
    }

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([$username]);
    $existingUser = $stmt->fetch();

    if ($existingUser) {
        die("Username already exists. Please choose a different username.");
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPassword);

    try {
        $stmt->execute();
    } catch (PDOException $e) {
        throw new Exception("Failed to register user: " . $e->getMessage());
    }
}

    public function deleteUserById($userId)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $userId);
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Failed to delete user: " . $e->getMessage());
        }
    }


    public function updateUser($userId, $username, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET username = :username, email = :email, password = :password WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':id', $userId);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Failed to update user information: " . $e->getMessage());
        }
    }

    public function processLogout() {
        session_start();
        $_SESSION = [];
        session_destroy();
        header("Location: ../signin.php");
        exit();
    }

}
