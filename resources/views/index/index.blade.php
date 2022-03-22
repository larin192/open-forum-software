<x-layout>
    @guest
        Witaj,<br>
        <a href="{{ route('register') }}">Zarejestruj się</a> lub <a href="{{ route('login') }}">przejdź do strony logowania</a>
    @endguest
</x-layout>
