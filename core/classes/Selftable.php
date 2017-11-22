<?php


class Selftable
{
    public $table;

    /**
     * Selftable  constructor.
     */
    public function __construct()
    {
        $table='';
        $this->table = $table;
        return $table;
    }

    public function testTaken($table){
        {
            $this->table = $table;
            return $table;
        }
    }

    public function java()
    {
        return 'quiz_java';
    }

    public function c()
    {
        return 'quiz_c';
    }

    public function php()
    {
        return 'quiz_php';
    }

    public function css()
    {
        return 'quiz_css';
    }
}
