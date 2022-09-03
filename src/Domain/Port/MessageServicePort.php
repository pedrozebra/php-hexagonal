<?php

declare(strict_types=1);

namespace PhpHexagonal\Domain\Port;

use PhpHexagonal\Domain\Entity\Greeting;

interface MessageServicePort
{
    public function send(Greeting $greeting);
}
