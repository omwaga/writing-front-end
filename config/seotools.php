<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "Essay Flame Writers", // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => 'High-Class Papers on Demand', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ['Write my paper',
            'Research paper Writing',
            'Assignment help',
            'Reflection paper writer',
           'Write my essay',
            'Writing Services',
            'Hire writer',
            'Homework help',
            'Essay writing services',
            'Creative Writing ',
            'Term paper',
            'Essay flame',
            'Essay writer',
            'Top grade writers',
            'Top writers',
            'Paper from pros you can trust',
            'Pay for essay',
            'Do my homework',
            'Term paper',
            'Rhetorical analysis',
            'Speech writing',
            'Writing 500 words essay',
            'Writing formats',
            'Verified tutors',
            'Resume writing services',
            'Argumentative essay writer',
            'Cheap essay writer',
            'Case study analysis',
            'Review article',
            'Creative essays',
            'Research and summaries',
            'Speechwriting',
            'Proofreader and editor',
            'Product descriptions writer',
            'Essay pay',
            'Do my project',
            'Pay paper',
            'Write my thesis',
            'Literature writer',
            'Nursing writer',
            ],
            'canonical'    => false, // Set null for using Url::current(), set false to total remove
            'robots'       => false, // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Essay Flame Writers', // set false to total remove
            'description' => 'High-Class Papers on Demand', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => false,
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'Essay Flame Writers', // set false to total remove
            'description' => 'High-Class Papers on Demand', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];
