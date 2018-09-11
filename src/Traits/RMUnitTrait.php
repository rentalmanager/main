<?php
namespace RentalManager\Main\Traits;

use RentalManager\Main\Common\ModelMethods;

/**
 * Created by PhpStorm.
 * User: gorankrgovic
 * Date: 9/10/18
 * Time: 10:00 AM
 */

trait RMUnitTrait
{
    use ModelMethods;

    /**
     * @param $attr
     * @return bool
     */
    public function hasAttribute($attr)
    {
        return array_key_exists($attr, $this->attributes);
    }


    // METHODS
    // ---------------------------
    /**
     * Set tags attribute as the json encoded string
     *
     * @param $value
     */
    public function setTagsAttribute($value)
    {
        $this->attributes['tags'] = ( $value ) ? json_encode($value) : null;
    }

    /**
     * Return tags attribute as the json decoded array
     *
     * @param $value
     * @return mixed|null
     */
    public function getTagsAttribute($value)
    {
        return ( $value ) ? json_decode( $value, true ) : null;
    }

    // RELATION BINDINGS
    // ---------------------------

    /**
     * Associate the property - you can pass a name, object or an ID
     *
     * @param $object
     * @return static
     */
    public function associateProperty( $object )
    {
        return $this->associateModel('properties', $object, true);
    }

    /**
     * @return $this
     */
    public function dissociateProperty()
    {
        return $this->dissociateModel('properties', true);
    }

    // RELATIONS
    // ---------------------------

    /**
     * Get the property that owns the property detail
     *
     * @return mixed
     */
    public function property()
    {
        return $this->belongsTo(
            'App\RentalManager\Main\Property',
            'property_id'
        );
    }




}
