<div class="table-responsive">
    <table class="table" id="films-table">
        <thead>
        <tr>
            <th>Name</th>
        <th>Description</th>
        <th>Release Date</th>
        <th>Ticket Price</th>
        <th>Rating</th>
        <th>Country</th>
        <th>Genre</th>
        <th>Photo</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($filmss as $films)
            <tr>
                <td>{{ $films->name }}</td>
            <td>{{ $films->description }}</td>
            <td>{{ $films->release_date }}</td>
            <td>{{ $films->ticket_price }}</td>
            <td>{{ $films->rating }}</td>
            <td>{{ $films->country }}</td>
            <td>{{ $films->genre }}</td>
            <td>{{ $films->photo }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['films.destroy', $films->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('film_slug', ['slug' => $films->slug]); }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('films.edit', [$films->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        {{ $filmss->links()}}
        </tbody>
    </table>
</div>
