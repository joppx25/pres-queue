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

Breadcrumbs::for('admin.business.window.store', function ($trail) {
    $trail->push('Window store', route('admin.business.window.store'));
});

Breadcrumbs::for('admin.business.window.edit', function ($trail, $id) {
    $trail->push('Window update', route('admin.business.window.edit', ['id' => $id]));
});

Breadcrumbs::for('admin.business.staff', function ($trail) {
    $trail->push('Staff', route('admin.business.staff'));
});

Breadcrumbs::for('admin.business.staff.create', function ($trail) {
    $trail->push('Create staff', route('admin.business.staff.create'));
});

Breadcrumbs::for('admin.business.staff.edit', function ($trail, $id) {
    $trail->push('Edit staff', route('admin.business.staff.edit', ['id' => $id]));
});

Breadcrumbs::for('admin.queue.list', function ($trail) {
    $trail->push('Queues', route('admin.queue.list'));
});

require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';
