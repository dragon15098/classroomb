<html lang="en">

<head>
    <title>
        Page Title
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/add_job.css') }}" rel="stylesheet">
</head>

<body>
    @include('header')
    @include('navbar')

    <div class="row">
        @include('side')
        <div class="main">
            <form action="add_job" method="post" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <h1>Job detail</h1>
                    <hr>

                    <label for="Name"><b>Job name</b></label>
                    <input type="text" placeholder="Job name" name="jobName" id="jobName">
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    
                    <button method="POST" formaction="/job/create" type="submit" style="float: right;" class="btn btn_action">Create job</button>
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