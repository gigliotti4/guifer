<?php

/**

 *

 */

define( 'MENU' ,

[

    [

        'id'        => 'home',

        'nombre'    => 'Home',

        'icono'     => '<i class="fas fa-home"></i>',

        'submenu'   => [

            [

                'nombre'    => 'Slider',

                'icono'     => '<i class="far fa-images"></i>',

                'url'       => '/adm/slider/home',//route('slider.index', [ 'seccion' => 'home' ] )


            ],

            [

                'nombre'    => 'Contenido',

                'icono'     => '<i class="nav-icon fas fa-file-contract"></i>',

                'url'       => '/adm/contenido/home/edit', //route( 'contenido.edit' , [ 'seccion' => 'home' ] )

            ]

        ],

        'ok'        => 1

    ],

    [

        'id'        => 'empresa',

        'nombre'    => 'Empresa',

        'icono'     => '<i class="fas fa-industry"></i>',

        'submenu'   => [

            [

                'nombre'    => 'Slider',

                'icono'     => '<i class="far fa-images"></i>',

                'url'       => null,//route('slider.index', ['seccion' => 'empresa'])

            ],

            [

                'nombre'    => 'Contenido',

                'icono'     => '<i class="nav-icon fas fa-file-contract"></i>',

                'url'       => '/adm/contenido/empresa/edit',//route( 'contenido.edit' , [ 'seccion' => 'empresa' ] )

            ]

        ],

        'ok'        => 1

    ],

    [

        'id'        => 'productos',

        'nombre'    => 'Productos',

        'icono'     => '<i class="fas fa-hammer"></i>',

        'submenu'   => [

            [

                'nombre'    => 'Categorías',

                'icono'     => '<i class="fas fa-marker"></i>',

                'url'       =>'/adm/producto/categorias',//route('categorias.index')

            ],

            [

                'nombre'    => 'Productos',

                'icono'     => '<i class="fab fa-elementor"></i>',

                'url'       =>'/adm/productos',//route( 'productos.index')

            ]

        ],

        'ok'        => 0

    ],

    [

        'id'        => 'novedades',

        'nombre'    => 'Novedades',

        'icono'     => '<i class="fab fa-blogger-b"></i>',

        'url'       =>'/adm/blogs',//route('blogs.index'),

        'ok'        => 0

    ],

    [

        'id'        => 'clientes',

        'nombre'    => 'Clientes',

        'icono'     => '<i class="fas fa-user-tie"></i>',

        'url'       =>'/adm/clientes',//route('clientes.index'),

        'ok'        => 1

    ],

    [

        'id'        => 'servicios',

        'nombre'    => 'Servicios',

        'icono'     => '<i class="fab fa-servicestack"></i>',

        'url'       =>'/adm/contenido/servicios/edit',//route( 'contenido.edit' , ['seccion' => 'servicios']),

        'ok'        => 1

    ]

]

);