<?php

declare(strict_types=1);

use PhpHexagonal\Domain\Port\EmployeeRepositoryPort;
use PhpHexagonal\Domain\Port\MessageServicePort;
use PhpHexagonal\Infrastructure\FileDatabaseRepository;
use PhpHexagonal\Services\birthday\BirthdayService;
use PhpHexagonal\Services\email\EmailService;
use Psr\Container\ContainerInterface;

return [
    EmployeeRepositoryPort::class => function (ContainerInterface $c) {
        return new FileDatabaseRepository();
    },
    MessageServicePort::class => function (ContainerInterface $c) {
        return new EmailService();
    },
    'BirthdayService' => function (ContainerInterface $c) {
        return new BirthdayService($c->get(EmployeeRepositoryPort::class), $c->get(MessageServicePort::class));
    }
];
