<?php

namespace TYPO3\Surf\Tests\Unit\Task;

/*
 * This file is part of TYPO3 Surf.
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

use TYPO3\Surf\Task\UnlockDeploymentTask;

final class UnlockDeploymentTaskTest extends BaseTaskTest
{
    protected function setUp()
    {
        parent::setUp();
        $this->application->setDeploymentPath('/home/jdoe/app');
    }

    /**
     * @test
     */
    public function unlockSuccessfully()
    {
        $this->task->execute($this->node, $this->application, $this->deployment);
        $this->assertCommandExecuted(sprintf('rm -f %s/.surf/deploy.lock', escapeshellarg($this->application->getDeploymentPath())));
    }

    /**
     * @return \TYPO3\Surf\Domain\Model\Task|UnlockDeploymentTask
     */
    protected function createTask()
    {
        return new UnlockDeploymentTask();
    }
}