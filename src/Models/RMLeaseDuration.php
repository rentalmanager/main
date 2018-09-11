<?php
namespace RentalManager\Main\Models;

use Illuminate\Database\Eloquent\Model;
use RentalManager\Main\Traits\RMLeaseDurationTrait;

/**
 * Created by PhpStorm.
 * User: gorankrgovic
 * Date: 9/10/18
 * Time: 9:57 AM
 */

class RMLeaseDuration extends Model
{
    use RMLeaseDurationTrait;

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
        $this->table = 'lease_durations';
    }
}
