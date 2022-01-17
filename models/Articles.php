<?php

require_once "DatabaseObject.php";

class Articles implements DatabaseObject {

    public $id = 0;
    public $titel = '';
    public $inhalt = '';
    public $datum = '';
    public $user_id = '';


    public function create($titel, $inhalt, $datum, $user_id){
        $db = Database::connect();
        $sql = "INSERT INTO post (titel, inhalt, datum, user_id) values(?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($titel, $inhalt, $datum, $user_id));
        $lastId = $db->lastInsertId();  // get ID of new database-entry
        Database::disconnect();
        return $lastId;
    }

    public static function get($post_id){
        $db = Database::connect();
        $sql = "SELECT * FROM post WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($post_id));
        $item = $stmt->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();

        return $item !== false ? $item : null;
    }

    static function getAll() {
        $db = Database::connect();
        $sql = 'SELECT u.id, u.username, p.titel, p.datum, p.inhalt, p.id as post_id FROM user as u INNER JOIN post as p ON u.id = p.user_id';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        Database::disconnect();
        return $data;
    }

    public static function update($titel, $inhalt, $datum, $user_id, $post_id){
        $db = Database::connect();
        $sql = "UPDATE post SET titel = ?, inhalt = ?, datum = ?, user_id = ? WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($titel, $inhalt, $datum, $user_id, $post_id));
        Database::disconnect();
    }

    public static function delete($post_id){
        $db = Database::connect();
        $sql = "DELETE FROM post WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($post_id));
        Database::disconnect();
    }


    public static function getUser($user_id){
        $db = Database::connect();
        $sql = "SELECT * FROM user WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($user_id));
        $item = $stmt->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();

        return $item !== false ? $item : null;
    }

    static function getAllUsers() {
        $db = Database::connect();
        $sql = 'SELECT * FROM user';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        Database::disconnect();
        return $data;
    }

}







?>