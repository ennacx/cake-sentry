<?php
declare(strict_types=1);

namespace Ennacx\CakeSentry\Error;

use ErrorException;

trait ErrorTrapTrait
{
    /**
     * Change error messages into ErrorException and write exception log.
     *
     * @param int|string $level The level name of the log.
     * @param array      $data  Array of error data.
     * @return void
     */
    protected function _logError(int|string $level, array $data): void
    {
        $error = new ErrorException($data['description'], 0, $data['code'], $data['file'], $data['line']);

        $this->logException($error);
    }
}
