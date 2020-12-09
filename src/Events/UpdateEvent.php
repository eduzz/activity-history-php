<?php

namespace Eduzz\ActivityHistory\Events;

abstract class UpdateEvent extends Event
{
    private $initialized;

    public function __construct(
        string $action,
        $data,
        $excerpt,
        $oldData,
        bool $isAudit = false
    ) {
        $this->initialized = true;
        parent::__construct(
            $action,
            $isAudit
        );

        $this->excerpt = $excerpt;
        $this->data = $data;
        $this->oldData = $oldData;
    }

    public function validate(): bool
    {
        if (!$this->initialized) {
            throw new \Exception ('You must call the constructor');
        }

        if (!$this->initialized) {
            throw new \Exception('You must call the constructor');
        }

        if (!$this->action) {
            throw new \Exception('You must set Action');
        }

        if (!$this->excerpt) {
            throw new \Exception('You must to set Excerpt Data');
        }

        if (!$this->data) {
            throw new \Exception('You must to set Data');
        }

        if (!$this->oldData) {
            throw new \Exception('You must to set Old Data');
        }

        return true;
    }
}