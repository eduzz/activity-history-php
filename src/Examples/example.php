<?php

use Eduzz\ActivityHistory\Events\ActivityHistoryEvent;
use Eduzz\ActivityHistory\Events\ProductUpdate;
use Eduzz\ActivityHistory\Manager;

$manager = new Manager(
    'secreToken'
);

$manager->setUser(

);

$manager->publish(
    new ProductUpdate(
        [
            "refund" => [],
            "contents" => [],
            "invoices" => []
        ],
        [
            "refund" => [],
            "content" => []
        ],
        [
            "refund" => [],
            "content" => []
        ]
    )
);

//Usando Event Listener

event(ActivityHistoryEvent->create(
    new ProductUpdate(
        [
            "user" => [],
            "content" => []
        ],
        [
            "user" => [],
            "content" => []
        ],
        [
            "user" => [],
            "content" => []
        ]
    )
    )
)