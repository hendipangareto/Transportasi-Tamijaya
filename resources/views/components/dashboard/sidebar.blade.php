<!-- Dashboard Sidebar -->
<aside class="left-sidebar sticky-top">
    {{-- <img src="public/img/Logo.png" class="logo-sidebar" alt="Logo Sidebar"> --}}
    <ul>
        <li>
            <a href="{{ route('information') }}" @if (Route::is('information')) class="active" @endif>
                <ion-icon name="person-outline" class="icon"></ion-icon>
                Informasi
            </a>
        </li>
        <li>
            <a href="{{ route('general') }}" @if (Route::is('general')) class="active" @endif>
                <ion-icon name="folder-open-outline" class="icon"></ion-icon>
                General
            </a>
        </li>
        <li>
            <a href="{{ route('account-password') }}" @if (Route::is('account-password')) class="active" @endif>
                <ion-icon name="lock-closed-outline" class="icon"></ion-icon>
                Ubah Password
            </a>
        </li>
        <li>
            <a href="{{ route('transaction') }}" @if (Route::is('transaction')) class="active" @endif>
                <ion-icon name="cart-outline" class="icon"></ion-icon>
                Transaksi
            </a>
        </li>
        <li>
            <a href="{{ route('inbox') }}" @if (Route::is('inbox')) class="active" @endif>
                <ion-icon name="mail-unread-outline" class="icon"></ion-icon>
                Pesan
            </a>
        </li>
        <li>
            <a href="{{ route('home') }}">
                <ion-icon name="log-out-outline" class="icon"></ion-icon>
                Keluar
            </a>
        </li>
    </ul>
</aside> 

