<?php

declare(strict_types=1);

namespace PhpHexagonal\Domain\Port;

interface EmployeeRepositoryPort {
    public function findAllBornOn(\DateTime $today) : array;
}