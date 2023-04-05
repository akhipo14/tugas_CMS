<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
  </head>
    <body>
        <form action="/register" method="post">
            @csrf
            <div class="pembungkus-card-login">
                <div class="card-login">
                    <div class="judul-login">
                        <h3>Sign Up</h3>
                    </div>
                    <div class="isi-login">
                        @error('username')
                        <div class="text-danger">
                        {{$message}}</div>
                        @enderror
                        <input type="text" name="username" placeholder="username" class="@error('username') is-invalid @enderror"
                        value="{{old('username')}}">
                        
                        @error('name')
                        <div class="text-danger">
                        {{$message}}</div>
                        @enderror
                        <input type="text" name="name" placeholder="name" class="@error('name') is-invalid @enderror"
                        value="{{old('name')}}">

                        @error('email')
                        <div class="text-danger">
                        {{$message}}</div>
                        @enderror
                        <input type="email" name="email" placeholder="email" class="@error('email') is-invalid @enderror"
                        value="{{old('email')}}">
                        
                        @error('password')
                        <div class="text-danger">
                        {{$message}}</div>
                        @enderror
                        <input type="password" name="password" placeholder="password" class="@error('password') is-invalid @enderror">
                        
                        <button type="submit">Sign In</button>
                        
                        <div class="bantuan">
                            <p>Already Registered ? <a href="/login">Sign In</a> </p>
                        </div>
                    
                    </div>
                </div>
            </div>
        </form>    

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    </body>
</html>
