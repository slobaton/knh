<?php
Breadcrumbs::for('home', function ($trail) {
    $trail->push(__('messages.common.home'), route('home'));
});

// partners
Breadcrumbs::for('partners.index', function ($trail) {
    $trail->push(__('messages.partners.plural'), route('partners.index'));
});
Breadcrumbs::for('partners.create', function ($trail) {
    $trail->parent('partners.index');
    $trail->push(
        __('messages.partners.breadcrumbs.create'),
        route('partners.create')
    );
});
Breadcrumbs::for('partners.edit', function ($trail) {
    $trail->parent('partners.index');
    $trail->push(
        __('messages.partners.breadcrumbs.create'),
        route('partners.create')
    );
});
