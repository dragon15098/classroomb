<!doctype html>
<html lang="en">

<div class="navbar">
    <a href="/user">Home</a> 
    <a href="/job">Job</a> 
    <a href="/challenge">Challange</a> 
    <a style="float: right; " href="/login">Log out</a>    
    <a style="float: right; " href="/change_password/{{session('userId')}}">Change Password</a> 
    <a style="float: right; " href="/user/detail/{{session('userId')}}">Update profile</a> 
    
</div>


</html>