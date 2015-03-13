<div class="col-md-6">
    <fieldset {{ count($usersTagArtists) === 0 ?: 'disabled' }}>
        {!! Form::open(['route' => 'last_fm_users_tagged_artists_store', 'files' => true, 'class' => 'form-inline']) !!}
        {!! Form::file('usersTagArtists', ['class' => 'filestyle btn btn-app', 'data-badge' => 'false', 'data-input' =>
        'false', 'type' => 'file', 'data-iconName' => 'fa fa-file-text-o', 'required' => 'required']) !!}
        <div class="tooltip-wrapper"
             data-title="{{ count($usersTagArtists) === 0 ? 'Import from file' : 'Delete LastFmUsers Tagged Artists first'}}">
            {!! Form::button('<i class="fa fa-cloud-upload"></i>user_taggedartists-timestamps.dat', ['type' => 'submit',
            'class' => 'btn btn-app' ]) !!}
        </div>
        {!! Form::close() !!}
    </fieldset>
</div>

<div class="col-md-6">
    <fieldset {{ count($usersTagArtists) !== 0 ?: 'disabled' }}>
        {!! Form::open(['method' => 'delete', 'route' => 'last_fm_users_tagged_artists_destroy']) !!}
        <div class="form-group">
            <div class="tooltip-wrapper"
                 data-title="{{ count($usersTagArtists) !== 0 ? 'Delete All LastFm Users Tagged Artists' : 'No LastFm
                 Users Tagged Artists on database to delete'}}">
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-app']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </fieldset>
</div>
