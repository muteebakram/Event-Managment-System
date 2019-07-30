<?php

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Secret/event-management-system-4727d-fc4689ee0f83.json');
$firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->create();