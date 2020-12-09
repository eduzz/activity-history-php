<?php

namespace Eduzz\ActivityHistory\Events;

abstract class Event
{
    protected $action;
    protected $isAudit;
    protected $url;
    protected $ip;
    protected $excerpt;
    protected $data;
    protected $oldData;

    public function __construct(
        string $action,
        bool $isAudit = false
    ) {
        $this->action = $action;
        $this->ip = $this->getIp();
        $this->isAudit = $isAudit;
    }

    abstract function validate(): bool;

    public function toArray(): array
    {
        return [
            'action' => $this->action,
            'url' => $this->url,
            'ip' => $this->ip,
            'excerpt' => json_encode($this->excerpt),
            'data' => json_encode($this->data),
            'old_data' => json_encode($this->oldData),
            'is_audit' => $this->isAudit
        ];
    }

    protected function getIp()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        }

        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
           return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }

        if (!empty($_SERVER['REMOTE_ADDR'])) {
            return $_SERVER['REMOTE_ADDR'];
        }

        return '';
    }
}