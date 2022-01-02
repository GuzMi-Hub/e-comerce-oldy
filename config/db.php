<?php

class Database
{
    public static function connect()
    {
<<<<<<< HEAD
        $db = new mysqli('localhost', 'cortana', '117MyBoy', 'tienda_master');
=======
        $db = new mysqli('localhost', 'root', '', 'tienda_master');
>>>>>>> 18f78d04d444f16a71446e02ee77ad1bb35cb942
        $db->query("SET NAMES utf8");
        return $db;
    }
}
