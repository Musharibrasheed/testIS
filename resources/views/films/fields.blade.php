<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Release Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('release_date', 'Release Date:') !!}
    {!! Form::text('release_date', null, ['class' => 'form-control','id'=>'release_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#release_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Ticket Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ticket_price', 'Ticket Price:') !!}
    {!! Form::number('ticket_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Rating Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rating', 'Rating:') !!}
    {!! Form::select('rating', [], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Country Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country', 'Country:') !!}
    {!! Form::text('country', null, ['class' => 'form-control']) !!}
</div>

<!-- Genre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('genre', 'Genre:') !!}
    {!! Form::select('genre', [], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo', 'Photo:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('photo', ['class' => 'custom-file-input']) !!}
            {!! Form::label('photo', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>
