<?php

namespace Eduzz\ActivityHistory\Events;

abstract class InsertEvent extends Event
{
    private $initialized;

    public function __construct(
        string $action,
        $data,
        bool $isAudit = false
    ) {
        $this->initialized = true;

        parent::__construct(
            $action,
            $isAudit
        );

        $this->data = $data;
    }

    public function validate(): bool
    {
        if (!$this->initialized) {
            throw new \Exception('You must call the constructor');
        }

        if (!$this->action) {
            throw new \Exception('You must set Action');
        }

        if (!$this->data) {
            throw new \Exception('You must to set Data');
        }

        return true;
    }
}