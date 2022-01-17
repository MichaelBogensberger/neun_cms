<?php

require_once 'Database.php';

interface DatabaseObject
{
    /**
     * Creates a new object in the database
     * @return integer ID of the newly created object (lastInsertId)
     */
    public function create($titel, $inhalt, $datum, $user_id);

    /**
     * Update an existing object in the database
     * @return boolean true on success
     */
    public static function update($titel, $inhalt, $datum, $user_id, $post_id);

    // /**
    //  * Get an object from database
    //  * @param integer $id
    //  * @return object single object or null
    //  */
    public static function get($id);

    // /**
    //  * Get an array of objects from database
    //  * @return array array of objects or empty array
    //  */
    public static function getAll();

    // /**
    //  * Deletes the object from the database
    //  * @param integer $id
    //  */
    public static function delete($id);

    public static function getUser($user_id);
    static function getAllUsers();
}