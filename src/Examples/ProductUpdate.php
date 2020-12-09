<?php

namespace Eduzz\ActivityHistory\Events;

use Eduzz\ActivityHistory\UpdateEvent;

class ProductUpdate extends UpdateEvent
{
    public function __construct(
        $excerpt,
        $data,
        $oldData
    ) {
        parent::__construct(
            'PRODUCT_UPDATE',
            $excerpt,
            $data,
            $oldData,
            true
        );
    }
}