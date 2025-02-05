for laravel 11

global middleware
$middleware->append(EnsureTokenIsValid::class);


Routermiddlewate
$middleware->alias([
  'token.valid' => EnsureTokenIsValid::class,
]);

groupmiddleware
$middleware->group('customGroup', [
            FirstMiddleware::class,
            SecondMiddleware::class,
]);