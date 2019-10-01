<?php

abstract class Person
{
    protected $firstName;
    protected $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
}

class Teacher extends Person
{
    protected $teachers = [];
    protected $goingTeachers;
    protected $teacherList = [];
    protected $countTeachers;

    public function __construct($firstName, $lastName)
    {
        parent::__construct($firstName, $lastName);
    }

    public function addTeacherToSchoolTrip(Person $person)
    {
        $this->teachers[] = $person;
        $this->countTeachers = count($this->teachers);
        $this->goingTeachers = (int)SchoolTripList::$studentLists / 25;
        $this->teacherList[] = $this->goingTeachers;
    }
}

class Student extends Person
{
    public $goingToTrip;
    public $groupName;
    public $paid;
    public $yes = 'yes';
    public $no = 'no';
    public $nothing = 0.00;

    public function __construct($firstName, $lastName)
    {
        parent::__construct($firstName, $lastName);
    }

    public function getInfo(string $goingToTrip, string $groupName, float $paid)
    {
        if ($goingToTrip == $this->yes && $paid > $this->nothing)
        {
            $this->goingToTrip = $goingToTrip;
            $this->groupName = $groupName;
            $this->paid = $paid;
        }
        else
        {
            $this->goingToTrip = $this->no;
            $this->groupName = $groupName;
            $this->paid = $this->nothing;
        }
    }
}

class Group
{
    protected $name;
    protected $groups = [];
    protected $totalStud;
    protected $goingStudents = [];
    protected $goingStudentsNumber;
    protected $percentage;
    protected $raisedMoneyPerGroup;
    protected $totalRaisedMoney;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function addToGroup(Student $student)
    {
        $this->groups[] = $student;
        $this->totalStud = count($this->groups);

        if ($student->goingToTrip == $student->yes && $student->paid > $student->nothing)
        {
            $this->goingStudents[] = $student;
            $this->goingStudentsNumber += (int)$this->goingStudents;
            $this->percentage = $this->goingStudentsNumber / $this->totalStud * 100;
            if ($student->groupName == $this->name)
            {
                $this->raisedMoneyPerGroup += $student->paid;
                $this->totalRaisedMoney += $this->raisedMoneyPerGroup;
            }
        }
    }
}

class SchoolTrip
{
    protected $name;
    protected $tripList = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function addToTripList(SchoolTripList $schoolTripList)
    {
        $this->tripList[] = $schoolTripList;
    }
}

class SchoolTripList
{
    public static $studentLists = [];

    public function addToStudentList(Student $student)
    {
        SchoolTripList::$studentLists[] = $student;
    }
}

$jan = new Teacher('jan', 'jan');
$jan->addTeacherToSchoolTrip($jan);
$jan1 = new Teacher('jan1', 'jan1');
$jan->addTeacherToSchoolTrip($jan1);
$jan2 = new Teacher('jan2', 'jan2');
$jan->addTeacherToSchoolTrip($jan2);
$jan3 = new Teacher('jan3', 'jan3');
$jan->addTeacherToSchoolTrip($jan3);
$jan4 = new Teacher('jan4', 'jan4');
$jan->addTeacherToSchoolTrip($jan4);
$jan5 = new Teacher('jan5', 'jan5');
$jan->addTeacherToSchoolTrip($jan5);
$jan6 = new Teacher('jan6', 'jan6');
$jan->addTeacherToSchoolTrip($jan6);
$jan7 = new Teacher('jan7', 'jan7');
$jan->addTeacherToSchoolTrip($jan7);

$kees = new Student('Kees', 'Keessen');
$kees->getInfo('yes', 'SPLVAPM1B', 50);
$klaas = new Student('Klaas', 'Klaassen');
$klaas->getInfo('yes', 'SPLVAPM1B', 50);
$nienke = new Student('Nienke', 'Nienk');
$nienke->getInfo('yes', 'SPLVAPM1B', 50);
$Jeremiah = new Student('Jeremiah', 'Jer');
$Jeremiah->getInfo('yes', 'SPLVAPM1B', 50);
$Isreal = new Student('Isreal', 'Isr');
$Isreal->getInfo('yes', 'SPLVAPM1B', 50);
$piet = new Student('Piet', 'Pi');
$piet->getInfo('yes', 'SPLVAPM1B', 50);
$pieter = new Student('Pieter', 'Piet');
$pieter->getInfo('yes', 'SPLVAPM1B', 50);
$pietersen = new Student('Pietersen', 'Pieters');
$pietersen->getInfo('yes', 'SPLVAPM1B', 50);
$jans = new Student('Jans', 'Jansen');
$jans->getInfo('yes', 'SPLVAPM1B', 50);
$spongebob = new Student('Sponge', 'Bob');
$spongebob->getInfo('yes', 'SPLVAPM1B', 50);
$patrick = new Student('Patrick', 'Star');
$patrick->getInfo('yes', 'SPLVAPM1B', 50);
$sandy = new Student('Sandy', 'Nuts');
$sandy->getInfo('yes', 'SPLVAPM1B', 50);
$mrCrabs = new Student('Crab', 'Crabs');
$mrCrabs->getInfo('yes', 'SPLVAPM1B', 50);

$group1 = new Group('SPLVAPM1B');
$group1->addToGroup($kees);
$group1->addToGroup($klaas);
$group1->addToGroup($nienke);
$group1->addToGroup($Jeremiah);
$group1->addToGroup($Isreal);
$group1->addToGroup($piet);
$group1->addToGroup($pieter);
$group1->addToGroup($pietersen);
$group1->addToGroup($jans);
$group1->addToGroup($spongebob);
$group1->addToGroup($patrick);
$group1->addToGroup($sandy);
$group1->addToGroup($mrCrabs);

$schoolTripList = new SchoolTripList();
$schoolTripList->addToStudentList($kees);
$schoolTripList->addToStudentList($klaas);
$schoolTripList->addToStudentList($nienke);
$schoolTripList->addToStudentList($Jeremiah);
$schoolTripList->addToStudentList($Isreal);
$schoolTripList->addToStudentList($piet);

$schoolTrip = new SchoolTrip('Universal park');
$schoolTrip->addToTripList($schoolTripList);

var_dump($group1, $schoolTrip, $jan);