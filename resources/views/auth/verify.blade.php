<!-- resources/views/auth/verify.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Include your CSS here -->
</head>
<body>
    <div class="container">
        <h2>Email Verification</h2>

        <p>
            A verification link has been sent to your email address. Please check your email and click the link to verify your account.
        </p>

        <p>
            If you did not receive the email, <a href="{{ route('verification.resend') }}">click here to request another</a>.
        </p>
    </div>
</body>
</html>
