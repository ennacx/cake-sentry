<?php
declare(strict_types=1);

namespace Ennacx\CakeSentry;

use Cake\Core\Configure;
use Cake\Error\ErrorTrap;
use Cake\Error\ExceptionTrap;
use Cake\Log\Log;
use Ennacx\CakeSentry\Error\ErrorLogger;
use Ennacx\CakeSentry\Log\Engine\SentryLog;

$errorLogConfig = Log::getConfig('error');
$errorLogConfig['className'] = SentryLog::class;
Log::drop('error');
Log::setConfig('error', $errorLogConfig);
Configure::write('Error.errorLogger', ErrorLogger::class);

$isCli = (PHP_SAPI === 'cli');

if (!$isCli && strpos((env('argv')[0] ?? ''), '/phpunit') !== false) {
    $isCli = true;
}

$config = Configure::read('Error', []);
$trap = ($isCli) ? new ExceptionTrap($config) : new ErrorTrap($config);
$trap->register();
