<!DOCTYPE html>
<html>
    <head>
        @vite(['resources/sass/app.scss','resources/js/app.js'])    
    </head>

    <body class="container">
        <h2>HOME ni {{ $name }}</h2>
        <div class="row">
            {{-- <div class="col-md-3">
                <button type="button" class="btn btn-primary btn-block">Submit</button>
            </div> --}}

            <div class="col-lg-6 col-md-4 col-sm-3 bg-primary border p-3">
                <h2>Col 1</h2>
            </div>
            
            <div class="col-lg-6 col-md-4 col-sm-3 bg-danger border p-3">
                <h2>Col 2</h2>
            </div>
            <div class="col-lg-6 col-md-4 col-sm-3 bg-success border p-3">
                <h2>Col 3</h2>
            </div>
            <div class="col-lg-6 col-md-4 col-sm-3 bg-secondary border p-3">
                <h2>Col 4</h2>
            </div>

            {{-- <div class="col-lg-6"><i class="bi bi-apple" style="font-size: 5rem"></i></div> --}}

            {{-- <div><img src="../../../pic.jpg" class="img-fluid rounded-circle" /></div> --}}

        </div>

        <div class="row pt-4">
            {{-- <div class="col-md-3">
                <button type="button" class="btn btn-primary btn-block">Submit</button>
            </div> --}}

            <div class="col-lg-6 col-md-4 col-sm-3 bg-primary border p-3">
                <h2>Col 5</h2>
            </div>
            
            <div class="col-lg-6 col-md-4 col-sm-3 bg-danger border p-3">
                <h2>Col 6</h2>
            </div>
            <div class="col-lg-6 col-md-4 col-sm-3 bg-success border p-3">
                <h2>Col 7</h2>
            </div>
            <div class="col-lg-6 col-md-4 col-sm-3 bg-secondary border p-3">
                <div class="col-lg-6 col-md-4 col-sm-3 bg-success border p-3">
                    <h2>Col 1 under Col 8</h2>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-3 bg-secondary border p-3">
                    <h2>Col 2 under Col 8</h2>
                </div>
            </div>

            {{-- <div class="col-lg-6"><i class="bi bi-apple" style="font-size: 5rem"></i></div> --}}

            {{-- <div><img src="../../../pic.jpg" class="img-fluid rounded-circle" /></div> --}}

        </div>



    </body>

</html>