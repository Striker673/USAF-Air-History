<?php
class Database
{
    private $host = 'localhost';
    private $dbname = 'usafone';
    private $username = 'root';
    private $password = '';
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getPdo()
    {
        return $this->pdo;
    }

    public function fetchAirplaneImages()
    {
        $stmt = $this->pdo->query("SELECT image_src FROM airplanes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
