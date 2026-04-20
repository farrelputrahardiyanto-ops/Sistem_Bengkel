<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/style.css')}}">
   <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</head>
<body>

    <div class="container shadow rounded my-5">
        <div class="row">
            <div class="col-md-4"> <img src="{{ asset('/storage/public/user/'.$user->image) }}" style="width: 30px; height: 30px" alt="profile picture" class="rounded"> </div>
            <div class="col-md-8">
                <div class="card border-0">
                    <div class="card-head">
                        <h1 class="my-2">
                            {{ $user->name}}
                        </h1>
                    </div>
                    <div class="card-body">
                        <p>Email : {{ $user->email}}</p>
                        <p>No Whatsapp : {{ $user->no_whatsapp}}</p>
                        <p>Role : {{ $user->role}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>