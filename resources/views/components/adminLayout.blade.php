<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ePurveyors - Administrator</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-300">
    <div class="flex flex-col">
        <!--Navbar area-->
        <nav class="flex justify-between p-4 bg-white">
            <h1>
                <a href="{{ route('admin.index') }}">ePurveyors - Admin</a>
            </h1>
            <ul class="flex space-x-3">
                <li>
                    <a href="#">Customers</a>
                </li>
                <li>
                    <a href="{{route('admin.islands')}}">Islands</a>
                </li>
                <li>
                    <a href="#">Administrators</a>
                </li>
                <li>
                    <a href="#">Logout</a>
                </li>
            </ul>
        </nav>
        <!-- end of navbar area -->

        <!-- content area -->
        {{ $slot }}
    </div>
</body>
</html>