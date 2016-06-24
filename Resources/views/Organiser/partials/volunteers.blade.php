<table class="table table-striped">
    <thead>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    </thead>

    <tbody>
    @foreach($volunteers as $volunteer)
        <tr>
            <td>{{ $volunteer->name }}</td>
            <td>{{ $volunteer->email }}</td>
            <td>{{ $volunteer->phone }}</td>
        </tr>
    @endforeach
    </tbody>
</table>