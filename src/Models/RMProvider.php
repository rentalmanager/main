<?php
namespace RentalManager\Main\Models;

use Illuminate\Database\Eloquent\Model;
use RentalManager\Main\Traits\RMProviderTrait;

/**
 * Created by PhpStorm.
 * User: gorankrgovic
 * Date: 9/10/18
 * Time: 9:55 AM
 */

class RMProvider extends Model
{
    use RMProviderTrait;


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
        $this->table = 'providers';
    }
}
