<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('/css/template.css') }}" rel="stylesheet" type="text/css">
    @stack('styles')
</head>

<body>
    <nav class="header navbar navbar-expand-lg navbar-light bg-success">
        <a class="navbar-brand text-light header-title" href="{{ route('student.index')}}">Student Management </a>
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <div class="container-fluid flex-center">
        @yield('content')
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
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