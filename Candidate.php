<?php

require_once 'Position.php';

class Candidate{
    private $CandidateID;
    private $CandidateName;
    private $CandidatePosition;
    private $positionID;
    private $votes;
    function __construct($CandidateID=null,$CandidateName=null,$CandidatePosition=null,$positionID=null,$votes=null){
        
        $this->CandidateID = $CandidateID;
        $this->CandidateName = $CandidateName;
        $this->CandidatePosition = $CandidatePosition;
        $this->positionID = $positionID;
        $this->votes = $votes;
    }
    
    /**
     * @return number
     */
    public function getCandidateID()
    {
        return $this->CandidateID;
    }

    /**
     * @return string
     */
    public function getCandidateName()
    {
        return $this->CandidateName;
    }

    /**
     * @return string
     */
    public function getCandidatePosition()
    {
        return $this->CandidatePosition;
    }

    /**
     * @return string
     */
    public function getPositionID()
    {
        return $this->positionID;
    }

    public function getVotes()
    {
        return $this->votes;
    }
    
    public function setVotes($votes)
    {
        $this->votes = $votes;
    }
   
    /**
     * 
     * @param number $CandidateID
     */
    public function setCandidateID($CandidateID)
    {
        $this->CandidateID = $CandidateID;
    }

    /**
     * @param string $CandidateName
     */
    public function setCandidateName($CandidateName)
    {
        $this->CandidateName = $CandidateName;
    }

    /**
     * @param string $CandidatePosition
     */
    public function setCandidatePosition($CandidatePosition)
    {
        $this->CandidatePosition = $CandidatePosition;
    }

    /**
     * @param string $positionID
     */
    public function setPositionID($positionID)
    {
        $this->positionID = $positionID;
    }
    
    public function printAllVotes($connection, $id){
        $sql = "select CandidateName,votes from candidatesdb where positionID=?";
        $prepare = $connection->prepare($sql);
        $prepare->execute([$id]);
        $voters = $prepare->fetchAll();
        
        $allVoters = [];
        foreach ($voters as $key => $voter){
            $tempVoter = new Candidate();
            $tempVoter->setCandidateName($voter['CandidateName']);
            $tempVoter->setVotes($voter['votes']);
            $allVoters[$key] = $tempVoter;
        }
        return $allVoters;
    }
    
    public function printCandidate($connection){
        
        $pos = new Position();
        
        $allPosition = $pos->getPosition($connection);
 echo '
<center>
        <h1>position</h1>
        <form method="GET" action="Main.php ">
            <fieldset style="padding:10px;margin:10px;display:inline">
<label for ="Select Position">Select Position</label>
            <select name="cid">';
        foreach ($allPosition as $onePosition){
            
            $name = $onePosition->getPositionName();
            $id = $onePosition->getPositionID();
            echo"<option value=". $id. ">".$name."</option>";
        }
        echo '</select>
                    <input style="width:100px" type="submit" value="See Candidates" name="see"/></td>
       
               </fieldset>
</form>
    </center>';
    }   

    public function voteCandidate($connection,$id){
        $sql1 = "select votes from candidatesdb where CandidateID =?"; 
        $prepare1 = $connection->prepare($sql1);
        $prepare1->execute([$id]);
        $vote = $prepare1->fetch();
        $vote = $vote['votes'];
        
        $sql2 = "update candidatesdb set votes=? where CandidateID =?";
        $prepare2 = $connection->prepare($sql2);
        $prepare2->execute([$vote+1, $id]);  
        
    }
    
    public function getCandidate($connection,$id){
        $counter = 0;
        $sqlStmt = "Select * from candidatesdb where positionID IN (SELECT PositionID from positionsdb WHERE PositionID =?) ";
        
        $prepare = $connection->prepare($sqlStmt);  
        //--2
        $prepare->execute([$id]);
        //--3
        
        $result = $prepare->fetchAll();
        
        
        $listofCandidate = [];
        foreach ($result as $key=>$oneRow){
            $candidateObj = new Candidate();
//             $candidateObj->setCandidateID($oneRow["CandidateID"]);
//             $candidateObj->setCandidateName($oneRow["CandidateName"]);
            $candidateObj->setCandidateID($oneRow["CandidateID"]);
            $candidateObj->setCandidateName($oneRow["CandidateName"]);
            
            $listofCandidate[$key]= $candidateObj;
        }
        return $listofCandidate;
    }
    
    public function printPositions($connection){
        
        $pos = new Position();
        
        $allPosition = $pos->getPosition($connection);
        echo '
<center>
        <h1>Manage Candidate</h1>
        <form method="GET" action="Main.php ">
            <fieldset style="padding:10px;margin:10px; display:inline">
<label for ="Select Position">Candidate Position</label>
            <select name="capos">';
        foreach ($allPosition as $onePosition){
            
            $name = $onePosition->getPositionName();
            $id = $onePosition->getPositionID();
            echo"<option value=". $id. ">".$name."</option>";
            
        }
        echo '</select>
<label>Candidate Name: </label>
                        <input type="text" name="caname"/>
                         
<input style="width:100px" type="submit" value="Add" name="addcandidate"/></td>
            
               </fieldset>
</form>
    </center>';
    }   
    public function addcandidate($connection){
        
        $CandidateName = $this->CandidateName;
        $positionID = $this->positionID;
        
        $sqlStmt = "insert into candidatesdb(CandidateName,positionID) values('$CandidateName','$positionID')";
        $result = $connection->exec($sqlStmt);
        return $result;
    }
}