<?php

$routes->group('bibliography', ['namespace' => 'App\Modules\Bibliography\Controllers'], function ($routes) {
    $routes->get('/', 'BibliographyController::index');
    $routes->get('add', 'BibliographyController::add');
    $routes->get('edit', 'BibliographyController::edit');
    $routes->get('analytics', 'BibliographyController::analytics');
    $routes->get('scanner', 'BibliographyController::scanner');
    $routes->post('scanner-fix-abstract', 'BibliographyController::scanner_fix_abstract');
    $routes->post('scanner-fix-files', 'BibliographyController::scanner_fix_files');
    $routes->post('scanner-fix-year', 'BibliographyController::scanner_fix_year');
    $routes->post('scanner-hide-no-author', 'BibliographyController::scanner_hide_no_author');
    $routes->get('mail', 'BibliographyController::sendMail');

    $routes->post('attDelete', 'BibliographyController::atthacmentDelete');
    $routes->post('save', 'BibliographyController::save');
    $routes->post('update', 'BibliographyController::update');
    $routes->post('docDelete', 'BibliographyController::delete');
    $routes->post('getAttachment', 'BibliographyController::getAttachment');
    $routes->post('updateAttachment', 'BibliographyController::updateAttachment');

        // ===== SMART APPROVAL CHAIN =====
    $routes->get('pipeline', 'ApprovalController::pipeline');
    $routes->post('approve', 'ApprovalController::approve');
    $routes->post('reject', 'ApprovalController::reject');
    $routes->get('approval-steps', 'ApprovalController::steps');
    $routes->post('approval-step-update', 'ApprovalController::stepUpdate');
    $routes->get('approval-detect', 'ApprovalController::detect');
    $routes->post('approval-submit', 'ApprovalController::submit');
    $routes->get('approval/(:segment)', 'ApprovalController::approvePublic/$1');
    $routes->post('approval/act', 'ApprovalController::actPublic');

        // ===== BULK OPERATIONS SUITE =====
    $routes->get('bulk', 'BulkController::index');
    $routes->get('bulk-list', 'BulkController::listDocs');
    $routes->post('bulk-exec', 'BulkController::exec');
    $routes->post('bulk-export', 'BulkController::export');

        // ===== INTEGRITY SCANNER =====
    $routes->get('integrity', 'IntegrityController::index');
    $routes->post('integrity-scan', 'IntegrityController::scan');
    $routes->get('integrity-detail', 'IntegrityController::detail');
    $routes->post('integrity-scan-all', 'IntegrityController::scanAll');
        // ===== INTEGRITY SCANNER =====
    $routes->get('integrity', 'IntegrityController::index');
    $routes->get('integrity-dashboard', 'IntegrityController::dashboard');
    $routes->post('integrity-scan', 'IntegrityController::scan');
    $routes->post('integrity-scan-all', 'IntegrityController::scanAll');
    $routes->get('integrity-detail', 'IntegrityController::detail');

    /**
     * Tools
     */
    $routes->get('import-xml', 'BibliographyController::import_xml');

    /**
     * Add Options
     */
    $routes->post('addopti', 'BibliographyController::addOptions');
    $routes->post('addmstry', 'BibliographyController::addMinistry');

    /**
     * FITUR #1: Katalogisasi AI
     */
    $routes->post('extract-ai', 'BibliographyController::extract_ai');
    $routes->post('check-duplicate', 'BibliographyController::check_duplicate');
    $routes->post('suggest-topics', 'BibliographyController::suggest_topics');
});
