<?php

declare(strict_types=1);

namespace PhpHexagonal\Services\Birthday;

use DateTime;
use PhpHexagonal\Domain\Entity\Greeting;
use PhpHexagonal\Domain\Port\EmployeeRepositoryPort;
use PhpHexagonal\Domain\Port\MessageServicePort;

class BirthdayService
{
    protected $employeeRepository;
    protected $messageService;

    public function __construct(EmployeeRepositoryPort $employeeRepository, MessageServicePort $messageService)
    {
        $this->employeeRepository = $employeeRepository;
        $this->messageService = $messageService;
    }

    public function sendGreetings(\DateTime $today)
    {
        $employeeWhereBirthDayIsToday = $this->employeeRepository->findAllBornOn($today);
        foreach ($employeeWhereBirthDayIsToday as $employee) {
            $greeting = new Greeting($employee);
            $this->messageService->send($greeting);
        }
    }
}
