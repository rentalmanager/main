<?php
namespace RentalManager\Main\Common;

use Illuminate\Support\Str;

/**
 * Created by PhpStorm.
 * User: gorankrgovic
 * Date: 9/10/18
 * Time: 10:38 AM
 */


trait ModelMethods
{
    /**
     * Alias to eloquent associate() method
     *
     * @param string $relationship
     * @param mixed $object
     * @return static
     */
    private function associateModel($relationship, $object, $singular = false)
    {
        if ( $singular )
        {
            // In associate there is just a singular method
            $relationship = Str::singular($relationship);
        }
        $this->$relationship()->associate($object);
        return $this;
    }

    /**
     * Alias to eloquent dissociate method
     *
     * @param $relationship
     * @param bool $singular
     * @return $this
     */
    private function dissociateModel($relationship, $singular = false)
    {
        if ( $singular )
        {
            // In associate there is just a singular method
            $relationship = Str::singular($relationship);
        }

        $this->$relationship()->dissociate();
        return $this;
    }
}
