<div class="col-md-6">
    <div class="form-group">
        <div class="tooltip-wrapper"
             data-title="You need to login first">
            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-app', 'data-toggle'
            => 'tooltip', 'data-placement' => 'bottom', 'disabled' => $artists->count() === 0 ? 'disabled' : ''])
            !!}
        </div>
    </div>
</div>
