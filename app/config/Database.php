<?php
namespace App\Config;

use PDO;

class Database {
    private static $host = 'localhost';
    private static $dbname = 'codefram';
    private static $user = 'root';
    private static $password = '';

    protected $conn;
    protected $table;

    public function __construct($table = null) {
        try {
            $this->conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$user, self::$password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $th) {
            echo "Connection failed: " . $th->getMessage();
        }
        
        if ($table) {
            $this->table = $table;
        }
    }

    public function fetchAll($sql, $params = []) {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetch($sql, $params = []) {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($sql, $params) {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $this->conn->lastInsertId();
    }

    public function update($sql, $params) {
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($params);
    }

    public function delete($sql, $params) {
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($params);
    }

    // Reusable method for getting all records from a table
    public function getAll($table = null) {
        $table = $table ?? $this->table;
        $sql = "SELECT * FROM " . $table;
        return $this->fetchAll($sql);
    }

    // Reusable method for getting a single record by ID
    public function getById(int $id, $table = null) {
        $table = $table ?? $this->table;
        $sql = "SELECT * FROM " . $table . " WHERE id = :id";
        return $this->fetch($sql, ['id' => $id]);
    }
}
