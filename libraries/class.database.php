<?php
header("Cache-Control: no-cache, must-revalidate");
header("Content-type: text/html; charset=utf-8");
class mySQL
{
    var $host;
    var $username;
    var $password;
    var $database;
    public $dbc;

    public function connect()
    {
        require("config.php");
        $this->host = $hostname;
        $this->username = $user;
        $this->password = $pass;
        $this->database = $db;

        $this->dbc = mysqli_connect($this->host, $this->username, $this->password, $this->database) or die('Error connecting to DB');
        mysqli_set_charset($this->dbc, "utf8");
    }

    public function query($sql)
    {
        $truyvan = mysqli_query($this->dbc, $sql);
        return $truyvan;
    }

    public function multi_query($sql)
    {
        $truyvan = mysqli_multi_query($this->dbc, $sql);
        return $truyvan;
    }

    public function affected_row($result)
    {
        $ar = mysqli_affected_rows($this->dbc);
        return $ar;
    }

    public function fetch($result)
    {
        return mysqli_fetch_assoc($result);
    }

    public function fetch_array($result)
    {
        return mysqli_fetch_array($result);
    }

    public function close()
    {
        return mysqli_close($this->dbc);
    }

    public function num_row($result)
    {
        $nr = mysqli_num_rows($result);
        return $nr;
    }
}
