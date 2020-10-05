<html lang="en">

<head>
    <title>
        Page Title
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">

    <link href="{{ asset('css/user_detail.css') }}" rel="stylesheet">
    <link href="{{ asset('css/user_message.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/kit.fontawesome.js') }}" type="text/javascript"></script>
</head>

<body>
    @include("header")
    @include("navbar")

    <div class="row">
        @include("side")
        <div class="main">
            <h2>Chat Messages</h2>
            <script>
                function changeView(messageId) {
                    var buttonId = "button" + messageId;
                    var inputId = "input" + messageId;
                    if ($("#" + buttonId).is(":visible")) {
                        $("#" + inputId).prop('disabled', true);
                        $("#" + buttonId).hide();
                    } else {
                        $("#" + inputId).prop('disabled', false);
                        $("#" + buttonId).show();
                    }
                }

            </script>
            <div class="container" style="height:400px; overflow: auto;">

                @foreach ($messages as $message)
                @if($message->fromUserId === session('userId'))
                <div class='container_message'>
                    <form id="deleteForm{{$message->id}}" method="post" action="/user/message/delete">
                        @csrf
                        <input type="hidden" name="messageId" value="{{$message->id}}">
                        <i onclick='document.forms["deleteForm{{$message->id}}"].submit();' class='far fa-trash-alt icon-action'></i>
                    </form>
                    <br>
                    <i  class='fas fa-marker icon-action' onclick='changeView(1)'></i>
                    <br>
                    <form action="/user/message/update" method="post">
                        @csrf
                        <input name="content" style='float:right;' disabled value='{{ $message->content }}' id='input{{$message->id}}'>
                        <input type="hidden" name="messageId" value="{{$message->id}}">
                        <br>
                        <br>
                        <button id='button{{$message->id}}' type='submit' class='input_edit' value='Submit'>Submit</button>
                    </form>
                </div>
                @else
                <div class='container_message darker'>
                    <p>{{$message->content}}</p>
                </div>
                @endif
                @endforeach
            </div>
            <div class="container">
                <form action="/user/message/create" method="POST">
                    @csrf
                    <label for="subject">Message</label>
                    <input type="hidden" name="toUserId" id="toUserId" value="{{ $toUserId }}">
                    <textarea type="text" id="content" name="content" placeholder="Write something.." style="height:100px"></textarea>
                    <input type="submit" value="Submit">
                </form>
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