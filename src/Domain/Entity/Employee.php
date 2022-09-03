<?php

declare(strict_types=1);

namespace PhpHexagonal\Domain\Entity;

class Employee
{

    private $last_name;
    private $first_name;
    private $date_of_birth;
    private $email;

    public function __construct($last_name, $first_name, $date_of_birth, $email)
    {
        $this->last_name = $last_name;
        $this->first_name = $first_name;
        $this->date_of_birth = $date_of_birth;
        $this->email = $email;
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }

    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
    }
}
