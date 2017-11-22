<?php

require_once 'Database.php';

class Search
{
    public $db;

    /**
     * Search constructor.
     * @param array $tables
     */
    public function __construct(array $tables)
    {
        $this->tables = $tables;
        $this->db = new Database();
    }

    public function multiFind($searchString)
    {
        $listOfResults=[];
        if (strlen($searchString)) {
            $searchArr = explode(' ', $searchString);
            foreach($searchArr as $str){
                array_push($listOfResults,$this->find($str));
            }
        }
    }

    public function find($searchString)
    {
        $resultSet = [];
        if (strlen($searchString)) {
            foreach ($this->tables as $table) {
                $cols = [];
                $getColumnsQuery = "SHOW COLUMNS FROM " . $table . " FROM mydb";
                $result = $this->db->get($getColumnsQuery);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        array_push($cols, $row['Field'] . " LIKE '%" . $searchString . "%'");
                    }

                    $whereArgs = implode(' OR ', $cols);
                    $query = "SELECT * FROM " . $table . " WHERE " . $whereArgs;
                    $r = $this->db->get($query);
                    if ($r) {
                        array_push($resultSet, $r);
                    }
                }
            }
            return $resultSet;
        }
        return "no results were found for " . $searchString;
    }
}