<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});

Breadcrumbs::for('admin.partner.services', function ($trail) {
    $trail->push(__('strings.backend.service.title'), route('admin.partner.services'));
});

Breadcrumbs::for('admin.partner.service.create', function ($trail) {
    $trail->push(__('strings.backend.service.title'), route('admin.partner.service.create'));
});

Breadcrumbs::for('admin.partner.service.edit', function ($trail, $id) {
    $trail->push(__('strings.backend.service.title'), route('admin.partner.service.edit', ['id' => $id]));
});

Breadcrumbs::for('admin.business.dashboard', function ($trail) {
    $trail->push(__('strings.backend.business.title'), route('admin.business.dashboard'));
});

Breadcrumbs::for('admin.business.window', function ($trail) {
    $trail->push('Windows', route('admin.business.window'));
});

Breadcrumbs::for('admin.business.window.create', function ($trail) {
    $trail->push('Window create', route('admin.business.window.create'));
});

require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';
