<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"/>
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ADD8E6",
                        },
                    },
                },
            };
        </script>
        <title>Marketplace</title>
    </head>
    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4">
            <a href="/"><img class="w-60" src="{{asset('images/logo1.png')}}" alt="" class="logo"/></a>
            <ul class="flex space-x-6 mr-6 text-lg">
                @auth
                <li>
                    <span class="font-bold uppercase">
                        {{auth()->user()->name}}
                    </span>
                </li>
                <li>
                    <a href="/products/manage" class="hover:text-laravel"><i class="fa-solid fa-gear"></i>@lang('messages.manage')</a>
                </li>
                    <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button><i class="fa-solid fa-door-closed">@lang('messages.logout')</i></button>
                    </form>
                @else
                <li>
                    <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> @lang('messages.register')</a>
                </li>
                <li>
                    <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>@lang('messages.login')</a>
                </li>
                @endauth
                <a href="{{ url('change-language/lv') }}">LV</a>
                <a href="{{ url('change-language/en') }}">EN</a>
            </ul>
        </nav>
        <main>
    @yield('content')
        </main>
        <x-flash-message/>
    </body>
</html>