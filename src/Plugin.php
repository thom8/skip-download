<?php
/**
 * @file
 * Contains Skip\Download|Plugin.
 */

namespace Skip\Download;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use Composer\Plugin\CommandEvent;
use Composer\Plugin\PluginEvents;

class Plugin implements PluginInterface, EventSubscriberInterface {

    /**
     * @var \Composer\Composer
     */
    protected $composer;

    /**
     * @var \Composer\IO\IOInterface
     */
    protected $io;

    /**
     * {@inheritdoc}
     */
    public function activate(Composer $composer, IOInterface $io) {
        $this->composer = $composer;
        $this->io = $io;
    }


    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents() {
        return array(
            PluginEvents::COMMAND => 'skipDownload',
        );
    }

    /**
     * Skip downloading packages.
     *
     * @param \Composer\Script\CommandEvent $event
     */
    public function skipDownload(CommandEvent $event) {

        // disable autoloader dump $this->dumpAutoloader
        $input = $event->getInput();
        $input->setOption('no-autoloader', 'true');
        $input->setOption('no-scripts', 'true');

        $NullInstallationManager = new NullInstallationManager();
        $this->composer->setInstallationManager($NullInstallationManager);
    }

}
