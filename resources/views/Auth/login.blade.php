<!DOCTYPE html>
<html lang="en">


<head>
    <!--  Title -->
    <title>Mordenize</title>
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--  Favicon -->
    <link rel="shortcut icon" type="image/png"
        href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico" />
    <!-- Core Css -->
    <script src="{{ asset('assets/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <style>
        body {
            overflow-y: hidden;
        }
    </style>
    <link rel="stylesheet" href="{{asset('assets/dist/css/app.css')}}">
    <link id="themeColors" rel="stylesheet" href="{{ asset('assets/dist/css/style.min.css') }}" />
</head>

<body>

    <!-- Preloader -->
    <div class="preloader">
        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!-- Preloader -->
    <div class="preloader">
        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100">
            <div class="position-relative z-index-5">
                <div class="row">
                    <div class="col-xl-7 col-xxl-8">
                        <a href="index-2.html" class="text-nowrap logo-img d-block px-4 py-9 w-100">
                            <img src="{{ asset('flat only logo .png') }}" width="8%" alt="">
                        </a>
                        <div class="d-none d-xl-flex align-items-center justify-content-center"
                            style="height: calc(100vh - 80px);">
                            <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/login-security.svg"
                                alt="" class="img-fluid" width="500">
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-4">
                        <div
                            class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                            <div class="col-sm-8 col-md-6 col-xl-9">
                                <h2 class="mb-3 fs-7 fw-bolder">Selamat Datang di MISCHOOL</h2>
                                <form id="form-login">
                                    <div class="mb-3">
                                        <label for="email"  class="form-label">Email</label>
                                        <input type="email"  class="form-control" name="email" id="email"
                                            aria-describedby="emailHelp">
                                        <ul class="error-text">
                                        </ul>
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="password">
                                        <ul class="error-text">
                                        </ul>
                                    </div>
                                    <div id="failed-login" class="text-center error-text mb-3"></div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <a class="text-primary fw-medium"
                                            href="authentication-forgot-password.html">Forgot Password ?</a>
                                    </div>
                                    <button type="submit"
                                        class="btn btn-primary w-100 py-8 mb-4 rounded-2">Masuk</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-medium">Tidak punya akun?</p>
                                        <a class="text-primary fw-medium ms-2" href="/register">Buat Akun</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="{{ asset('assets/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <!--  core files -->
    <script>
        $(document).ready(function(){
            const token = localStorage.getItem('token')
            $.ajax({
                url:"{{config('app.api_url')}}/user",
                type:'GET',
                headers:{
                'Accept': 'application/json',
                'Authorization': 'Bearer '+token,
                },
                dataType: "JSON",
                success:function(response){
                    window.location.href = "{{route('dashboard.index')}}"
                },
                error:function(err){
                    $('.preloader').fadeOut()
                }
            })

            $('#form-login').submit(function(e){
                e.preventDefault();
                $.ajax({
                    url:"{{config('app.api_url')}}/login",
                    type:"POST",
                    header:{
                        'Accept': 'application/json',
                    },
                    data: $(this).serialize(),
                    success:function(response){
                        localStorage.setItem('token',response.data)
                        window.location.href = "{{route('dashboard.index')}}"
                    },
                    error:function(response){
                        var response = response.responseJSON
                        var status = response.meta.code
                        if(status == 422){
                            handleValidate(response.data)
                        }else if(status == 401){
                            $('#failed-login').html(response.meta.message)
                        }else{
                            $('#failed-login').html('Error tidak diketahui')
                        }
                        
                    }
                })
            })
        })

        function handleValidate(messages){
            const keys = Object.keys(messages);
            for (const key of keys) {
                const text = messages[key];
                var ErrorList = $('<li>').text(text[0])
                let inputElement =  $(`#${key}`)
                inputElement.addClass('error')
                inputElement.next('ul').prepend(ErrorList)
            }

            $('.error').change(function(){
                $(this).removeClass('error')
                $(this).next('ul').html('')
            })
        }
    </script>
</body>

</html>