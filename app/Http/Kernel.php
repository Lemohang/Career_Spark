protected $routeMiddleware = [
    'admin' => \App\Http\Middleware\AdminMiddleware::class,
    'institute' => \App\Http\Middleware\InstituteMiddleware::class,
    'student' => \App\Http\Middleware\StudentMiddleware::class,
    'verifyEmail' => \App\Http\Middleware\VerifyEmailMiddleware::class,
];
