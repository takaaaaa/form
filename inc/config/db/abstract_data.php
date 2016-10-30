<?php

class AbstractDB
{
    const SERV = "localhost";
    const USER = "root";
    const PASS = "";
    const DBNM = "comp";
}

class AbstractData
{
    protected $db;

    public function __construct()
    {
        $this->connectDb();
    }

    protected function connectDb()
    {
        $this->db = mysqli_connect(AbstractDB::SERV, AbstractDB::USER, AbstractDB::PASS, AbstractDB::DBNM) or die(mysqli_connect_error());
        mysqli_set_charset($this->db, 'utf8');
    }

    public function query($sql)
    {
        mysqli_query($this->db, $sql) or die(mysqli_error($this->db));
    }

    public function close()
    {
        mysqli_close($this->db);
    }

}

?>