<?php
namespace RentalManager\Main\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use RentalManager\Main\Traits\RMPropertyTrait;

/**
 * Created by PhpStorm.
 * User: gorankrgovic
 * Date: 9/10/18
 * Time: 9:57 AM
 */

class RMProperty extends Model
{
    use SoftDeletes, RMPropertyTrait;

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
        $this->table = 'properties';
        // Set the dates
        $this->dates = [
            'deleted_at'
        ];
    }
}
