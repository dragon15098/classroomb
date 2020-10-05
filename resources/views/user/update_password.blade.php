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
    @include("header")
    @include("navbar")
    <div class="row">
        @include("side")
        <div class="main">
            <form method="POST">
                @csrf
                <div class="container">
                    <h1>Change password</h1>
                    <hr>
                    <label for="Password"><b>Password</b></label>
                    <input type="Password" placeholder="Password" name="password" id="password" required>

                    <label for="VerifyPassword"><b>Verify password</b></label>
                    <input type="Password" placeholder="VerifyPassword" name="verifyPassword" id="verifyPassword" required value="">
                 
                    <input type="hidden" name="userId" id="userId" value="{{ $id }}">

                    <button method="POST" formaction="/change_password" type="submit" style="float: right;" class="btn btn_action">Change</button>
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