<?php
    /**
     *	Bitly Related URL Config
     */

    $cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'bitly' ), array(
        // THEMES
        'tempo'	=> array(

            // URL
            'myThem.es' => array(
                /*'uri-title'         => 'http://mythem.es/?tempo=admin-panel&title=1',
                'uri-description'   => 'http://mythem.es/?tempo=admin-panel&description=1',
                'contact'           => 'http://mythem.es/contact/?tempo=admin-panel',*/


                'uri-title'         => 'http://bit.ly/2itLqhQ',
                'uri-description'   => 'http://bit.ly/2i7MOu8',
                'contact'           => 'http://bit.ly/2hPREfy',
            ),
            'Zeon'      => array(
                /*'uri-childs'        => 'http://mythem.es/item/zeon-wordpress-plugin-extends-tempo-free-wordpress-theme/?tempo=admin-panel&childs=1',
                'uri-description'   => 'http://mythem.es/item/zeon-wordpress-plugin-extends-tempo-free-wordpress-theme/?tempo=admin-panel&description=1',
                'uri-image'         => 'http://mythem.es/item/zeon-wordpress-plugin-extends-tempo-free-wordpress-theme/?tempo=admin-panel&image=1',*/


                'uri-childs'        => 'http://bit.ly/2igxVTB',
                'uri-description'   => 'http://bit.ly/2hoTHaQ',
                'uri-image'         => 'http://bit.ly/2hp0v8f',
            ),
            'Tempo'	    => array(
                /*'uri'               => 'http://mythem.es/item/tempo-is-the-best-blogging-wordpress-theme/?tempo=admin-panel',
                'uri-version'       => 'http://mythem.es/item/tempo-is-the-best-blogging-wordpress-theme/?tempo=admin-panel&version=1',
                'uri-image'         => 'http://mythem.es/item/tempo-is-the-best-blogging-wordpress-theme/?tempo=admin-panel&image=1',

                'premium'           => 'http://mythem.es/item/tempo-premium-your-best-wordpress-solution/?tempo=admin-panel',
                'premium-faq'       => 'http://mythem.es/item/tempo-premium-your-best-wordpress-solution/?tempo=admin-panel&faq=1',
                'premium-features'	=> 'http://mythem.es/item/tempo-premium-your-best-wordpress-solution/?tempo=admin-panel&features=1',
                'premium-button'	=> 'http://mythem.es/item/tempo-premium-your-best-wordpress-solution/?tempo=admin-panel&button=1',

                'support'	        => 'http://mythem.es/forums/forum/themes/tempo/?tempo=admin-panel',
                'contact'           => 'http://mythem.es/contact/?tempo=admin-panel&item=tempo',
                'bug-report'        => 'http://mythem.es/contact/?tempo=admin-panel&item=tempo&bug-report=1',

                'wordpress'	        => 'https://wordpress.org/themes/tempo/?tempo=admin-panel',*/


                'uri'               => 'http://bit.ly/2hP7W5F',
                'uri-version'       => 'http://bit.ly/2igyBIr',
                'uri-image'         => 'http://bit.ly/2hEMLlT',

                'premium'           => 'http://bit.ly/2hEPAn2',
                'premium-faq'       => 'http://bit.ly/2hp4tOq',
                'premium-features'	=> 'http://bit.ly/2hl9Oo8',
                'premium-button'	=> 'http://bit.ly/2hEQYGc',

                'support'	        => 'http://bit.ly/2hm24jj',
                'contact'           => 'http://bit.ly/2i5uy1U',
                'bug-report'        => 'http://bit.ly/2i5CYGz',

                'wordpress'	        => 'http://bit.ly/2iatR6z',
            ),
            'Cronus'	=> array(
                /*'uri'               => 'http://mythem.es/item/cronus-free-wordpress-child-theme-of-tempo/?tempo=admin-panel',
                'uri-version'		=> 'http://mythem.es/item/cronus-free-wordpress-child-theme-of-tempo/?tempo=admin-panel&version=1',
                'uri-image'         => 'http://mythem.es/item/cronus-free-wordpress-child-theme-of-tempo/?tempo=admin-panel&image=1',

                'premium'           => 'http://mythem.es/item/cronus-premium-wordpress-theme-a-child-theme-of-tempo/?tempo=admin-panel',
                'premium-faq'       => 'http://mythem.es/item/cronus-premium-wordpress-theme-a-child-theme-of-tempo/?tempo=admin-panel&faq=1',
                'premium-features'	=> 'http://mythem.es/item/cronus-premium-wordpress-theme-a-child-theme-of-tempo/?tempo=admin-panel&features=1',
                'premium-button'	=> 'http://mythem.es/item/cronus-premium-wordpress-theme-a-child-theme-of-tempo/?tempo=admin-panel&button=1',

                'support'           => 'http://mythem.es/forums/forum/themes/cronus/?tempo=admin-panel',
                'contact'           => 'http://mythem.es/contact/?tempo=admin-panel&item=cronus',
                'bug-report'        => 'http://mythem.es/contact/?tempo=admin-panel&item=cronus&bug-report=1',

                'wordpress'	        => 'https://wordpress.org/themes/cronus/?tempo=admin-panel',*/


                'uri'               => 'http://bit.ly/2hlQHYR',
                'uri-version'		=> 'http://bit.ly/2itP8rQ',
                'uri-image'         => 'http://bit.ly/2itV309',

                'premium'           => 'http://bit.ly/2i5BzQc',
                'premium-faq'       => 'http://bit.ly/2hWKcil',
                'premium-features'	=> 'http://bit.ly/2i7LebN',
                'premium-button'	=> 'http://bit.ly/2hELkUG',

                'support'           => 'http://bit.ly/2iaHmmw',
                'contact'           => 'http://bit.ly/2i7Qyf5',
                'bug-report'        => 'http://bit.ly/2hWNxxN',

                'wordpress'	        => 'http://bit.ly/2hUYwW9',
            ),
            'Sarmys'	=> array(
                /*'uri'               => 'http://mythem.es/item/sarmys-is-a-simple-clean-and-creative-free-wordpress-tempo-child-theme/?tempo=admin-panel',
                'uri-version'		=> 'http://mythem.es/item/sarmys-is-a-simple-clean-and-creative-free-wordpress-tempo-child-theme/?tempo=admin-panel&version=1',
                'uri-image'         => 'http://mythem.es/item/sarmys-is-a-simple-clean-and-creative-free-wordpress-tempo-child-theme/?tempo=admin-panel&image=1',

                'premium'           => 'http://mythem.es/item/sarmys-premium-creative-futuristic-design-with-powerful-features/?tempo=admin-panel',
                'premium-faq'       => 'http://mythem.es/item/sarmys-premium-creative-futuristic-design-with-powerful-features/?tempo=admin-panel&faq=1',
                'premium-features'	=> 'http://mythem.es/item/sarmys-premium-creative-futuristic-design-with-powerful-features/?tempo=admin-panel&features=1',
                'premium-button'	=> 'http://mythem.es/item/sarmys-premium-creative-futuristic-design-with-powerful-features/?tempo=admin-panel&button=1',

                'support'           => 'http://mythem.es/forums/forum/themes/sarmys/?tempo=admin-panel',
                'contact'           => 'http://mythem.es/contact/?tempo=admin-panel&item=sarmys',
                'bug-report'        => 'http://mythem.es/contact/?tempo=admin-panel&item=sarmys&bug-report=1',

                'wordpress'	        => 'https://wordpress.org/themes/sarmys/?tempo=admin-panel',*/


                'uri'               => 'http://bit.ly/2h73XEx',
                'uri-version'		=> 'http://bit.ly/2i7RSyo',
                'uri-image'         => 'http://bit.ly/2i5FiO1',

                'premium'           => 'http://bit.ly/2lfKFLp',
                'premium-faq'       => 'http://bit.ly/2kJTwaJ',
                'premium-features'	=> 'http://bit.ly/2kEXNwq',
                'premium-button'	=> 'http://bit.ly/2jU0mpX',

                'support'           => 'http://bit.ly/2i50Pcs',
                'contact'           => 'http://bit.ly/2hlaY2X',
                'bug-report'        => 'http://bit.ly/2iaRRrh',

                'wordpress'	        => 'http://bit.ly/2hDr9th',
            ),
        ),

        'cronus'	=> array(

            // URL
            'myThem.es' => array(
                /*'uri-title'         => 'http://mythem.es/?cronus=admin-panel&title=1',
                'uri-description'   => 'http://mythem.es/?cronus=admin-panel&description=1',
                'contact'           => 'http://mythem.es/contact/?cronus=admin-panel',*/


                'uri-title'         => 'http://bit.ly/2hkEd2H',
                'uri-description'   => 'http://bit.ly/2hq4Cj4',
                'contact'           => 'http://bit.ly/2ib1ciS',
            ),
            'Zeon'      => array(
                /*'uri-childs'        => 'http://mythem.es/item/zeon-wordpress-plugin-extends-tempo-free-wordpress-theme/?cronus=admin-panel&childs=1',
                'uri-description'   => 'http://mythem.es/item/zeon-wordpress-plugin-extends-tempo-free-wordpress-theme/?cronus=admin-panel&description=1',
                'uri-image'         => 'http://mythem.es/item/zeon-wordpress-plugin-extends-tempo-free-wordpress-theme/?cronus=admin-panel&image=1',*/


                'uri-childs'        => 'http://bit.ly/2iAcXm3',
                'uri-description'   => 'http://bit.ly/2i3MtrX',
                'uri-image'         => 'http://bit.ly/2inMuEW',
            ),
            'Tempo'	    => array(
                /*'uri'               => 'http://mythem.es/item/tempo-is-the-best-blogging-wordpress-theme/?cronus=admin-panel',
                'uri-version'       => 'http://mythem.es/item/tempo-is-the-best-blogging-wordpress-theme/?cronus=admin-panel&version=1',
                'uri-image'         => 'http://mythem.es/item/tempo-is-the-best-blogging-wordpress-theme/?cronus=admin-panel&image=1',

                'premium'           => 'http://mythem.es/item/tempo-premium-your-best-wordpress-solution/?cronus=admin-panel',
                'premium-faq'       => 'http://mythem.es/item/tempo-premium-your-best-wordpress-solution/?cronus=admin-panel&faq=1',
                'premium-features'	=> 'http://mythem.es/item/tempo-premium-your-best-wordpress-solution/?cronus=admin-panel&features=1',
                'premium-button'	=> 'http://mythem.es/item/tempo-premium-your-best-wordpress-solution/?cronus=admin-panel&button=1',

                'support'	        => 'http://mythem.es/forums/forum/themes/tempo/?cronus=admin-panel',
                'contact'           => 'http://mythem.es/contact/?cronus=admin-panel&item=tempo',
                'bug-report'        => 'http://mythem.es/contact/?cronus=admin-panel&item=tempo&bug-report=1',

                'wordpress'	        => 'https://wordpress.org/themes/tempo/?cronus=admin-panel',*/


                'uri'               => 'http://bit.ly/2hkSDjw',
                'uri-version'       => 'http://bit.ly/2ie0iVb',
                'uri-image'         => 'http://bit.ly/2iAMm4d',

                'premium'           => 'http://bit.ly/2hKxUXf',
                'premium-faq'       => 'http://bit.ly/2hqiiKL',
                'premium-features'	=> 'http://bit.ly/2iANqox',
                'premium-button'	=> 'http://bit.ly/2iAqGcA',

                'support'	        => 'http://bit.ly/2inCKuh',
                'contact'           => 'http://bit.ly/2hKwLPA',
                'bug-report'        => 'http://bit.ly/2inI3Kj',

                'wordpress'	        => 'http://bit.ly/2idVCyw',
            ),
            'Cronus'	=> array(
                /*'uri'               => 'http://mythem.es/item/cronus-free-wordpress-child-theme-of-tempo/?cronus=admin-panel',
                'uri-version'		=> 'http://mythem.es/item/cronus-free-wordpress-child-theme-of-tempo/?cronus=admin-panel&version=1',
                'uri-image'         => 'http://mythem.es/item/cronus-free-wordpress-child-theme-of-tempo/?cronus=admin-panel&image=1',

                'premium'           => 'http://mythem.es/item/cronus-premium-wordpress-theme-a-child-theme-of-tempo/?cronus=admin-panel',
                'premium-faq'       => 'http://mythem.es/item/cronus-premium-wordpress-theme-a-child-theme-of-tempo/?cronus=admin-panel&faq=1',
                'premium-features'	=> 'http://mythem.es/item/cronus-premium-wordpress-theme-a-child-theme-of-tempo/?cronus=admin-panel&features=1',
                'premium-button'	=> 'http://mythem.es/item/cronus-premium-wordpress-theme-a-child-theme-of-tempo/?cronus=admin-panel&button=1',

                'support'           => 'http://mythem.es/forums/forum/themes/cronus/?cronus=admin-panel',
                'contact'           => 'http://mythem.es/contact/?cronus=admin-panel&item=cronus',
                'bug-report'        => 'http://mythem.es/contact/?cronus=admin-panel&item=cronus&bug-report=1',

                'wordpress'	        => 'https://wordpress.org/themes/cronus/?cronus=admin-panel',*/


                'uri'               => 'http://bit.ly/2inOeOu',
                'uri-version'		=> 'http://bit.ly/2inEqE8',
                'uri-image'         => 'http://bit.ly/2iAIZua',

                'premium'           => 'http://bit.ly/2ib0C4u',
                'premium-faq'       => 'http://bit.ly/2hqaJUu',
                'premium-features'	=> 'http://bit.ly/2iAVEx2',
                'premium-button'	=> 'http://bit.ly/2i3ZtO9',

                'support'           => 'http://bit.ly/2hKxU9K',
                'contact'           => 'http://bit.ly/2hkPmAB',
                'bug-report'        => 'http://bit.ly/2inFSX3',

                'wordpress'	        => 'http://bit.ly/2iAtcQ7',
            ),
            'Sarmys'	=> array(
                /*'uri'               => 'http://mythem.es/item/sarmys-is-a-simple-clean-and-creative-free-wordpress-tempo-child-theme/?cronus=admin-panel',
                'uri-version'		=> 'http://mythem.es/item/sarmys-is-a-simple-clean-and-creative-free-wordpress-tempo-child-theme/?cronus=admin-panel&version=1',
                'uri-image'         => 'http://mythem.es/item/sarmys-is-a-simple-clean-and-creative-free-wordpress-tempo-child-theme/?cronus=admin-panel&image=1',

                'premium'           => 'http://mythem.es/item/sarmys-premium-creative-futuristic-design-with-powerful-features/?cronus=admin-panel',
                'premium-faq'       => 'http://mythem.es/item/sarmys-premium-creative-futuristic-design-with-powerful-features/?cronus=admin-panel&faq=1',
                'premium-features'	=> 'http://mythem.es/item/sarmys-premium-creative-futuristic-design-with-powerful-features/?cronus=admin-panel&features=1',
                'premium-button'	=> 'http://mythem.es/item/sarmys-premium-creative-futuristic-design-with-powerful-features/?cronus=admin-panel&button=1',

                'support'           => 'http://mythem.es/forums/forum/themes/sarmys/?cronus=admin-panel',
                'contact'           => 'http://mythem.es/contact/?cronus=admin-panel&item=sarmys',
                'bug-report'        => 'http://mythem.es/contact/?cronus=admin-panel&item=sarmys&bug-report=1',

                'wordpress'	        => 'https://wordpress.org/themes/sarmys/?cronus=admin-panel',*/


                'uri'               => 'http://bit.ly/2inMQv2',
                'uri-version'		=> 'http://bit.ly/2iAvD4Q',
                'uri-image'         => 'http://bit.ly/2i3Mhsy',

                'premium'           => 'http://bit.ly/2kyQeF2',
                'premium-faq'       => 'http://bit.ly/2lfdwyU',
                'premium-features'	=> 'http://bit.ly/2kF5O4j',
                'premium-button'	=> 'http://bit.ly/2jUkS9L',

                'support'           => 'http://bit.ly/2hu79Kz',
                'contact'           => 'http://bit.ly/2iAfgVZ',
                'bug-report'        => 'http://bit.ly/2ib2Lx3',

                'wordpress'	        => 'http://bit.ly/2iAfAnF',
            ),
        ),

        'sarmys'	=> array(

            // URL
            'myThem.es' => array(
                /*'uri-title'         => 'http://mythem.es/?sarmys=admin-panel&title=1',
                'uri-description'   => 'http://mythem.es/?sarmys=admin-panel&description=1',
                'contact'           => 'http://mythem.es/contact/?sarmys=admin-panel',*/


                'uri-title'         => 'http://bit.ly/2ib1LZL',
                'uri-description'   => 'http://bit.ly/2i3QXPd',
                'contact'           => 'http://bit.ly/2ie5OHp',
            ),
            'Zeon'      => array(
                /*'uri-childs'        => 'http://mythem.es/item/zeon-wordpress-plugin-extends-tempo-free-wordpress-theme/?sarmys=admin-panel&childs=1',
                'uri-description'   => 'http://mythem.es/item/zeon-wordpress-plugin-extends-tempo-free-wordpress-theme/?sarmys=admin-panel&description=1',
                'uri-image'         => 'http://mythem.es/item/zeon-wordpress-plugin-extends-tempo-free-wordpress-theme/?sarmys=admin-panel&image=1',*/


                'uri-childs'        => 'http://bit.ly/2hKFrFH',
                'uri-description'   => 'http://bit.ly/2hqhNQP',
                'uri-image'         => 'http://bit.ly/2hKIy00',
            ),
            'Tempo'	    => array(
                /*'uri'               => 'http://mythem.es/item/tempo-is-the-best-blogging-wordpress-theme/?sarmys=admin-panel',
                'uri-version'       => 'http://mythem.es/item/tempo-is-the-best-blogging-wordpress-theme/?sarmys=admin-panel&version=1',
                'uri-image'         => 'http://mythem.es/item/tempo-is-the-best-blogging-wordpress-theme/?sarmys=admin-panel&image=1',

                'premium'           => 'http://mythem.es/item/tempo-premium-your-best-wordpress-solution/?sarmys=admin-panel',
                'premium-faq'       => 'http://mythem.es/item/tempo-premium-your-best-wordpress-solution/?sarmys=admin-panel&faq=1',
                'premium-features'	=> 'http://mythem.es/item/tempo-premium-your-best-wordpress-solution/?sarmys=admin-panel&features=1',
                'premium-button'	=> 'http://mythem.es/item/tempo-premium-your-best-wordpress-solution/?sarmys=admin-panel&button=1',

                'support'	        => 'http://mythem.es/forums/forum/themes/tempo/?sarmys=admin-panel',
                'contact'           => 'http://mythem.es/contact/?sarmys=admin-panel&item=tempo',
                'bug-report'        => 'http://mythem.es/contact/?sarmys=admin-panel&item=tempo&bug-report=1',

                'wordpress'	        => 'https://wordpress.org/themes/tempo/?sarmys=admin-panel',*/


                'uri'               => 'http://bit.ly/2htYyYi',
                'uri-version'       => 'http://bit.ly/2ie3Tm6',
                'uri-image'         => 'http://bit.ly/2htZ0Gc',

                'premium'           => 'http://bit.ly/2iAxA1a',
                'premium-faq'       => 'http://bit.ly/2hkM2W7',
                'premium-features'	=> 'http://bit.ly/2i3PLeJ',
                'premium-button'	=> 'http://bit.ly/2hqdQvC',

                'support'	        => 'http://bit.ly/2iAuZUX',
                'contact'           => 'http://bit.ly/2iAMOza',
                'bug-report'        => 'http://bit.ly/2hKMdv2',

                'wordpress'	        => 'http://bit.ly/2ie8XqJ',
            ),
            'Cronus'	=> array(
                /*'uri'               => 'http://mythem.es/item/cronus-free-wordpress-child-theme-of-tempo/?sarmys=admin-panel',
                'uri-version'		=> 'http://mythem.es/item/cronus-free-wordpress-child-theme-of-tempo/?sarmys=admin-panel&version=1',
                'uri-image'         => 'http://mythem.es/item/cronus-free-wordpress-child-theme-of-tempo/?sarmys=admin-panel&image=1',

                'premium'           => 'http://mythem.es/item/cronus-premium-wordpress-theme-a-child-theme-of-tempo/?sarmys=admin-panel',
                'premium-faq'       => 'http://mythem.es/item/cronus-premium-wordpress-theme-a-child-theme-of-tempo/?sarmys=admin-panel&faq=1',
                'premium-features'	=> 'http://mythem.es/item/cronus-premium-wordpress-theme-a-child-theme-of-tempo/?sarmys=admin-panel&features=1',
                'premium-button'	=> 'http://mythem.es/item/cronus-premium-wordpress-theme-a-child-theme-of-tempo/?sarmys=admin-panel&button=1',

                'support'           => 'http://mythem.es/forums/forum/themes/cronus/?sarmys=admin-panel',
                'contact'           => 'http://mythem.es/contact/?sarmys=admin-panel&item=cronus',
                'bug-report'        => 'http://mythem.es/contact/?sarmys=admin-panel&item=cronus&bug-report=1',

                'wordpress'	        => 'https://wordpress.org/themes/cronus/?sarmys=admin-panel',*/


                'uri'               => 'http://bit.ly/2hKGDbP',
                'uri-version'		=> 'http://bit.ly/2iAMGzN',
                'uri-image'         => 'http://bit.ly/2iAUd1G',

                'premium'           => 'http://bit.ly/2iAQJMG',
                'premium-faq'       => 'http://bit.ly/2idXeZ2',
                'premium-features'	=> 'http://bit.ly/2hkRY1t',
                'premium-button'	=> 'http://bit.ly/2htWP58',

                'support'           => 'http://bit.ly/2hKByAi',
                'contact'           => 'http://bit.ly/2hqoF0D',
                'bug-report'        => 'http://bit.ly/2i46kae',

                'wordpress'	        => 'http://bit.ly/2inS3TI',
            ),
            'Sarmys'	=> array(
                /*'uri'               => 'http://mythem.es/item/sarmys-is-a-simple-clean-and-creative-free-wordpress-tempo-child-theme/?sarmys=admin-panel',
                'uri-version'		=> 'http://mythem.es/item/sarmys-is-a-simple-clean-and-creative-free-wordpress-tempo-child-theme/?sarmys=admin-panel&version=1',
                'uri-image'         => 'http://mythem.es/item/sarmys-is-a-simple-clean-and-creative-free-wordpress-tempo-child-theme/?sarmys=admin-panel&image=1',

                'premium'           => 'http://mythem.es/item/sarmys-premium-creative-futuristic-design-with-powerful-features/?sarmys=admin-panel',
                'premium-faq'       => 'http://mythem.es/item/sarmys-premium-creative-futuristic-design-with-powerful-features/?sarmys=admin-panel&faq=1',
                'premium-features'	=> 'http://mythem.es/item/sarmys-premium-creative-futuristic-design-with-powerful-features/?sarmys=admin-panel&features=1',
                'premium-button'	=> 'http://mythem.es/item/sarmys-premium-creative-futuristic-design-with-powerful-features/?sarmys=admin-panel&button=1',

                'support'           => 'http://mythem.es/forums/forum/themes/sarmys/?sarmys=admin-panel',
                'contact'           => 'http://mythem.es/contact/?sarmys=admin-panel&item=sarmys',
                'bug-report'        => 'http://mythem.es/contact/?sarmys=admin-panel&item=sarmys&bug-report=1',

                'wordpress'	        => 'https://wordpress.org/themes/sarmys/?sarmys=admin-panel',*/


                'uri'               => 'http://bit.ly/2ib8ras',
                'uri-version'		=> 'http://bit.ly/2hkSlce',
                'uri-image'         => 'http://bit.ly/2hqfMnS',

                'premium'           => 'http://bit.ly/2kiHqVr',
                'premium-faq'       => 'http://bit.ly/2lf9fLE',
                'premium-features'	=> 'http://bit.ly/2jToC09',
                'premium-button'	=> 'http://bit.ly/2kJZLv2',

                'support'           => 'http://bit.ly/2htX9RB',
                'contact'           => 'http://bit.ly/2ib5Ltk',
                'bug-report'        => 'http://bit.ly/2hkRzvV',

                'wordpress'	        => 'http://bit.ly/2hl2Yf5',
            ),
        ),
    ));

    tempo_cfgs::set( 'bitly', $cfgs );
?>
