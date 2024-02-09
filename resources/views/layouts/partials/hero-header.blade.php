<div class="container-xxl bg-primary hero-header"  style="">
    <div class="container px-lg-5">
        <div class="row g-5">
            <div class="col-lg-9 text-center text-lg-start">
            @php
                $setting = App\Models\Setting::get();
            @endphp
            @foreach ($setting as $item)
            <h1 class="text-white mb-4 animated slideInDown">{{ $item->header_title ?? 'Menggerakkan Dakwah dan Pembangunan Menuju Pondok Cabe Udik Berkemajuan.' }}</h1>
            <p class="text-white pb-3 animated slideInDown">{{ $item->sub_title ?? 'Elektronik Voting Untuk Ranting ini dibuat untuk mensukseskan Musyawarah Ranting Muhammadiyah & Aisyiyah Pondok Cabe Udik Tahun 2023. Dikembangkan Oleh Majelis Teknologi Informasi dan Komunikasi Pemuda Muhammadiyah Ranting Pondok Cabe Udik.' }} </p>
            @endforeach
            </div>
        </div>
    </div>
</div>