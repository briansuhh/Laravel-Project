<!DOCTYPE html>
<html>
    <head>
        @vite(['resources/sass/app.scss','resources/js/app.js'])    
    </head>

    <body>
        <h2>HOME </h2>
        <h2>{{ $name }}</h2>
        <h2>{{ $name }}</h2>
        <h2>{{ $name }}</h2>    
        <div class = "row">
            <div class="col-md-6">
                <button type="button" class="btn btn-primary btn-block">Submit</button>
            </div>
        </div>

        <img src="../../../pic.jpg" />

    </body>

</html>