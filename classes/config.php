<?php
class Config
{
    private $database;

    public function __construct()
    {
        $this->database = [
            'host' => 'localhost',
            'dbname' => 'usafone',
            'port' => 3306,
            'username' => 'root',
            'password' => ''
        ];
    }

    public function getDatabaseConfig($key)
    {
        if (array_key_exists($key, $this->database)) {
            return $this->database[$key];
        } else {
            throw new Exception("Configuration key '$key' not found.");
        }
    }

    public function getDatabaseHost()
    {
        return $this->getDatabaseConfig('host');
    }

    public function getDatabaseName()
    {
        return $this->getDatabaseConfig('dbname');
    }

    public function getDatabasePort()
    {
        return $this->getDatabaseConfig('port');
    }

    public function getDatabaseUsername()
    {
        return $this->getDatabaseConfig('username');
    }

    public function getDatabasePassword()
    {
        return $this->getDatabaseConfig('password');
    }
}
