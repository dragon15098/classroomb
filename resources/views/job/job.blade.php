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
                List Job
            </span>
            @if (session('type')===1)
            <button onclick="location.href='/create/job'" class='button button_action'>Add new Job</button>
            @else
            <br>
            <br>
            @endif
            <table border='1'>
                <tr>
                    <th>Id</th>
                    <th>JobName</th>
                    <th>Action</th>
                </tr>
                @foreach ($jobs as $job)
                <tr>
                    <td> {{ $job->id }} </td>
                    <td> {{ $job->jobName }} </td>
                    <td>
                        <button onclick="location.href='/job/{{ $job->id }}'" class="button button_action">View detail</button>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    </div>
    <div class="footer">
        <h2>
            Footer
        </h2>
    </div>
</body>

</html>