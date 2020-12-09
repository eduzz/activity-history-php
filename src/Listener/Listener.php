<?php

namespace Eduzz\ActivityHistory\Listener;

use Eduzz\ActivityHistory\AcitivityHistory;
use Eduzz\ActivityHistory\Events\ActivityHistoryEvent;

class Listener
{
    private $acitivityHistory;

    public function __construct(AcitivityHistory $acitivityHistory)
    {
        $this->acitivityHistory = $acitivityHistory;
    }

    public function handle(ActivityHistoryEvent $event)
    {
        $this->acitivityHistory->publish($event->getEvent());
    }
}