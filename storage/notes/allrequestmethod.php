all()                       : Get all input data as an array.
input($key, $default = null): Get a specific input value.
only([...])                 : Get only the specified input values.
except([...])               : Get all input values except the specified ones.
has($key)                   : Check if a request parameter is present.
hasAny([...])               : Check if any of the given keys exist in the request.
filled($key)                : Check if an input value is present and not empty.
missing($key)               : Check if a request parameter is missing.
boolean($key)               : Get a boolean value from the request.
integer($key)               : Get an integer value from the request.
string($key)                : Get a string value from the request.

2. Handling Query Parameters

query($key, $default = null): Retrieve a query parameter.
hasQuery($key)              : Check if a query parameter exists.

3. Retrieving JSON Data

json($key, $default = null) : Retrieve JSON input.
all()                       : Get all JSON input as an array.


4. Files and Uploads
file($key)                 : Retrieve an uploaded file.
hasFile($key)              : Check if a file was uploaded.
validate([...])            : Validate uploaded files.

5. Checking Request Type
isMethod('post')           : Check the request method.
method()                   : Get the request method.
expectsJson()              : Check if the request expects a JSON response.
acceptsJson()              : Check if the request accepts JSON.

6. URL and Path Information

url()                      : Get the request URL without query parameters.
fullUrl()                  : Get the request URL with query parameters.
path()                     : Get the request path (excluding domain).
segment($index)            : Get a specific URL segment.
segments()                 : Get all URL segments.
root()                     : Get the root URL.


7. Headers and Cookies
header($key, $default = null) : Retrieve a header value.
hasHeader($key)               : Check if a request header exists.
bearerToken()                 : Get the Bearer token from the Authorization header.
cookie($key, $default = null) : Retrieve a cookie value.

8. Authentication
user()                        : Get the authenticated user.
hasValidSignature()           : Check if the request has a valid signature.

9. Old Input (For Form Resubmission)
old($key, $default = null)    : Retrieve old input value.
10. Merging and Replacing Input Data
merge([...])                  : Merge new input into the request.
replace([...])                : Replace request input.

11. Request Helpers
ajax()                        : Check if the request is an AJAX request.
pjax()                        : Check if the request is a PJAX request.
ip()                          : Get the client IP address.
ips()                         : Get an array of client IPs.
secure()                      : Check if the request is over HTTPS.