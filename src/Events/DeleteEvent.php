<?php

namespace Eduzz\ActivityHistory\Events;

abstract class DeleteEvent extends Event
{
    private $initialized;

    public function __construct(
        string $action,
        $oldData,
        bool $isAudit = false
    ) {
        $this->initialized = true;

        parent::__construct(
            $action,
            $isAudit
        );

        $this->oldData = $oldData;
    }

    public function validate(): bool
    {
        if (!$this->initialized) {
            throw new \Exception ('You must call the constructor');
        }

        if (!$this->action) {
            throw new \Exception('You must set Action');
        }

        if (!$this->oldData) {
            throw new \Exception('You must to set Old Data');
        }

        return true;
    }
}