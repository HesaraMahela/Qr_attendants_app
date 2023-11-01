<?php

require_once dirname(__FILE__).'\\conn.php';
class DBController
{

    private $conn;

    function __construct()
    {
        $this->conn = $conn;
    }



    function runQuery($query)
    {
        $result = mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_assoc($result))
        {
            $resultset[] = $row;
        }
        if(!empty($resultset))
            return $resultset;
    }
}


?>
			