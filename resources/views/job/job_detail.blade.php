<html lang="en">

<head>
    <title>
        Page Title
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/job_detail.css') }}" rel="stylesheet">
</head>

<body>
    @include("header")
    @include("navbar")

    <div class="row">
        @include("side")
        <div class="main">
          @includeWhen(session('type') === 1, "job.job_table")

            <h2>Job detail</h2>
            <div class="container">
                <label for="Name"><b>Job name</b></label>
                <p name="jobName" id="name">{{$job->jobName}}</p>

                <label for="Name"><b>File job</b></label>
                <br>
                <br>
                <a href="/job/download/{{$job->id}}" download >Download</a>
                <br>
                <br>
            </div>
            @if (session('type') === 0) 
                @includeWhen( $currentUserFile != null, "job.has_submit_job")
                @includeWhen( $currentUserFile == null, "job.submit_job")
            @endif 
        </div>
    </div>
    <div class="footer">
        <h2>
            Footer
        </h2>
    </div>
</body>

</html>