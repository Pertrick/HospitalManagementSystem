<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div style="{{ Request::is('login') ? 'margin-top:85px;' : ''}}">
    <a  style="font-size:35px;font-weight:900;"class="navbar-brand" href="{{route('userindex') }}"><span style="color:#02dfd8;" class="text-primary">One</span>-Health</a>
       
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4  bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
