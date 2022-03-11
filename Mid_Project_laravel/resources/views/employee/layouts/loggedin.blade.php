<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <h3 align="center">Welcome {{Session::get('logged')}}</h3>
        <h4 align="right">
        <a href="{{route('officer.profile')}}" class="btn btn-primary" align="right">Profile </a>
        <a href="{{route('officer.logout')}}" class="btn btn-primary">Logout </a>
        </h3>
        @yield('content')
        
    </body>
</html>