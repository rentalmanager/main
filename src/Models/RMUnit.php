<?php
namespace RentalManager\Main\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use RentalManager\Main\Traits\RMUnitTrait;

/**
 * Created by PhpStorm.
 * User: gorankrgovic
 * Date: 9/10/18
 * Time: 9:57 AM
 */

class RMUnit extends Model
{
    use SoftDeletes, RMUnitTrait;

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
        $this->table = 'units';
        // Set the dates
        $this->dates = [
            'deleted_at',
            'available_at'
        ];
    }
}
