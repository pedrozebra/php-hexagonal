<?php

declare(strict_types=1);

require __DIR__ . '/../src/Bootstrap.php';

$builder = new \DI\ContainerBuilder();
$builder->useAutowiring(false);
$builder->useAnnotations(false);
$builder->addDefinitions(__DIR__ .'/../src/definitions.php');
$container = $builder->build();
$birthdayService = $container->get('BirthdayService');
$birthdayService->sendGreetings(new DateTime());
