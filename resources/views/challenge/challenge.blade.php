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
            <button onclick="location.href='./challenge/create.php'" class='button button_action'>Add Challenge</button>
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
                <?php

                // foreach ($page->data as &$challenge) {
                //     echo "<tr>";
                //     echo "<td>" . $challenge->challengeId . "</td>";
                //     echo "<td>Challenge " . $challenge->challengeId . "</td>";
                //     echo "<td>" . "<button onclick=\"location.href='./C_Challenge.php?id=" . $challenge->challengeId . "'\" class=\"button button_action\">View detail</button>" .
                //         "</td>";
                //     echo "</tr>";
                // }
                ?>
            </table>
            @include("page_footer")
        </div>
    </div>
    <div class="footer">
        <h2>
            Footer
        </h2>
    </div>
</body>

</html>