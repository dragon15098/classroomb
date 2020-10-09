<html lang="en">

<head>
    <title>
        Page Title
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <script src='./../js/kit.fontawesome.js'></script>
    <script src='./../js/jquery.js'></script>
</head>

<body>
    @include('header')
    @include('navbar')
    <div class="row">
        @include('side')
        <div class="main">
            <span style="font-size:20px">
                List user
            </span>
            @if (session('type') === 1)
            <button onclick="location.href='create_user'" class='button button_action'>Add user</button>
            @else
            <br>
            <br>
            @endif
            <table border='1'>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>

                @foreach ($users as $user)
                <tr>
                    <td> {{ $user->id }} </td>
                    <td> {{ $user->name }} </td>
                    <td>
                        <button onclick="location.href='./user/detail/{{ $user->id }}'" class="button button_action">View detail
                        </button>
                        @if (session('type') === 1)
                        <button onclick="location.href='./change_password/{{ $user->id }}'" class="button button_action">Change password</button>
                        <button onclick="location.href='./delete_user/{{ $user->id }}'" class="button button_action">Delete user</button>
                        @endif
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