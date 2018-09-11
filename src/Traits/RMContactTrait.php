<?php
namespace RentalManager\Main\Traits;

use RentalManager\Main\Common\ModelMethods;

/**
 * Created by PhpStorm.
 * User: gorankrgovic
 * Date: 9/10/18
 * Time: 9:58 AM
 */


trait RMContactTrait
{
    use ModelMethods;

    /**
     * @return mixed
     */
    public function property()
    {
        return $this->belongsTo(
            'App\RentalManager\Main\Property',
            'property_id'
        );
    }

    /**
     * @param $object
     * @return static
     */
    public function associateProperty( $object )
    {
        return $this->associateModel('property', $object, true);
    }

    /**
     * @return $this
     */
    public function dissociateProperty()
    {
        return $this->dissociateModel('property', true);
    }

}
