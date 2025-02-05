session(['key' => 'value']);  // Using session() helper

Session::put('key', 'value');  // Using the Session facade

$value = session('key');  // Returns 'value'

$value = Session::get('key');  // Alternative way

$value = session('key', 'default_value');


if (session()->has('key')) {
    // The key exists in the session
}

if (Session::has('key')) {
    // The key exists
}

if (session()->exists('key')) {
    // Key exists and is not null
}

session()->forget('key');  // Removes a specific key
Session::forget('key');
session()->forget(['key1', 'key2']);

session()->flush();  
Session::flush();  

session()->flash('message', 'This is a flash message!');
session('message');

session()->reflash(); // Keeps all flash data for the next request
session()->keep(['message']); // Keeps only the 'message' key


$sessionId = session()->getId();  // Get current session ID

session()->regenerate();  // Regenerate session ID for security (after login)
