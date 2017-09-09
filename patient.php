<?php
    class Patient {
        var $first_name;
        var $last_name;
        var $dob;
        var $ssn;
        var $symptoms;
        var $score;
        var $processed_by;
        
        function __construct($fname,$lname,$date,$social,$symp,$sco,$proc){
            $this->first_name = $fname;
            $this->last_name = $lname;
            $this->dob = $date;
            $this->ssn = $social;
            $this->symptoms = $symp;
            $this->score = $sco;
            $this->processed_by = $proc;
        }
        
        function getFirstName(){
            return $this->first_name;
        }
        
        function getLastName(){
            return $this->last_name;
        }
        
        function getDOB(){
            return $this->dob;
        }
        
        function getSSN(){
            return $this->ssn;
        }
        
        function getSymptoms(){
            return $this->symptoms;
        }
        
        function getScore(){
            return $this->score;
        }
        
        function getProcessedBy(){
            return $this->processed_by;
        }
    }