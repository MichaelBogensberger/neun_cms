<?php
include "DatabaseObject.php";

class Database implements DatabaseObject
{
    private static $dbName = 'cms';
    private static $dbHost = 'localhost';
    private static $dbUsername = 'root';
    private static $dbUserPassword = '';

    private static $conn = null;

    public function __construct()
    {
        exit('Init function is not allowed');
    }

    public static function connect()
    {
        // One connection through whole application
        if (null == self::$conn) {
            try {
                self::$conn = new PDO("mysql:host=" . self::$dbHost . ";" . "dbname=" . self::$dbName, self::$dbUsername, self::$dbUserPassword);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return self::$conn;
    }

    public static function disconnect()
    {
        self::$conn = null;
    }

    function update() {
    }

    static function create($titel, $inhalt, $datum, $user_id) {
        $db = Database::connect();
        $sql = "INSERT INTO post (titel, datum, inhalt, user_id) 
        VALUES ('$titel', '$inhalt', '$datum', '$user_id')";
        $db->exec($sql);
    }
    

    static function get($id) {
        $db = Database::connect();
        $sql = 'SELECT u.id, u.username, p.titel, p.datum, p.inhalt, p.id as post_id FROM user as u INNER JOIN post as p ON u.id = p.user_id WHERE p.id = ?';
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    static function getAll() {
        $db = Database::connect();
        $sql = 'SELECT u.id, u.username, p.titel, p.datum, p.inhalt, p.id as post_id FROM user as u INNER JOIN post as p ON u.id = p.user_id';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    static function delete($id) {
    }




}


?>