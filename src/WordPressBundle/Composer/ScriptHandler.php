<?php

namespace WordPressBundle\Composer;

use Composer\Script\Event;
use Sensio\Bundle\DistributionBundle\Composer\ScriptHandler as BaseScriptHandler;

class ScriptHandler extends BaseScriptHandler
{
    protected static $event;
    protected static $options;

    protected static function configure(Event $event)
    {
        self::$event = $event;
        self::$options = self::getOptions($event);
    }

    public static function execute(Event $event)
    {
        self::configure($event);

        self::run('wordpress:configuration:install');
    }

    protected static function run($command)
    {
        self::executeCommand(self::$event, self::$options['symfony-app-dir'], $command);
    }
}
