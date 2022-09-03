<?php

declare(strict_types=1);

namespace PhpHexagonal\Infrastructure;

use DateTime;
use PhpHexagonal\Domain\Entity\Employee;
use PhpHexagonal\Domain\Port\EmployeeRepositoryPort;

class FileDatabaseRepository implements EmployeeRepositoryPort
{

    public function findAllBornOn(\DateTime $today): array
    {
        $contents = file_get_contents('./assets/employee.txt');
        $lines = explode("\n", $contents);
        $result = [];
        foreach ($lines as $key => $line) {
            if ($key > 0) {
                list($last_name, $first_name, $date_of_birth, $email) = explode(',', $line);
                $employee_birth_date = new DateTime($date_of_birth);
                if ($today->format('m') === $employee_birth_date->format('m') && $today->format('d') === $employee_birth_date->format('d')) {
                    $result[] = new Employee($last_name, $first_name, $date_of_birth, $email);
                }
            }
        }
        return $result;
    }
}
