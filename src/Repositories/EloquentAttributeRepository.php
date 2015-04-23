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
namespace LaradicAdmin\Attributes\Repositories;

use Laradic\Support\AbstractEloquentRepository;

/**
 * Class EloquentAttributeRepository
 *
 * @package     LaradicAdmin\Attributes\Repositories
 */
class EloquentAttributeRepository extends AbstractEloquentRepository
{
    protected $model = 'LaradicAdmin\Attributes\Models\Attribute';
}
