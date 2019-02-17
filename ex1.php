<?php

class student
{
    private $firstname;
    private $lastname;
    private $gender;
    private $status;
    private $gpa;

    function __construct($firstname, $lastname, $gender, $status, $gpa)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->gender = $gender;
        $this->status = $status;
        $this->gpa = (float)$gpa;
    }

    function showMyself()
    {
        var_export(get_object_vars($this));
    }

    function studyTime($study_time)
    {
        $this->gpa = $this->gpa + log($study_time / 60);

        if ($this->gpa > 4) {
            $this->gpa = 4.0;
        }

        $this->showMyself();
    }
}

$obj = [];
$obj[0] = new student("Mike", "Barnes", "male", "freshman", 4);
$obj[1] = new student("Jim", "Nickerson", "male", "sophomore", 3);
$obj[2] = new student("Jack", "Indabox", "male", "junior", 2.5);
$obj[3] = new student("Jane", "Miller", "female", "senior", 3.6);
$obj[4] = new student("Mary", "Scott", "female", "senior", 2.7);

foreach ($obj as $key => $value) {
    echo PHP_EOL . $value->showMyself();
}

$study_time = [60, 100, 40, 300, 1000];
echo  PHP_EOL, "Student with new gpa: ", PHP_EOL;

foreach ($obj as $key => $value) {
    echo PHP_EOL . $value->studyTime($study_time[$key]);
}
