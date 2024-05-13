<?php

declare(strict_types=1);

namespace TheBasement\Libvirt\Models;

use TheBasement\Common\Contracts\Models\Serverlike;

class Server implements Serverlike
{
    public function __construct(public array $attributes = []) {}
    
}
