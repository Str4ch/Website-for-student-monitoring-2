<?php
class Connection
{
    const HOST = 'localhost';
    const USER = 'root';
    const DATA_BASE = 'StudentMonitoringSystem';
    const PASSWORD = '';
    private PDO $con;
    public function __construct()
    {
        $dsn = 'mysql:dbname='.self::DATA_BASE.';host='.self::HOST;
        $this->con = new PDO($dsn, self::USER, self::PASSWORD);
    }
    public function executeQuery(string $query){
        $this->con->exec($query);
    }

    public function getData(string $query, bool $singleData=false):array|bool{
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        if($singleData){
            return $stmt->fetch();
        }else{
            return $stmt->fetchAll();
        }
    }
}