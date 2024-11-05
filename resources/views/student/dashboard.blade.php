<!-- resources/views/student/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Welcome, {{ Auth::user()->name }}</h1>

        <h2>Application Status</h2>
        @if($application)
            <p>Status: {{ $application->status }}</p>
            <p>Applied Course: {{ $application->course->name }}</p>
        @else
            <p>You have not applied for any course yet. <a href="{{ route('student.apply') }}">Apply Now</a></p>
        @endif

        <h2>Enrolled Courses</h2>
        <ul>
            @foreach($courses as $course)
                <li>{{ $course->name }} - {{ $course->description }}</li>
            @endforeach
        </ul>

        <h2>Announcements</h2>
        <ul>
            @foreach($announcements as $announcement)
                <li>{{ $announcement->content }}</li>
            @endforeach
        </ul>
    </div>
</body>
</html>
