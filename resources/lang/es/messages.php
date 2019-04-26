<?php
return [
    'common_crud' => [
        'confirm_message' => 'Está seguro de elimar el :name?',
        'delete_title' => ':name eliminado exitosamente',
        'cancel' => 'Cancelar',
        'delete' => 'Eliminar',
        'created'=> [
            'title' => 'Crear nuevo :name',
            'success_message' => ':name creado exitosamente',
        ],
        'error' => [
            'general' => 'Hay algunos problemas con tus campos.',
        ],
        'new' => 'nuevo :name',
        'edit' => 'editar :name',
        'show' => 'descripción del :name'
    ],

    'login' => [
        'email'          => 'Correo electrónico',
        'password'       => 'Contraseña',
        'remember_me'    => 'Recordarme',
        'reset_password' => 'Olvidaste tu contraseña?'
    ],

    'users' => [
        'user'  => 'usuario',
        'users' => 'usuarios',
        'name'  => 'Nombre',
        'show'  => 'Descripcion del usuario',
        'description'  => 'Resumen',
        'roles' => 'Roles asignados',
    ],

    'projects' => [
        'project' => 'proyecto',
        'projects' => 'proyectos',
        'breadcrumbs' => [
            'create' => 'Nuevo proyecto',
            'edit' => 'Editar proyecto',
            'show' => 'Descripción del proyecto',
        ],
    ],

    'roles' => [
        'role' => 'rol',
        'roles' => 'roles',
        'show' => 'Descripción del rol',
        'description'  => 'Resumen',
    ],

    'logout' => 'Salir',

    'common' => [
        'create'     => 'Nuevo :name',
        'created_at' => 'Creado en',
        'accions'    => 'Acciones',
        'updated_at' => 'Última actualización',
        'home' => 'Inicio',
        'city' => 'Ciudad',
        'phone' => 'Teléfono',
        'cellphone' => 'Teléfono celular',
        'location' => 'Dirección',
    ],

    'navbar' => [
        'users' => 'Administrar usuarios',
        'roles' => 'Administrar roles'
    ],

    'partners' => [
        'plural' => 'Socios',
        'singular'=> 'socio',
        'breadcrumbs' => [
            'create' => 'Nuevo socio',
            'edit' => 'Editar socio',
            'show' => 'Descripción del socio',
        ],
    ],

    'contacts' => [
        'plural' => 'Contactos',
        'singular' => 'Contacto'
    ],

    'permissions' => [
        'role-list' => 'Ver lista de roles',
        'role-create' => 'Crear un rol',
        'role-edit' => 'Editar roles',
        'role-delete' => 'Eliminar roles',
        'role-show' => 'Ver rol',
        'user-list' => 'Ver lista de usuarios',
        'user-create' => 'Crear un usuario',
        'user-edit' => 'Editar usuarios',
        'user-delete' => 'Eliminar usuarios',
        'user-show' => 'Ver usuario',
    //    partner
        'partner-list' => 'Ver lista de socios',
        'partner-create' => 'Crear socio',
        'partner-edit' => 'Editar socio',
        'partner-delete' => 'Eliminar socio',
        'partner-show' => 'Ver socio',
    //    document
        'document-delete' => 'Eliminar documento',
    //    project
        'project-list' => 'Ver lista de proyectos',
        'project-create' => 'Crear proyecto',
        'project-edit' => 'Editar proyecto',
        'project-delete' => 'Eliminar proyecto',
        'project-upload' => 'Subir documento',
        'project-show' => 'Ver proyecto',
    ]
];
