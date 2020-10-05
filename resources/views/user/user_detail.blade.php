<html lang="en">

<head>
    <title>
        Page Title
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/user_detail.css') }}" rel="stylesheet">
</head>

<body>
    @include('header')
    @include('navbar')
    <div class="row">
        @include('side')
        <div class="main">
            <form method="POST">
                @csrf
                <div class="container">
                    <h1>User infomation</h1>
                    <hr>

                    <label for="Name"><b>Name</b></label>
                    <input type="text" placeholder="Name" name="name" id="name" value="{{ $user->name }}" {!! session("type")===0 ? "readonly" : "" !!}>

                    <label for="Username"><b>Username</b></label>
                    <input type="text" placeholder="Username" name="username" id="username" value="{{ $user->username }}" {!! session("type")===0 ? "readonly" : "" !!}>

                    <label for="Email"><b>Email</b></label>
                    <input type="text" placeholder="Email" name="email" id="email" value="{{ $user->email }}">

                    <label for="Phone number"><b>Phone number</b></label>
                    <input type="text" placeholder="Phone number" name="phoneNumber" id="phoneNumber" value="{{ $user->phoneNumber }}">

                    <label><b>Teacher / Student</b></label>
                    <input type="text" placeholder="Type" name="type" readonly id="type" value="{{ $user->type === 1 ? 'Teacher' : 'Student' }}">

                    <input type="hidden" name="userId" id="userId" value="{{ $user->id}}">

                    <a href="message/{{ $user->id }}" style="float: left;" class="btn btn_action">Send Message</a>
                    @if (session('type') === 1 || session('userId') === $user->id )
                    <button method='POST' formaction='/user/update/' type='submit' style='float: right;' class='btn btn_action'>Update Info</button>
                    @endif
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