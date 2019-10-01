<?php

abstract class Person
{
    private $name;
    private $age;
    private $eyeColor;
    private $hairColor;
    private $length;
    private $weight;
    protected $role;

    public function __construct($name, $age, $eyeColor, $hairColor, $length, $weight)
    {
        $this->name = $name;
        $this->age = $age;
        $this->eyeColor = $eyeColor;
        $this->hairColor = $hairColor;
        $this->length = $length;
        $this->weight = $weight;
    }

    public function getName()
    {
       return $this->name;
    }

    abstract public function getRole($role);
}

class Patient extends Person
{
    public function getRole($role)
    {

        if ($role != 'patient')
            return 'Invalid role! Please try again.';
        else
        {
            $this->role = $role;
            return '';
        }
    }
}

abstract class Staff extends Person
{
    protected $HOURLYWAGE = 15;
    protected $STANDARDWAGE = 2600;
    protected $appointmentHours;
    public $salaryDoctor;
    public $salaryNurse;
}

class Doctor extends Staff
{
    public function getRole($role)
    {
        if ($role != 'doctor')
            return 'Invalid role! Please try again.';
        else
        {
            $this->role = $role;
            return '';
        }
    }

    public function getSalary($appointmentHours)
    {
        $this->appointmentHours = $appointmentHours;
        $this->salaryDoctor = $this->appointmentHours*$this->HOURLYWAGE;
        return $this->salaryDoctor;
    }
}

class Nurse extends Staff
{
    public function getRole($role)
    {
        if ($role != self::class)
            return 'Invalid role! Please try again.';
        else
        {
            $this->role = $role;
            return '';
        }
    }

    public function getSalary($appointmentHours)
    {
        $this->appointmentHours = $appointmentHours;
        $this->salaryNurse = $this->STANDARDWAGE + ($this->HOURLYWAGE*$this->appointmentHours);
        return $this->salaryNurse;
    }
}

class Appointment
{
    protected $beginTime;
    protected $endTime;
    protected $duration;
    protected $costs;
    protected static $appointments = [];

    public function getAppointment($beginTime, $endTime, Doctor $doctor, Patient $patient, Nurse $nurse)
    {
        global $patientCosts;
        $this->beginTime = $beginTime;
        $this->endTime = $endTime;
        if ($endTime >= '1000')
        {
            $this->duration = ($this->endTime-$this->beginTime)/24/4.166666667;
            $this->costs = $doctor->getSalary($appointmentHours = $this->duration) + $nurse->getSalary($appointmentHours = $this->duration);
            $patientCosts = $this->costs;
            Appointment::$appointments[] = [$beginTime, $endTime, $doctor, $patient, $patientCosts, $nurse];
            return Appointment::$appointments;
        }
        else
        {
            $this->duration = ($this->beginTime-$this->endTime)/24/4.166666667;
            $this->costs = $doctor->getSalary($appointmentHours = $this->duration) + $nurse->getSalary($appointmentHours = $this->duration);
            $patientCosts = $this->costs;
            Appointment::$appointments[] = [$beginTime, $endTime, $doctor, $patient, $patientCosts, $nurse];
            return Appointment::$appointments;
        }
    }
}

$jan = new Patient('Jan', '45', 'brown', 'black', '175cm', '60kg');
$jan->getName();
$errorPatient = $jan->getRole('patient');

$kees = new Doctor('Kees', '32', 'black', 'red', '180cm', '75kg');
$kees->getName();
$errorDoctor = $kees->getRole('doctor');

$femke = new Nurse('Femke', '25', 'blue', 'white', '165cm', '65kg');
$femke->getName();
$errorNurse = $femke->getRole('nurse');

$appointment1 = new Appointment();
$appointment1->getAppointment('0900', '1200', $kees, $jan, $femke);
$appointment2 = new Appointment();
$appointment2->getAppointment('1300', '1330', $kees, $jan, $femke);

var_dump($jan, $errorPatient, $kees, $errorDoctor, $femke, $errorNurse, $appointment1, $appointment2);