<?php
require_once 'DBConfig.php';
class Position{
    private $PositionID;
    private $PositionName;
    
    function __construct($PositionID=null,$PositionName=null){
        
        $this->PositionID = $PositionID;
        $this->PositionName = $PositionName;
        
    }
    
    /**
     * @return string
     */
    public function getPositionID()
    {
        return $this->PositionID;
    }
    
    /**
     * @return string
     */
    public function getPositionName()
    {
        return $this->PositionName;
    }
    
    /**
     * @param string $PositionID
     */
    public function setPositionID($PositionID)
    {
        $this->PositionID = $PositionID;
    }
    
    /**
     * @param string $PositionName
     */
    public function setPositionName($PositionName)
    {
        $this->PositionName = $PositionName;
    }
    
    public function getPosition($connection){
        $counter = 0;
        $sqlStmt = "Select * from positionsdb";
        $listofPositions = [];
        foreach ($connection->query($sqlStmt)as  $oneRow){
            $positionObj = new Position();
            $positionObj->setPositionID($oneRow["PositionID"]);
            $positionObj->setPositionName($oneRow["PositionName"]);
            
            $listofPositions[$counter++]= $positionObj;
        }
        return $listofPositions;
    }
    public function addposition($connection){
        $PositionID = $this->PositionID;
        $PositionName = $this->PositionName;
        
        $sqlStmt = "insert into positionsdb values('$PositionID','$PositionName')";
        $result = $connection->exec($sqlStmt);
        return $result;
    }
    
}