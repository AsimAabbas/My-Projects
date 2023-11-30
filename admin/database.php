<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
class Database {
    private $conn;
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "wms";

    public function __construct() {
        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Check connection
        if ($this->conn->connect_error) {
            echo "error";
            throw new Exception("Connection failed: " . $this->conn->connect_error);
        } 
    }


    public function create($table, $data) {
        
        $columns = implode(', ', array_keys($data));
        $values = "'" . implode("', '", array_values($data)) . "'";
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";

        if ($this->conn->query($sql) === TRUE) {
            return "New record created successfully";
        } else {
            return "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }

    public function read($table, $condition = "", $limit = "", $order = "") {
        $sql = "SELECT * FROM $table";
        if (!empty($condition)) {
            $sql .= " WHERE $condition";
        }
        if (!empty($order)) {
            $sql .= " ORDER BY $order";
        }
        if (!empty($limit)) {
            $sql .= " LIMIT $limit";
        }
        
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $rows = array();
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        } else {
            return array();
        }
    }
    

    public function update($table, $data, $condition) {
        $setValues = '';
        foreach ($data as $key => $value) {
            $setValues .= "$key = '$value', ";
        }
        $setValues = rtrim($setValues, ', ');

        $sql = "UPDATE $table SET $setValues WHERE $condition";

        if ($this->conn->query($sql) === TRUE) {
            return "Record updated successfully";
        } else {
            return "Error updating record: " . $this->conn->error;
        }
    }

    public function delete($table, $condition) {
        $sql = "DELETE FROM $table WHERE $condition";

        if ($this->conn->query($sql) === TRUE) {
            return "Record deleted successfully";
        } else {
            return "Error deleting record: " . $this->conn->error;
        }
    }

    public function closeConnection() {
        $this->conn->close();
    }
}
