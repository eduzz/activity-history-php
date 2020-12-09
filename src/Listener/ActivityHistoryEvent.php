<?php

namespace Eduzz\ActivityHistory\Listener;

use Eduzz\ActivityHistory\Events\Event;

class ActivityHistoryEvent
{
    private $event;

    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    public function getEvent(): Event
    {
        return $this->event;
    }

    public static function create(Event $event)
    {
        return new ActivityHistoryEvent($event);
    }
}