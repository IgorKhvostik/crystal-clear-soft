<?php
class Msg{

    static function db(){
        $DBH = new PDO("mysql:host=127.0.0.1;dbname=clearSoft", 'root', '');//host, name of db, user, password
        $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        return $DBH;
    }
    static function check(){
        if (isset ($_GET)){
            self::loadout(self::db());
        }
    }
    public function loadout($DBH){

        $obj = array ($_GET['code'], $_GET['type'],  $_GET['message'],  $_GET['application'],   );
        $STH = $DBH->prepare("INSERT INTO bugreport (code, type, message, application) values (?, ?, ?, ?)");
        $STH->execute($obj);

    }
}
Msg::check();
header("Location: savereport.php");
exit();