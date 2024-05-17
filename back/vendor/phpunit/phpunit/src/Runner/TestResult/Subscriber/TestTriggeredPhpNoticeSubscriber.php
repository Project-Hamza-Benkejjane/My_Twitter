<?php

declare(strict_types=1);

/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\TestRunner\TestResult;

use PHPUnit\Event\Test\PhpNoticeTriggered;
use PHPUnit\Event\Test\PhpNoticeTriggeredSubscriber;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class TestTriggeredPhpNoticeSubscriber extends Subscriber implements PhpNoticeTriggeredSubscriber
{
    public function notify(PhpNoticeTriggered $event): void
    {
        $this->collector()->testTriggeredPhpNotice($event);
    }
}
