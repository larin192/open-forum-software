<x-layout type="login-page">
    <section class="login-wrapper">
        <div class="credentials">
            <form class="form-control" action="/login" method="post">
                @csrf
                <input type="email" name="email" placeholder="Adres e-mail">
                <input type="password" name="password" placeholder="Hasło">
                <button type="submit">Zaloguj się</button>
            </form>
            <a href="{{ route('index') }}">Powrót na stronę główną</a>
        </div>
        <div class="info">
            Lorem ipsum dolor <span>sit amet.</span>
        </div>
    </section>
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
</x-layout>
