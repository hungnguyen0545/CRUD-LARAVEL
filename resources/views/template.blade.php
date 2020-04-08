<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('/css/template.css') }}" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    @stack('styles')
</head>

<body>
    <nav class="header navbar navbar-expand-lg navbar-light bg-success">
        <a class="navbar-brand text-light header-title" href="{{ route('student.index')}}">Student Management </a>
    </nav>
    <div class="container-fluid flex-center">
        @yield('content')
    </div>
</body>
<script>
    $(document).ready(function() {
        $('.alert').fadeOut(2000);

        $('.btn-delete').on('click', function() {
            if (confirm('Bạn có chắc chắn muốn xoá thông tin này ?')) {
                return true;
            } else {
                return false;
            }
        })
    })
</script>
@yield('script')

</html>