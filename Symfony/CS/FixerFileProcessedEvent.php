<?php

/*
 * This file is part of the PHP CS utility.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Symfony\CS;

use Symfony\Component\EventDispatcher\Event;

/**
 * Event that is fired when file was processed by Fixer.
 *
 * @author Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * @internal
 */
final class FixerFileProcessedEvent extends Event
{
    /**
     * Event name.
     */
    const NAME = 'fixer.file_processed';

    const STATUS_UNKNOWN = 0;
    const STATUS_INVALID = 1;
    const STATUS_SKIPPED = 2;
    const STATUS_NO_CHANGES = 3;
    const STATUS_FIXED = 4;
    const STATUS_EXCEPTION = 5;
    const STATUS_LINT = 6;

    /**
     * File status.
     *
     * @var int
     */
    private $status = self::STATUS_UNKNOWN;

    /**
     * Create instance.
     *
     * @return FixerFileProcessedEvent
     */
    public static function create()
    {
        return new static();
    }

    /**
     * Get status.
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set status.
     *
     * @param int $status
     *
     * @return FixerFileProcessedEvent
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
}
