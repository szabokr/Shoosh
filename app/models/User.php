<?php
require realpath(__DIR__ . "/../../config/database.php");

class User
{
    private static $tableName = "users";
    public static function getUsers()
    {
        $users = DB::query("Select * from users");
        return $users;
    }

    public static function insertUser($data)
    {
        $sql = 'INSERT INTO ' . self::$tableName . ' (name, email, phone_number, zip_code, street, house_number, password ) VALUES ("' . $data[0] . '", "' . $data[1] . '", "' . $data[2] . '", "' . $data[3] . '", "' . $data[4] . '", "' . $data[5] . '", "' . $data[6] . '")';
        DB::query($sql);
    }

    public static function getUser($email)
    {
        $sql = 'SELECT * FROM ' . self::$tableName . ' WHERE email ="' . $email . '"';
        $result = DB::query($sql);
        if ($result) {
            $row = $result->fetch_assoc();
        }
        return $row;
    }

    public static function getProfile($id)
    {
        $sql = 'SELECT * FROM ' . self::$tableName . ' WHERE id ="' . $id . '"';
        $result = DB::query($sql);
        if ($result) {
            $row = $result->fetch_assoc();
        }
        return $row;
    }
}
