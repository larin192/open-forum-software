<x-layout>
    <form action="/register" method="post">
        @csrf
        <input type="email" name="email" placeholder="Adres e-mail">
        <input type="text" name="login" placeholder="Login">
        <input type="password" name="password" placeholder="Hasło">
        <button type="submit">Zarejestruj</button>
    </form>
</x-layout>
