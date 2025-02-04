

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'bn'])) {
        Session::put('locale', $locale);
        App::setLocale($locale);
    }
    return redirect()->back();
});

if (Session::has('locale')) {
    App::setLocale(Session::get('locale'));
}

json file
{
    "welcome": "Welcome to our website!"
}

{{ __('welcome') }}
