<html lang="en">

<head>
    <title>
        Page Title
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
</head>

<body>
    @include("header")
    @include("navbar")
    <div class="row">
        @include("side")
        <div class="main">
            <span style="font-size:20px">
                List challenge
            </span>

            @if(session('type') === 1)
            <button onclick="location.href='/create/challenge'" class='button button_action'>Add Challenge</button>
            @else
            <br>
            <br>
            @endif
            <table border='1'>
                <tr>
                    <th>Id</th>
                    <th>Challenge</th>
                    <th>Action</th>
                </tr>
                @foreach($challenges as $challenge)
                <tr>
                    <td>
                        {{$challenge}}
                    </td>
                    <td>
                        Challenge {{$challenge}}
                    </td>
                    <td>
                        <button onclick="location.href='/challenge/{{$challenge}}'" class=" button button_action">View detail</button>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="footer">
        <h2>
            Footer
        </h2>
    </div>
</body>

</html>