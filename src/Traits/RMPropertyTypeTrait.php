<?php
namespace RentalManager\Main\Traits;

/**
 * Created by PhpStorm.
 * User: gorankrgovic
 * Date: 9/10/18
 * Time: 9:59 AM
 */

trait RMPropertyTypeTrait
{

    /**
     * @return mixed
     */
    public function properties()
    {
        return $this->hasMany(
            'App\RentalManager\Main\Property',
            'property_type_id'
        );
    }
}
