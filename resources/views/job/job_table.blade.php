<span style="font-size:20px">
    List user submit
</span>

<table border='1'>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Action</th>
    </tr>
    @foreach ($userJobFiles as $userFile)
    <tr>
        <td> {{$userFile->id}}</td>
        <td>{{$userFile->id}}</td>
        <td>
            <a href='/user_file/download/{{$job->id}}/{{$userFile->userId}}' download class='button button_action'>Download</a>
        </td>
    </tr>
    @endforeach

</table>