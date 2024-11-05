<!-- resources/views/admin/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>

        <nav>
            <ul>
                <li><a href="{{ route('admin.manage_institutes') }}">Manage Institutes</a></li>
                <li><a href="{{ route('admin.manage_faculties') }}">Manage Faculties</a></li>
                <li><a href="{{ route('admin.manage_courses') }}">Manage Courses</a></li>
                <li><a href="{{ route('admin.manage_admissions') }}">Manage Admissions</a></li>
            </ul>
        </nav>

        <div>
            <h2>Statistics</h2>
            <!-- Add your statistics or metrics here -->
         </div>
    </div>
</body>
</html>
