<!-- resources/views/student/apply.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for a Course</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Apply for a Course</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('student.submit_application') }}">
            @csrf
            <div class="form-group">
                <label for="course">Select Course:</label>
                <select id="course" name="course_id" required>
                    <option value="">Choose a course</option>
                    @foreach($availableCourses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button type="submit">Submit Application</button>
            </div>
        </form>
    </div>
</body>
</html>
