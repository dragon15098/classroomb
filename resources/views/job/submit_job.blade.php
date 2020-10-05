<h2>Submit your file</h2>
<form method="post" enctype="multipart/form-data">
    @csrf

    <div class="container">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="hidden" name="jobId" id="jobId" value="{{$job->id}}">
        <input type="hidden" name="action" id="action" value="submit">
    </div>
    <button method="POST" formaction="/job/submit" type="submit" style="float: right;" class="btn btn_action">Submit</button>
</form>