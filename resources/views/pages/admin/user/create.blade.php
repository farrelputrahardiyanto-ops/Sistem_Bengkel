<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card rounded border-0 shadow">
                    <div class="card-head">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="text-center my-2">User</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('user.store')}}" method="post">

                            <div class="form-group mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">No Whatsapp</label>
                                <input type="text" name="no_whatsapp" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control">
                            </div>

                            <div class="row">
                                <div class="col-md-4 ">          
                                </div>
                                <div class="col-md-4 d-flex align-items-center justify-center">
                                     <button class="btn btn-md btn-primary">Submit</button>
                                </div>
                                <div class="col-md-4 "></div>
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p style="color:red;">{{ $error }}</p>
        @endforeach
    </div>
@endif
</body>
</html>