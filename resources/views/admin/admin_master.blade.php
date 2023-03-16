<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard | Abogados Díaz</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('backend/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('backend/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/datatable-bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/datatable-buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/datatable-responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <!-- banpro CSS files -->
    <link rel="stylesheet" href="{{ asset('backend/assets/BCSS/search-form.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/BCSS/search.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/BCSS/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/BCSS/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/BCSS/aos2.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/BCSS/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/BCSS/lightcase.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/BCSS/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/BCSS/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/BCSS/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/BCSS/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/BCSS/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/BCSS/styles.css') }}">
    <link rel="stylesheet" id="color" href="{{ asset('backend/assets/BCSS/colors/dark-gray.css') }}">

    <!-- AdminLTE DT CSS files -->
    <link rel="stylesheet" href="{{ asset('backend/assets/BDT/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/assets/BDT/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/BDT/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <!-- ARCHIVES JS -->
    <script src="{{ asset('backend/assets/BJS/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('backend/assets/BJS/rangeSlider.js') }}"></script>
    <script src="{{ asset('backend/assets/BJS/tether.min.js') }}"></script>
    <script src="{{ asset('backend/assets/BJS/moment.js') }}"></script>
    <script src="{{ asset('backend/assets/BJS/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/assets/BJS/mmenu.min.js') }}"></script>
    <script src="{{ asset('backend/assets/BJS/mmenu.js') }}"></script>
    <script src="{{ asset('backend/assets/BJS/aos.js') }}"></script>
    <script src="{{ asset('backend/assets/BJS/aos2.js') }}"></script>
    <script src="{{ asset('backend/assets/BJS/slick.min.js') }}"></script>
    <script src="{{ asset('backend/assets/BJS/fitvids.js') }}"></script>
    <script src="{{ asset('backend/assets/BJS/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('backend/assets/BJS/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('backend/assets/BJS/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('backend/assets/BJS/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('backend/assets/BJS/smooth-scroll.min.js') }}"></script>
    <script src="{{ asset('backend/assets/BJS/lightcase.js') }}"></script>
    <script src="{{ asset('backend/assets/BJS/search.js') }}"></script>
    <script src="{{ asset('backend/assets/BJS/owl.carousel.js') }}"></script>
    <script src="{{ asset('backend/assets/BJS/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('backend/assets/BJS/ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('backend/assets/BJS/newsletter.js') }}"></script>
    <script src="{{ asset('backend/assets/BJS/jquery.form.js') }}"></script>
    <script src="{{ asset('backend/assets/BJS/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('backend/assets/BJS/searched.js') }}"></script>
    <script src="{{ asset('backend/assets/BJS/forms-2.js') }}"></script>
    <script src="{{ asset('backend/assets/BJS/range.js') }}"></script>
    <script src="{{ asset('backend/assets/BJS/color-switcher.js') }}"></script>
    <!-- MAIN JS -->
    <script src="{{ asset('backend/assets/BJS/script.js') }}"></script>


    <!-- Template Main CSS File -->
    <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    @include('admin.body.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('admin.body.sidebar')
    <!-- End Sidebar-->

    <main id="main" class="main">
        <section class="section dashboard">
            @yield('admin')
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('admin.body.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('backend/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('backend\assets\js\jquerydatatable.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('backend/assets/js/main.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Template Main JS File -->

    <!-- AdminLTE DT JS Files -->
    <script src="{{ asset('backend/assets/BDT/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/BDT/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/BDT/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/assets/BDT/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/BDT/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/assets/BDT/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/BDT/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/assets/BDT/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/assets/BDT/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/assets/BDT/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/assets/BDT/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/assets/BDT/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- banpro js File -->
    <script>
        $('.slick-lancers').slick({
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: true,
            arrows: false,
            adaptiveHeight: true,
            responsive: [{
                breakpoint: 1292,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    dots: true,
                    arrows: false
                }
            }, {
                breakpoint: 993,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true,
                    arrows: false
                }
            }, {
                breakpoint: 769,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true,
                    arrows: false
                }
            }]
        });
    </script>

    <script>
        $(".dropdown-filter").on('click', function() {

            $(".explore__form-checkbox-list").toggleClass("filter-block");

        });
    </script>

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {
            $(document).on('click', "#delete", function(e) {
                e.preventDefault();
                var link = $(this).attr("href");
                Swal.fire({
                    title: 'Estás Seguro?',
                    text: "Esta Acción no se puede anular!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, Eliminar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link;
                        Swal.fire(
                            'Deleted!',
                            'Your data has been deleted.',
                            'success'
                        )
                    }
                })
            })
        })
    </script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

</body>

</html>
