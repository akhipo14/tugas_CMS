<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
  </head>
    <body>
        <form action="/login" method="post">
            @csrf
            <div class="pembungkus-card-login">
                @if (Session::has('success'))
                <div class="alert alert-success mt-3" role="alert">
                    <i class="fa-solid fa-circle-check"></i> {{Session::get('success')}} 
                </div>
                @endif

                @if (Session::has('error'))
                    <div class="alert alert-danger mt-3" role="alert">
                        <i class="fa-solid fa-circle-check"></i> {{Session::get('error')}} 
                    </div>
                @endif
                <div class="card-login">
            
                    <div class="judul-login">
                        <h3>Sign In</h3>
                    </div>
                    @if (Session::Has('errorLogin'))
                    <div class="alert alert-danger mt-3" role="alert">
                        <i class="fa-solid fa-circle-exclamation"></i> {{Session::get('errorLogin')}} 
                    </div>
                    @endif
                    <div class="isi-login">
                        @error('username')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <input type="text" name="username" placeholder="username" class="@error('username') is-invalid @enderror" 
                        value="{{old('username')}}" >
                        @error('password')
                        <div class="text-danger">
                        {{$message}}
                        </div>
                        @enderror
                        <input type="password" name="password" placeholder="password" 
                        class="@error('password') is-invalid @enderror" >
                        <button type="submit">Sign In</button>
                        <div class="bantuan">
                            <p>Dont have account ? <a href="/register">Sign Up</a> </p>
                            <a href="">Forgot Password</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    </body>
</html>
