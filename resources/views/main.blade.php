<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel app/ Ferratum</title>
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"
                integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
        </script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body class="container">
    @if($errors->any())
        @foreach($errors as $e)
            <p class="alert-danger">{{$e}}</p>
        @endforeach
    @endif

    @foreach ($users as $user)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$user->name}}</h5>
                <p class="card-text">Email: {{$user->email}}</p>
                <p class="card-text">Phone: {{$user->phone}}</p>
                <p class="card-text">Created: {{$user->created_at}}</p>
                <button class="card-link" id="delUser" value="{{$user->id}}">Delete</button>
            </div>
        </div>
    @endforeach
    </body>
    <script>
        $('#delUser').on('click', function () {
            confirm('Are you sure that you want to delete user?');
            let id = $('#delUser').val();
            $.ajax({
                type: "DELETE",
                url: "/api/user/delete/" + id,
                success: function(){
                   window.location.href = '/';
                },
                error: function (response) {
                    alert(response.message);
                }
            });
            return false;
        });
    </script>
</html>
