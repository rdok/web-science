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

// Home > [Tags]
Breadcrumbs::register('tags_path', function ($breadcrumbs)
{
	$breadcrumbs->parent('show_dashboard');

	$breadcrumbs->push("Tags", route('tags_path'));
});

// Home > [LastFm Users Artists]
Breadcrumbs::register('last_fm_users_artists_path', function ($breadcrumbs)
{
	$breadcrumbs->parent('show_dashboard');

	$breadcrumbs->push("LastFm Users Artists", route('last_fm_users_artists_path'));
});

// Home > [LastFm Users]
Breadcrumbs::register('last_fm_users_path', function ($breadcrumbs)
{
	$breadcrumbs->parent('show_dashboard');

	$breadcrumbs->push("LastFm Users", route('last_fm_users_path'));
});

// Home > [LastFm Users friends]
Breadcrumbs::register('last_fm_users_friends_path', function ($breadcrumbs)
{
	$breadcrumbs->parent('show_dashboard');

	$breadcrumbs->push("LastFm Users Friends", route('last_fm_users_friends_path'));
});

// Home > [LastFm Users Tagged Artists]
Breadcrumbs::register('last_fm_users_tagged_artists_path', function ($breadcrumbs)
{
	$breadcrumbs->parent('show_dashboard');

	$breadcrumbs->push("LastFm Users Tagged Artists", route('last_fm_users_tagged_artists_path'));
});
