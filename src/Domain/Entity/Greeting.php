<?php

declare(strict_types=1);

namespace PhpHexagonal\Domain\Entity;

class Greeting
{

    private $subject = 'Subject: Happy birthday!';
    private $content;

    public function __construct(Employee $employee)
    {
        $this->content = 'Happy birthday, dear' . $employee->first_name;
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
