<?php
 /**
 * Part of the Laradic packages.
 * MIT License and copyright information bundled with this package in the LICENSE file.
 * @author      Robin Radic
 * @license     MIT
 * @copyright   2011-2015, Robin Radic
 * @link        http://radic.mit-license.org
 */
use Illuminate\Database\Seeder;
use Laradic\Support\Str;
use LaradicAdmin\Attributes\Models\Attribute;

/**
 * Class StubSeeder
 *
 * @package     ${NAMESPACE}
 */
class AttributeSeeder extends Seeder
{
    public function run()
    {

        $attributes = [
            ['slug' => 'website', 'field_type' => 'text', 'label' => 'Website', 'description' => 'The website of the user'],
            ['slug' => 'about', 'field_type' => 'text', 'label' => 'About', 'description' => 'Describe yourself in 1 or 2 sentences']
        ];
        foreach($attributes as $attr)
        {
            Attribute::create($attr);
        }
    }
}
