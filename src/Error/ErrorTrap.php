<?php
declare(strict_types=1);

namespace Ennacx\CakeSentry\Error;

use Cake\Error\ErrorTrap as CakeErrorTrap;

class ErrorTrap extends CakeErrorTrap
{
    use ErrorTrapTrait;
}
