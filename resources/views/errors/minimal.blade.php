<html>
<head>
<title>@yield('title')</title>
<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="{{asset('admin/')}}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="{{asset('admin/')}}/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

<!-- Customized Bootstrap Stylesheet -->
<link href="{{asset('admin/')}}/css/bootstrap.min.css" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="{{asset('admin/')}}/css/style.css" rel="stylesheet">
</head>

    <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0">
        <div class="col-md-6 text-center p-4">
            <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
            <h1 class="display-1 fw-bold">@yield('code')</h1>
            <h1 class="mb-4">@yield('message','Sayfaya ulaşamadık')</h1>
            <p class="mb-4">Galiba yanlış sayfaya geldin veya bu sayfa eskiden kullanılıyordu ha?</p>
            <a class="btn btn-primary rounded-pill py-3 px-5" href="{{route('dashboard')}}">Anasayfaya dön</a>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('admin/')}}/lib/chart/chart.min.js"></script>
<script src="{{asset('admin/')}}/lib/easing/easing.min.js"></script>
<script src="{{asset('admin/')}}/lib/waypoints/waypoints.min.js"></script>
<script src="{{asset('admin/')}}/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="{{asset('admin/')}}/lib/tempusdominus/js/moment.min.js"></script>
<script src="{{asset('admin/')}}/lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="{{asset('admin/')}}/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Template Javascript -->
<script src="{{asset('admin/')}}/js/main.js"></script>

</body>
</html>