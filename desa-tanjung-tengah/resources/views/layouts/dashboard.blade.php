```php
<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="utf-8">

<title>SID Tanjung Tengah</title>

<meta name="viewport"
      content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<style>

body{
    background:#f4f6f9;
}

.sidebar{
    min-height:100vh;
    background:#198754;
}

.sidebar a{
    color:white;
    text-decoration:none;
    display:block;
    padding:12px;
    border-radius:10px;
}

.sidebar a:hover{
    background:rgba(255,255,255,.2);
}

.stat-card{
    border:none;
    border-radius:15px;
}

</style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-success shadow">

<div class="container-fluid">

<a class="navbar-brand fw-bold" href="#">
    SID Tanjung Tengah
</a>

<div class="ms-auto text-white">

    {{ Auth::user()->name }}

</div>

</div>

</nav>

<div class="container-fluid">

<div class="row">

<div class="col-md-2 sidebar p-3">

<h5 class="text-white mb-4">

<i class="bi bi-building"></i>
Menu

</h5>

<a href="#">
<i class="bi bi-speedometer2"></i>
Dashboard
</a>

<a href="#">
<i class="bi bi-houses"></i>
Infrastruktur
</a>

<a href="#">
<i class="bi bi-cash-stack"></i>
APBDes
</a>

<a href="#">
<i class="bi bi-file-earmark-text"></i>
Laporan
</a>


<a href="#">
<i class="bi bi-people"></i>
Pengguna
</a>

<hr class="text-white">

<a href="{{ route('logout') }}"
   onclick="event.preventDefault();
   document.getElementById('logout-form').submit();">

<i class="bi bi-box-arrow-right"></i>
Logout

</a>

<form id="logout-form"
      action="{{ route('logout') }}"
      method="POST">
      @csrf
</form>

</div>

<div class="col-md-10 p-4">

@yield('content')

</div>

</div>

</div>

<footer class="bg-white text-center p-3 shadow-sm">

© {{ date('Y') }}
Pemerintah Desa Tanjung Tengah

</footer>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

@stack('scripts')

</body>

</html>
```
