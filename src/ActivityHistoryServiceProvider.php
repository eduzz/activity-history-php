<?php

namespace Eduzz\ActivityHistory;

use Illuminate\Support\ServiceProvider;
use Eduzz\ActivityHistory\ActivityHistory;
use Eduzz\ActivityHistory\Library\QueueSenderApi;
use GuzzleHttp\Client;

class ActivityHistoryServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function boot()
    {
        $this->publishes(
            [
                __DIR__ . '/Config/activityhistory.php' => $this->getConfigPath('activityhistory.php'),
            ], 'config'
        );
    }

    public function register()
    {
        $this->app->singleton('Eduzz\ActivityHistory\ActivityHistory',
            function ($app) {
                $config = config('activityhistory');

                $client = new Client();

                $queueService = new QueueSenderApi($client);

                $activityHistory = new ActivityHistory(
                    $config['secret'],
                    $queueService
                );

                return $activityHistory;
            }
        );
    }

    /**
     * Get the configuration file path.
     *
     * @param string $path
     * @return string
     */
    private function getConfigPath($path = '')
    {
        return $this->app->basePath() . '/config' . ($path ? '/' . $path : $path);
    }

    public function provides()
    {
        return [ActivityHistory::class];
    }
}
