<!doctype html>
<html lang="en" data-ng-app="SensationApp">

    <head>
        <meta charset="utf-8">
        <meta name="fragment" content="!">

        <meta name="sent_token" content="{{ Session::get('sent_token')}}">
        <meta name="APP_URL" content="{{env('APP_URL')}}">
        <meta name="APP_URL_LINK" content="{{env('APP_URL_LINK')}}">


        <title> {{env('APP_TITLE')}} </title>
        <meta name="description" content="{{env('APP_DESCRIPTION')}}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

      


        @include('links.css_links')
        @include('sys_functions.css_autoloader')
    </head>

    @yield('content')

    </div>


    <script>
    var G_token = '{{Session::token()}}';
    </script>


    @include('links.js_links')
    @include('sys_functions.js_autoloader')




    </body>

</html>