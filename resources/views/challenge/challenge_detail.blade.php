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
            <form method="post">
                @csrf
                <div class="container">
                    <h1>Challenge detail</h1>
                    <label>
                        <b>
                            Hint
                        </b>
                    </label>
                    <textarea type="text" disabled id="content" name="hint" placeholder="Write some hint.." style="height:100px">{{$hint}}</textarea>
                    <input type="hidden" name="action" value="submit">
                    <input type="hidden" name="id" value="{{$id}}">
                    <label>
                        <b>
                            Answer
                        </b>
                    </label>
                    <input type="text" name="answer">
                    <br>
                    <button formaction="/challenge/submit" type="submit" style="float: right;" class="btn btn_action">Submit answer</button>
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