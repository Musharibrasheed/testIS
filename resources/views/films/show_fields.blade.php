<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $films->name }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $films->description }}</p>
</div>

<!-- Release Date Field -->
<div class="col-sm-12">
    {!! Form::label('release_date', 'Release Date:') !!}
    <p>{{ $films->release_date }}</p>
</div>

<!-- Ticket Price Field -->
<div class="col-sm-12">
    {!! Form::label('ticket_price', 'Ticket Price:') !!}
    <p>{{ $films->ticket_price }}</p>
</div>

<!-- Rating Field -->
<div class="col-sm-12">
    {!! Form::label('rating', 'Rating:') !!}
    <p>{{ $films->rating }}</p>
</div>

<!-- Country Field -->
<div class="col-sm-12">
    {!! Form::label('country', 'Country:') !!}
    <p>{{ $films->country }}</p>
</div>

<!-- Genre Field -->
<div class="col-sm-12">
    {!! Form::label('genre', 'Genre:') !!}
    <p>{{ $films->genre }}</p>
</div>

<!-- Photo Field -->
<div class="col-sm-12">
    {!! Form::label('photo', 'Photo:') !!}
    <p>{{ $films->photo }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $films->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $films->updated_at }}</p>
</div>

