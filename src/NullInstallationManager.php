<?php
/**
 * @file
 * Contains Skip\Download|NullInstallationManager.
 */

namespace Skip\Download;

use Composer\Installer\InstallationManager;
use Composer\Repository\RepositoryInterface;
use Composer\DependencyResolver\Operation\OperationInterface;


class NullInstallationManager extends InstallationManager {

    public function execute(RepositoryInterface $repo, OperationInterface $operation)
    {
        return;
    }

}

