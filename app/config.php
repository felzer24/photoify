<?php

declare(strict_types=1);

// This file contains a list of global configuration settings.

return [
    'title' => 'photoify',
    'database_path' => sprintf('sqlite:%s/database/photoify.db', __DIR__),
];
