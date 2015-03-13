<div class="col-md-6">
    <fieldset {{ count($lastFmUsers) === 0 ?: 'disabled' }}>
        {!! Form::open(['route' => 'last_fm_users_friends_store', 'files' => true, 'class' => 'form-inline']) !!}
        {!! Form::file('lastFmUserFriend', ['class' => 'filestyle btn btn-app', 'data-badge' => 'false', 'data-input' =>
        'false', 'type' => 'file', 'data-iconName' => 'fa fa-file-text-o', 'required' => 'required']) !!}
        <div class="tooltip-wrapper"
             data-title="{{ count($lastFmUsers) === 0 ? 'Import from file' : 'Delete lastFmUsers friends listened first'}}">
            {!! Form::button('<i class="fa fa-cloud-upload"></i>user_friends.dat', ['type' => 'submit', 'class' => 'btn
            btn-app' ])
            !!}
        </div>
        {!! Form::close() !!}
    </fieldset>
</div>

<div class="col-md-6">
    <fieldset {{ count($lastFmUsers) !== 0 ?: 'disabled' }}>
        {!! Form::open(['method' => 'delete', 'route' => ['last_fm_users_friends_destroy', 'all']]) !!}
        <div class="form-group">
            <div class="tooltip-wrapper"
                 data-title="{{ count($lastFmUsers) !== 0 ? 'Delete All LastFm Users' : 'No LastFm Users
                 friends listened on database to delete'}}">
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-app']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </fieldset>
</div>
