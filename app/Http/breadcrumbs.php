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

// Home > [Page]
Breadcrumbs::register('show_artists', function ($breadcrumbs)
{
    $breadcrumbs->parent('show_dashboard');

	$breadcrumbs->push("LastFM Artists", route('show_artists'));
});
