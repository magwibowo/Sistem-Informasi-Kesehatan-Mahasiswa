<?php

/**
 * This file is part of the "laravel-lang/publisher" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 * @copyright 2023 Laravel Lang Team
 * @license MIT
 *
 * @see https://laravel-lang.com
 */

declare(strict_types=1);

namespace LaravelLang\Publisher\Services\Converters\Text;

use LaravelLang\Publisher\Helpers\Config;
use LaravelLang\Publisher\TextDecorator;

abstract class BaseDecorator implements TextDecorator
{
    public function __construct(
        protected Config $config
    ) {}
}