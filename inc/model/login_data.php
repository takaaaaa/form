<?php

//DB抽象クラス読み込み
require_once(dirname(__DIR__)."../config/db/abstract_data.php");

class LoginData extends AbstractData
{

    public function selectinfo($mail,$password)
    {
        $sql = sprintf('SELECT * FROM users WHERE mail="%s" AND pass="%s"',
          mysqli_real_escape_string($this->db, $mail),
          mysqli_real_escape_string($this->db, sha1($password))//sha1 暗号化
        );
        return mysqli_query($this->db, $sql) or die(mysqli_error($this->db));
    }

}

?>