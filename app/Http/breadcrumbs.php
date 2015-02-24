<?php
/**
 * @author Rizart Dokollari
 * @since 2/19/15
 */

// Home
Breadcrumbs::register('show_dashboard', function ($breadcrumbs)
{
	$breadcrumbs->push('Dashboard', route('show_dashboard'), ['font_awesome_name' => 'fa fa-dashboard']);
});

// Home > [Artists]
Breadcrumbs::register('artists_path', function ($breadcrumbs)
{
	$breadcrumbs->parent('show_dashboard');

	$breadcrumbs->push("Artists", route('artists_path'));
});

// Home > [Tags]
Breadcrumbs::register('tags_path', function ($breadcrumbs)
{
	$breadcrumbs->parent('show_dashboard');

	$breadcrumbs->push("Tags", route('tags_path'));
});
