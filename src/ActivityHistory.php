<?php

namespace Eduzz\ActivityHistory;

use Eduzz\ActivityHistory\Constants\UserType;
use Eduzz\ActivityHistory\Events\Event;
use Eduzz\ActivityHistory\Library\QueueSenderApi;

class ActivityHistory
{
    private $userId;
    private $url;
    private $secret;
    private $queueSender;

    public function __construct(
        string $secret,
        QueueSenderApi $queueSender
    ) {
        $this->secret = $secret;
        $this->queueSender = $queueSender;
    }

    public function setUser(
        string $userId
    ) {
        $this->userId = $userId;

        return $this;
    }

    public function setUrl(
        string $url
    ) {
        $this->url = $url;

        return $this;
    }

    public function publish(Event $event)
    {
        $event->validate();

        $data = $event->toArray();

        $data['user_id'] = $this->userId;
        $data['url'] = $this->url;

        $this->queueSender->send(
            $this->secret,
            $data
        );
    }
}