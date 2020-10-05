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
                    <h1>User infomation</h1>
                    <hr>

                    <label for="Name"><b>Name</b></label>
                    <input type="text" placeholder="Name" name="name" id="name">

                    <label for="Username"><b>Username</b></label>
                    <input type="text" placeholder="Username" name="username" id="username">

                    <label for="Password"><b>Password</b></label>
                    <input type="Password" placeholder="Password" name="password" id="password" required>

                    <label for="VerifyPassword"><b>Verify password</b></label>
                    <input type="Password" placeholder="VerifyPassword" name="verifyPassword" id="verifyPassword" required value="">

                    <label for="Email"><b>Email</b></label>
                    <input type="text" placeholder="Email" name="email" id="email">

                    <label for="Phone number"><b>Phone number</b></label>
                    <input type="text" placeholder="Phone number" name="phoneNumber" id="phoneNumber">
                    <hr>

                    <label for="type">Student / Teacher:</label>
                    <select id="type" name="type" >
                        <option value="0">Student</option>
                        <option value="1">Teacher</option>
                    </select>
                    <input type="hidden" name="action" value='create'>

                    <button formaction="create_user" type="submit" style="float: right;" class="btn btn_action">Add user</button>
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