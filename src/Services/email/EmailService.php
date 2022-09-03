<?php

declare(strict_types=1);

namespace PhpHexagonal\Services\email;

use PhpHexagonal\Domain\Entity\Greeting;
use PhpHexagonal\Domain\Port\MessageServicePort;

class EmailService implements MessageServicePort
{
    public function send(Greeting $greeting)
    {
        echo $greeting->__get('subject');
        echo "<br/>";
        echo $greeting->__get('content');
        echo "<br/><br/>";
    }
}
