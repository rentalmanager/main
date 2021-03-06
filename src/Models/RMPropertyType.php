<?php
namespace RentalManager\Main\Models;

use Illuminate\Database\Eloquent\Model;
use RentalManager\Main\Traits\RMPropertyTypeTrait;

/**
 * Created by PhpStorm.
 * User: gorankrgovic
 * Date: 9/10/18
 * Time: 9:56 AM
 */

class RMPropertyType extends Model
{
    use RMPropertyTypeTrait;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * Model constructor.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        // Set the table
        $this->table = 'property_types';
    }
}
