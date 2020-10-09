<html lang="en">

<head>
    <title>
        Page Title
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/add_challenge.css') }}" rel="stylesheet">
</head>

<body>
    @include("header")
    @include("navbar")

    <div class="row">
        @include("side")
        <div class="main">
            <form action="/challenge/create"  method="POST" enctype="multipart/form-data">
            @csrf    
            <div class="container">
                    <h1>Add Challenge</h1>
                    <textarea type="text" id="content" name="hint" placeholder="Write some hint.." style="height:100px"></textarea>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                 
                    <br>

                    <button method="POST"  type="submit" style="float: right;" class="btn btn_action">Create challenge</button>
                </div>

            </form>
        </div>
    </div>
    <div class="footer">
        <h2>
            Footer
        </h2>
    </div>
</body>

</html>