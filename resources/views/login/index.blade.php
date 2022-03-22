<x-layout>
    @if (session('status'))
        {{ session('status') }}
        {{ session('message') }}
    @endif
    @if ($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="/login" method="post" style="display:flex;flex-direction: column;row-gap: 20px;width:200px;margin-bottom: 40px;">
        @csrf
        <input type="email" name="email" placeholder="Adres e-mail">
        <input type="password" name="password" placeholder="Hasło">
        <button type="submit">Zaloguj się</button>
    </form>
    <a href="{{ route('index') }}">Powrót na stronę główną</a>
</x-layout>
