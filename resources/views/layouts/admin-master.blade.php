@include('layouts.partials.header')
<div class="container-xxl position-relative p-0">
    @include('layouts.partials.navbar')
    
    <div class="container-xxl konten-section">
        <div class="row px-2">
            <x-alert></x-alert>
            @yield('content')
        </div>
    </div>
</div>
@include('layouts.partials.footer')