<div class="col-md-6">
    <fieldset {{ count($lastFmUsers) !== 0 ?: 'disabled' }}>
        {!! Form::open(['method' => 'delete', 'route' => 'last_fm_users_destroy']) !!}
        <div class="form-group">
            <div class="tooltip-wrapper"
                 data-title="{{ count($lastFmUsers) !== 0 ? 'Delete All LastFm Users' : 'No LastFm Users
                 artists listened on database to delete'}}">
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-app']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </fieldset>
</div>
