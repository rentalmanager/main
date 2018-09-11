<?php
/**
 * Created by PhpStorm.
 * User: gorankrgovic
 * Date: 9/10/18
 * Time: 9:50 AM
 */
return [

    // Seeder data - default

    'seeder' => [

        /**
         * Default providers
         */
        'providers' => [
            [
                'name' => 'Rentbits',
                'slug' => 'rentbits'
            ],
            [
                'name' => 'ApartmentList',
                'slug' => 'apartmentlist'
            ],
            [
                'name' => 'Zumper',
                'slug' => 'zumper'
            ],
            [
                'name' => 'RentLingo',
                'slug' => 'rentlingo'
            ]
        ],

        /**
         * Property type seeder data
         */
        'property_type' => [
            [
                'name' => 'Apartment',
                'slug' => 'apartments'
            ],
            [
                'name' => 'Condo',
                'slug' => 'condos',
            ],
            [
                'name' => 'House',
                'slug' => 'houses'
            ],
            [
                'name' => 'Townhouse',
                'slug' => 'townhouses'
            ],
            [
                'name' => 'Duplex',
                'slug' => 'duplexes'
            ]
        ],

        /**
         * Rental type seeder data
         */
        'rental_type' => [
            [
                'name' => 'Regular',
                'slug' => 'regular'
            ],
            [
                'name' => 'Room for rent',
                'slug' => 'room-for-rent',
            ],
            [
                'name' => 'Sublet',
                'slug' => 'sublet'
            ],
            [
                'name' => 'Corporate',
                'slug' => 'corporate'
            ]
        ],


        /**
         * Rental restrictions seeder data
         */
        'rental_restriction' => [
            [
                'name' => 'No restrictions',
                'slug' => 'no-restrictions'
            ],
            [
                'name' => 'Senior housing',
                'slug' => 'senior-housing',
            ],
            [
                'name' => 'Student housing',
                'slug' => 'student-housing'
            ],
            [
                'name' => 'Military housing',
                'slug' => 'military-housing'
            ],
            [
                'name' => 'Income restricted',
                'slug' => 'income-restricted'
            ]
        ],


        /**
         * Lease duration data
         */
        'lease_duration' => [
            [
                'name' => 'Short term',
                'slug' => 'short-term'
            ],
            [
                'name' => 'Long term',
                'slug' => 'long-term'
            ],
            [
                'name' => 'Flexible',
                'slug' => 'flexible'
            ],
            [
                'name' => 'Rent to own',
                'slug' => 'rent-to-own'
            ]
        ],
    ]
];
