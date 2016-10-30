<?php

//DB抽象クラス読み込み
require_once(dirname(__DIR__)."../../inc/config/db/abstract_data.php");

class EntryData extends AbstractData
{
    public function insertinfo($name,$mail,$password)
    {
        $sql = sprintf('INSERT INTO users SET name="%s", mail="%s", pass="%s"',
          mysqli_real_escape_string($this->db, $name),
          mysqli_real_escape_string($this->db, $mail),
          mysqli_real_escape_string($this->db, sha1($password))
        );
        $this->query($sql);
    }

}

?>