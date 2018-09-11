<?php
namespace RentalManager\Main\Traits;

use RentalManager\Main\Common\ModelMethods;

/**
 * Created by PhpStorm.
 * User: gorankrgovic
 * Date: 9/10/18
 * Time: 9:59 AM
 */

trait RMPropertyTrait
{

    use ModelMethods;

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
     * Associate the property type - you can pass a name, object or an ID
     *
     * @param $object
     * @return static
     */
    public function associatePropertyType( $object )
    {
        return $this->associateModel('property_types', $object, true);
    }

    /**
     * @return $this
     */
    public function dissociatePropertyType()
    {
        return $this->dissociateModel('property_types', true);
    }

    /**
     * @param $object
     * @return static
     */
    public function associateRentalType( $object )
    {
        return $this->associateModel('rental_types', $object, true);
    }

    /**
     * @return $this
     */
    public function dissociateRentalType()
    {
        return $this->dissociateModel('rental_types', true);
    }

    /**
     * @param $object
     * @return static
     */
    public function associateLeaseDuration( $object )
    {
        return $this->associateModel('lease_durations', $object, true);
    }

    /**
     * @return $this
     */
    public function dissociateLeaseDuration()
    {
        return $this->dissociateModel('lease_durations', true);
    }

    /**
     * @param $object
     * @return static
     */
    public function associateLocation( $object )
    {
        return $this->associateModel('locations', $object, true);
    }

    /**
     * @return $this
     */
    public function dissociateLocation()
    {
        return $this->dissociateModel('locations', true);
    }

    /**
     * @param $object
     * @return static
     */
    public function associateRentalRestriction( $object )
    {
        return $this->associateModel('rental_restrictions', $object, true);
    }

    /**
     * @return $this
     */
    public function dissociateRentalRestriction()
    {
        return $this->dissociateModel('rental_restrictions', true);
    }

    /**
     * @param $object
     * @return static
     */
    public function associateProvider( $object )
    {
        return $this->associateModel('providers', $object, true);
    }

    /**
     * @return $this
     */
    public function dissociateProvider()
    {
        return $this->dissociateModel('providers', true);
    }

    // RELATIONS
    // ---------------------------

    /**
     * @return mixed
     */
    public function contact()
    {
        return $this->hasOne(
            'App\RentalManager\Main\Contact',
            'property_id'
        );
    }

    /**
     * Property type relation
     *
     * @return mixed
     */
    public function property_type()
    {
        return $this->belongsTo(
            'App\RentalManager\Main\PropertyType',
           'property_type_id');
    }


    /**
     * Provider relation
     *
     * @return mixed
     */
    public function provider()
    {
        return $this->belongsTo(
          'App\RentalManager\Main\Provider',
          'provider_id'
        );
    }

    /**
     * Get the units for this property
     *
     * @return mixed
     */
    public function units()
    {
        return $this->hasMany(
            'App\RentalManager\Main\Unit',
            'property_id'
        );
    }

    /**
     * Rental type
     *
     * @return mixed
     */
    public function rental_type()
    {
        return $this->belongsTo(
            'App\RentalManager\Main\RentalType',
            'rental_type_id');
    }

    /**
     * Lease duration
     *
     * @return mixed
     */
    public function lease_duration()
    {
        return $this->belongsTo(
           'App\RentalManager\Main\LeaseDuration',
           'lease_duration_id'
           );
    }

    /**
     * Lease duration
     *
     * @return mixed
     */
    public function location()
    {
        return $this->belongsTo(
            'App\RentalManager\Main\Location',
            'location_id'
        );
    }

    /**
     * Rental restriction
     *
     * @return mixed
     */
    public function rental_restriction()
    {
        return $this->belongsTo(
            'App\RentalManager\Main\RentalRestriction',
            'rental_restriction_id'
            );
    }


    /**
     * Handle dynamic method calls into the model.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        if (!preg_match('/^can[A-Z].*/', $method)) {
            return parent::__call($method, $parameters);
        }
    }

}
