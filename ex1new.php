<?php

class student
{
    public $firstname;
    public $lastname;
    public $gender;
    public $status;
    public $gpa;

    function __construct($firstname, $lastname, $gender, $status, $gpa) {
        $this->setFirstname($firstname);
        $this->setLastname($lastname);
        $this->setGender($gender);
        $this->setStatus($status);
        $this->setGpa($gpa);
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname) : void
    {
        $this->firstname = $firstname;
    }
    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender): void
    {
        if ($gender === 'male' || $gender === 'female'){
            $this->gender = $gender;
        } else {
            throw new RuntimeException("Wrong gender type!");
        }
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        if ($status === 'freshman' || $status === 'sophomore' || $status === 'junior' || $status === 'senior'){
            $this->status = $status;
        } else {
            throw new RuntimeException("Wrong status type!");
        }
    }

    /**
     * @return mixed
     */
    public function getGpa()
    {
        return $this->gpa;
    }

    /**
     * @param mixed $gpa
     */
    public function setGpa($gpa): void
    {
        if ($gpa >= 0 && $gpa <= 4.0){
            $this->gpa = $gpa;
        } else {
            $this->gpa = 4.0;
        }
    }

    public function showMyself()
    {
        var_export(get_object_vars($this));
    }

    /**
     * @param $gpa
     * @param $study_time
     */
    public function StudyTime($gpa, $study_time)
    {
        $gpa = $gpa + log($study_time);
        if ($gpa > '4') {
            $gpa = '4.00';
        }
        var_export(get_object_vars($this));
    }

}

$obj = [];
$obj[0] = new student("Mike", "Barnes", "male", "freshman", 4);
$obj[1] = new student("Jim", "Nickerson", "male", "sophomore", 3);
$obj[2] = new student("Jack", "Indabox", "male", "junior", 2.5);
$obj[3] = new student("Jane", "Miller", "female", "senior", 3.6);
$obj[4] = new student("Mary", "Scott", "female", "senior", 2.7);

foreach ($obj as $i => $j) {
    echo $j->showMyself() . PHP_EOL;
}

$study_time = [60, 100, 40, 300, 1000];

foreach ($obj as $q => $w) {
    for ($i = 0; $i < 5; $i++) {
        echo $w->StudyTime($obj[$i]->gpa, $study_time[$i]) . PHP_EOL;
    }
}
