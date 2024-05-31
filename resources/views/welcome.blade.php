
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <title>{{ env('APP_NAME') }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="shortcut icon" href="assets/images/logo-square.png" type="image/png">
    <link rel="icon" href="assets/images/logo-square.png" type="image/png">

    <link rel="stylesheet" href="../../cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">


</head>

<body>
    <div class="overlay-mask"></div>
    <div class="main-wrapper ">
        <div class="main-content container-fluid h-100 bg-primary">
            <div class="row h-100">
                <div class="col-10 col-sm-8 col-md-6 col-lg-4 col-xl-3 m-auto px-3 pt-5 pb-4 card shadow m-3">
                    <img src="assets/images/logo-square.png" height="50" alt="Moss Logo" class="logo justify-content-center d-flex mx-auto mb-3">
                    <form    method="POST" action="{{ route('login') }}" class="p-3" >
                        @csrf
                       <div class="form-group">
                           <input  type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                           @error('email')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                       </div>
                       <div class="form-group mt-2">
                           <input type="password" id="password" class="form-control @error('password') is-invalid   @enderror"  placeholder="Mot de passe" name="password" required >
                           @error('password')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                          @enderror
                       </div>
                       <div class="form-group form-check">
                           <input type="checkbox" class="form-check-input" id="showPassword">
                           <label class="form-check-label" for="exampleCheck1">Voir le mot de passe</label>
                       </div>

                       <button class="btn btn-primary btn-block my-4">
                           Connectez-vous
                       </button>
                       <hr style="padding-top: 8px">
                       <a href="https://digital-services-home.com/" style="color: black" class="d-block text-center">@ DIGITAL SERVCICES</a>
                   </form>
                </div>
            </div>
        </div>
    </div>



    <script src="assets/js/vendor.bundle.js"></script>


    <script src="assets/js/app.bundle.js"></script>


</body>


<!-- Mirrored from htmlthemes.gitlab.io/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Dec 2023 15:11:23 GMT -->
</html>
