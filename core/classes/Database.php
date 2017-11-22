<?php


class Database
{
    const HOST = "localhost";
    const USER = "root";
    const PASS = "";
    const DB = "unibook";
//    const PORT = 3307;

    public $link;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $link = $this->connect();
        $this->link = $link;
        return $link;
    }

    private function connect()
    {
        $link = mysqli_connect(
            self::HOST,
            self::USER,
            self::PASS,
            self::DB) or $this->getError();
        return $link;
    }

    public function close($link = null)
    {
        if ($link) {
            mysqli_close($link) or $this->getError();
        }
    }

    public function insert($query = '')
    {
        if ($query) {
            $state = mysqli_query($this->link, $query) or $this->getError();
            if ($state) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    public function update($query = '')
    {
        if ($query) {
            $state = mysqli_query($this->link, $query) or $this->getError();
            if ($state) {
                return $state;
            } else {
                return 0;
            }
        }
        return 0;
    }

    public function delete($query = '')
    {
        if ($query) {
            $state = mysqli_query($this->link, $query) or $this->getError();
            if ($state) {
                return $state;
            } else {
                return 0;
            }
        }
        return 0;
    }

    public function get($query = '')
    {
        if ($query) {
            $result = mysqli_query($this->link, $query) or $this->getError();
            if ($result) {
                return $result;
            }
        }
        return null;
    }

    public function getByValue($table, $colname, $value)
    {
        return $this->get(" SELECT * FROM " . $table . " WHERE " . $colname . " = '" . $value . "'");
    }

    public function getByTestTaken($table, $order)
    {
       // $response = mysqli_query("select id,answer from questions where id IN($order) ORDER BY FIELD(id,$order)");
       // $response = $Database->get("select TEST_ID from quiz_java where TEST_ID IN($order) ORDER BY FIELD(TEST_ID,$order)");
       return $this->get(" SELECT CORRECT_ANSWER,TEST_ID FROM " . $table . " WHERE TEST_ID IN(" . $order . ")ORDER BY FIELD(TEST_ID,".$order.")");

    }

    public function getAll($table = '')
    {
        if ($table) {
            return $this->get("SELECT * FROM " . $table);
        }
        return null;

    }

    public function count($table = '')
    {
        if ($table) {
            $result = $this->get("SELECT count(*) FROM " . $table);
            if ($result) {
                $row = mysqli_fetch_array($result);
                if ($row) {
                    return $row[0];
                }
            }
        }
        return 0;
    }

    public function getError()
    {
        return die(mysqli_error($this->link));
    }

}