<?php
declare(strict_types=1);

namespace Ennacx\CakeSentry\Error;

use Cake\Error\ExceptionTrap as CakeExceptionTrap;

class ExceptionTrap extends CakeExceptionTrap
{
    use ErrorTrapTrait;
}
