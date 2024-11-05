<!-- resources/views/admin/manage_institutes.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Institutes</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Manage Institutes</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <h2>Institutes List</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($institutes as $institute)
                    <tr>
                        <td>{{ $institute->id }}</td>
                        <td>{{ $institute->name }}</td>
                        <td>
                            <a href="{{ route('admin.edit_institute', $institute->id) }}">Edit</a>
                            <form action="{{ route('admin.delete_institute', $institute->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Add New Institute</h2>
        <form method="POST" action="{{ route('admin.store_institute') }}">
            @csrf
            <div>
                <label for="name">Institute Name:</label>
                <input type="text" name="name" required>
            </div>
            <div>
                <button type="submit">Add Institute</button>
            </div>
        </form>
    </div>
</body>
</html>
