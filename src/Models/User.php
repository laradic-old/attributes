<?php
/**
 * Part of the Laradic packages.
 * MIT License and copyright information bundled with this package in the LICENSE file.
 *
 * @author      Robin Radic
 * @license     MIT
 * @copyright   2011-2015, Robin Radic
 * @link        http://radic.mit-license.org
 */
namespace LaradicAdmin\Attributes\Models;

use LaradicAdmin\Attributes\Traits\EntityTrait;
use Sentinel\Models\User as BaseModel;

/**
 * Class User
 *
 * @package     Laradic\Admin\Models
 */
class User extends BaseModel
{
    use EntityTrait;
}
