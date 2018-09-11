<?php
namespace RentalManager\Main\Traits;

/**
 * Created by PhpStorm.
 * User: gorankrgovic
 * Date: 9/10/18
 * Time: 9:58 AM
 */


trait RMLeaseDurationTrait
{

    /**
     * @return mixed
     */
    public function properties()
    {
        return $this->hasMany(
            'App\RentalManager\Main\Property',
            'lease_duration_id'
        );
    }
}
