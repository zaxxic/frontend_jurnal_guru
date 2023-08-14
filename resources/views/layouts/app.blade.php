<!DOCTYPE html>
<html lang="en">

<head>
    <!--  Title -->
    <title>Mischool</title>
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
    <link rel="shortcut icon" type="image/png')}}" href="{{ asset('assets/favicon.ico') }}" />
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{ asset('assets/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    <!-- Core Css -->
    <link rel="stylesheet" href="{{ asset('assets/dist/libs/sweetalert2/dist/sweetalert2.min.css') }}">
    <link id="themeColors" rel="stylesheet" href="{{ asset('assets/dist/css/style.min.css') }}" />
    <link id="themeColors" rel="stylesheet" href="{{ asset('assets/dist/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/dist/libs/prismjs/themes/prism-okaidia.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/dist/libs/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/libs/sweetalert2/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/app.css') }}">

    @yield('style')
</head>

<body>
    <!-- Preloader -->
    <!-- <div class="preloader">
        <img src="{{ asset('logo.png') }}" alt="loader" class="lds-ripple img-fluid animate-bounce" />
    </div> -->
    <!-- Preloader -->
    <!-- <div class="preloader">
        <img src="{{ asset('logo.png') }}" alt="loader" class="lds-ripple img-fluid animate-bounce" />
    </div> -->
    <!--  Body Wrapper -->
    <!-- <div class="page-wrapper" id="main-wrapper" data-theme="blue_theme" data-layout="vertical" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed"> -->

    <div class="body-wrapper">
        <!--  Header Start -->
        @include('layouts.header')
        <!--  Header End -->
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    </div>
    <!--  Shopping Cart -->
    @include('layouts.shopping-cart')
    <!--  Mobilenavbar -->
    @include('layouts.mobile-navbar')
    <!--  Search Bar -->
    @include('layouts.search-bar')
    <!--  Customizer -->
    @include('layouts.customiser')
    <!--  Customizer -->
    <!--  Import Js Files -->
    <script src="{{ asset('assets/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <!--  core files -->
    <script src="{{ asset('assets/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/app.init.js') }}"></script>
    <script src="{{ asset('assets/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('assets/dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/dist/js/custom.js') }}"></script>
    <!--  current page js files -->
    <script src="{{ asset('assets/dist/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/dashboard.js') }}"></script>

    <script src="{{ asset('assets/dist/js/custom.js') }}"></script>
    <script src="{{ asset('assets/dist/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('assets/dist/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/forms/form-wizard.js') }}"></script>
    <script src="{{ asset('assets/dist/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/dist/libs/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/dist/libs/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/forms/select2.init.js') }}"></script>
    <script src="{{ asset('assets/dist/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/plugins/repeater-init.js') }}"></script>
    <script src="{{ asset('assets/dist/js/apps/chat.js') }}"></script>
    <script src="{{ asset('assets/dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/widgets-charts.js') }}"></script>
    <script src="{{ asset('assets/dist/js/dashboard5.js') }}"></script>
    <script src="{{ asset('assets/dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/apex-chart/apex.pie.init.js') }}"></script>
    <script>
        const authToken = localStorage.getItem('token')
        $.ajaxSetup({
            headers: {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + authToken,
            }
        });
        getUser()

        function getUser() {
            $.ajax({
                url: "{{ config('app.api_url') }}/user",
                type: 'GET',
                dataType: "JSON",
                success: function(response) {

                    $('.username').html(response.data.name)
                    $('.role').html(response.data.role)
                    $('.email').html(response.data.email)
                    $('.user-profile').attr('src', response.data.photo)
                    $('.preloader').fadeOut();

                },
                error: function(err) {}
            })
        }

        $('#logoutBtn').on('click', function() {
            $.ajax({
                url: "{{ config('app.api_url') }}/logout",
                type: "POST",
                dataType: "JSON",
                success: function(response) {
                    localStorage.removeItem('token');
                    window.location.href =
                        "/login";
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });

        function handleValidate(messages, type) {
            const keys = Object.keys(messages);
            for (const key of keys) {
                const text = messages[key];
                var ErrorList = $('<li>').text(text[0])
                let inputElement = $(`#${type}-${key}`)
                if (!inputElement.is('div')) {
                    inputElement.addClass('error')
                }
                inputElement.next('ul').prepend(ErrorList)
            }
            $('.error').change(function() {
                $(this).removeClass('error')
                $(this).next('ul').html('')
            })
        }



        function emptyForm(formId) {
            const form = $('#' + formId)
            form.find('input').each(function() {
                if ($(this).attr('type') === 'checkbox' || $(this).attr('type') === 'radio') {
                    $(this).prop('checked', false);
                } else if ($(this).attr('type') === 'file') {
                    $(this).val(null);
                } else {
                    $(this).val('');
                }
            });

            form.find('select').prop('selectedIndex', 0);

            form.find('textarea').html('');
        }

        function getDataAttributes(elementId) {
            const dataAttributes = {};
            const element = $('#' + elementId);

            if (element.length === 0) {
                console.error('Element with ID "' + elementId + '" not found.');
                return null;
            }

            $.each(element[0].attributes, function() {
                if (this.name.startsWith('data-')) {
                    const key = this.name.substring(5);
                    const value = this.value;
                    dataAttributes[key] = value;
                }
            });

            console.log(dataAttributes)
            return dataAttributes;
        }

        function setFormValues(formId, values) {
            const form = $('#' + formId);

            for (const key in values) {
                if (values.hasOwnProperty(key)) {
                    const value = values[key];
                    const input = form.find('[name="' + key + '"]');

                    if (input.length > 0) {
                        const type = input.attr('type');
                        if (type === 'radio') {
                            input.filter('[value="' + value + '"]').prop('checked', true);
                        } else if (input.is('select')) {
                            input.val(value);
                        } else {
                            input.val(value);
                        }
                    } else {
                        const textarea = form.find('textarea[name="' + key + '"]');
                        if (textarea.length > 0) {
                            textarea.html(value);
                        }
                    }
                }
            }
        }

        function handleDetail(data) {
            const keys = Object.keys(data);
            for (const key of keys) {
                const text = data[key];
                $('#detail-' + key).html(text)
            }
        }

        $("#inputDate").on("change", function() {
            const inputDateValue = $(this).val();

            const parts = inputDateValue.split("-");
            const year = parts[0];
            const month = parts[1];
            const day = parts[2];

            const formattedDate = `${year}/${month}/${day}`;

            $(this).val(formattedDate);

            console.log($(this).val())
        });

        function showLoading() {
            return `<div class="d-flex justify-content-center " style="margin-top:11rem">
                        <div class="spinner-border my-auto" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>`
        }

        function showNoData(message) {
            if (!message || typeof message !== 'string') {
                message = "Data sedang kosong"; // Pesan default jika message kosong atau bukan string
            }

            return `<div class="d-flex justify-content-center" style="height:16rem">
                <div style="text-align: center" class="my-auto ">
                    <img src="{{ asset('no-data.svg') }}" width="400" height="400"/>
                    <h4 style="margin-left:30px;">${message}</h4>
                </div>
                </div>`;
        }
    </script>


    @yield('script')
</body>

</html>

{{-- <script src="{{ asset('assets/dist/libs/jquery.repeater/jquery.repeater.min.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/dist/js/plugins/repeater-init.js') }}"></script> --}}
