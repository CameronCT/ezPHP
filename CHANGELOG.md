#### 12/10/2016 - 9:00 PM
* Changed caching algorithm again.
* Changed File Structure to avoid future issues. (probably will get changed again)
* Removed RemoteAddress & Minify.
* Changed the way the pages render (very minor speed improvement)

#### 12/9/2016 - 1:30 AM
* Changed caching algorithm and made it unique to the user rather than the server. This will help for sites that plan to utilize sessions (ie. login / register pages)
* Added 3 plugins - ALERTS, CSRF, RemoteAddress & Minify. Any core plugins found with the lib is required to run the class, otherwise you may run into issues.
* Fixed small bug where the cache would only work every other second, suspected memory related issue... No clue how I fixed it.
* Made titles dynamic so you can use $this->title to set the page title itself, check example to see how it's used.
