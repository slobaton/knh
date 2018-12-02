<?php
Breadcrumbs::for('home', function ($trail) {
    $trail->push(
        ucfirst(__('messages.common.home')),
        route('home')
    );
});

//users
Breadcrumbs::for('users.index', function ($trail) {
    $trail->push(
        ucfirst(__('messages.users.users')),
        route('users.index')
    );
});
Breadcrumbs::for('users.create', function ($trail) {
    $trail->parent('users.index');
    $trail->push(
        ucfirst(__( 'messages.common_crud.new', ['name' => __('messages.users.user')])),
        route('users.create')
    );
});
Breadcrumbs::for('users.edit', function ($trail) {
    $trail->parent('users.index');
    $trail->push(
        ucfirst(__( 'messages.common_crud.edit', ['name' => __('messages.users.user')])),
        route('users.create')
    );
});
Breadcrumbs::for('users.show', function ($trail) {
    $trail->parent('users.index');
    $trail->push(
        ucfirst(__( 'messages.common_crud.show', ['name' => __('messages.users.user')])),
        route('users.create')
    );
});

//roles
Breadcrumbs::for('roles.index', function ($trail) {
    $trail->push(
        ucfirst(__('messages.roles.roles')),
        route('roles.index')
    );
});
Breadcrumbs::for('roles.create', function ($trail) {
    $trail->parent('roles.index');
    $trail->push(
        ucfirst(__( 'messages.common_crud.new', ['name' => __('messages.roles.role')])),
        route('roles.create')
    );
});
Breadcrumbs::for('roles.edit', function ($trail) {
    $trail->parent('roles.index');
    $trail->push(
        ucfirst(__( 'messages.common_crud.edit', ['name' => __('messages.roles.role')])),
        route('roles.create')
    );
});
Breadcrumbs::for('roles.show', function ($trail) {
    $trail->parent('roles.index');
    $trail->push(
        ucfirst(__( 'messages.common_crud.show', ['name' => __('messages.roles.role')])),
        route('roles.create')
    );
});

// partners
Breadcrumbs::for('partners.index', function ($trail) {
    $trail->push(
        ucfirst(__('messages.partners.plural')),
        route('partners.index')
    );
});
Breadcrumbs::for('partners.create', function ($trail) {
    $trail->parent('partners.index');
    $trail->push(
        ucfirst(__('messages.partners.breadcrumbs.create')),
        route('partners.create')
    );
});
Breadcrumbs::for('partners.edit', function ($trail) {
    $trail->parent('partners.index');
    $trail->push(
        ucfirst(__('messages.partners.breadcrumbs.edit')),
        route('partners.create')
    );
});
Breadcrumbs::for('partners.show', function ($trail) {
    $trail->parent('partners.index');
    $trail->push(
        ucfirst(__('messages.partners.breadcrumbs.show')),
        route('partners.create')
    );
});