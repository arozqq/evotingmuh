@extends('layouts.admin-master')
@section('content')
        <h3 class="text-white mb-3">Setting</h3>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Konfigurasi Awal</div>
                <div class="card-body">
                  <form action="{{route('setting.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        @foreach ($data as $item)
                        <div class="col-md-4 col-12 mb-2">
                            <label for="site_title" class="mb-2">Judul Situs</label>
                            <input type="text" name="site_title" id="site_title" class="form-control @error('site_title') is-invalid @enderror" value="{{old('site_title') ?? $item->site_title}}">
                        </div>
                        <div class="col-md-4 col-12 mb-2">
                            <label for="min_pilih" class="mb-2">Miminal Pilihan</label>
                            <input type="text" name="min_pilih" id="min_pilih" class="form-control @error('min_pilih') is-invalid @enderror" value="{{old('min_pilih') ?? $item->min_pilih}}">
                        </div>
                        <div class="col-md-4 col-12 mb-2">
                            <label for="max_pilih" class="mb-2">Maksimal Pilihan</label>
                            <input type="text" name="max_pilih" id="max_pilih" class="form-control @error('max_pilih') is-invalid @enderror" value="{{old('max_pilih') ?? $item->max_pilih}}">
                        </div>
                        <div class="col-md-4 col-12 mb-2">
                            <label for="login_page_title" class="mb-2">Judul Halaman Login</label>
                            <input type="text" name="login_page_title" id="login_page_title" class="form-control @error('login_page_title') is-invalid @enderror" value="{{old('login_page_title') ?? $item->login_page_title}}">
                        </div>
                        <div class="col-md-4 col-12 mb-2">
                            <label for="header_title" class="mb-2">Judul Beranda</label>
                            <input type="text" name="header_title" id="header_title" class="form-control @error('header_title') is-invalid @enderror" value="{{old('header_title') ?? $item->header_title}}">
                        </div>
                        <div class="col-md-4 col-12 mb-2">
                            <label for="sub_title" class="mb-2">Judul Beranda</label>
                            <textarea type="text" name="sub_title" id="sub_title" class="form-control @error('sub_title') is-invalid @enderror">{{old('sub_title') ?? $item->sub_title}}</textarea>
                        </div>
                        <div class="col-md-4 col-12 mb-2">
                            <label for="logo_login_page" class="mb-2">Logo Halaman Login</label>
                            <input type="file" name="logo_login_page" id="logo_login_page" class="form-select @error('logo_login_page') is-invalid @enderror" value="{{old('logo_login_page')}}">
                            {{-- <input id="hidden_foto" type="hidden" name="hidden_foto"> --}}
                        </div>
                        @endforeach
                       
                    </div>  
                    <div class="col-md-4 col-12 mb-2">
                        <button type="submit" class="btn btn-primary px-3" style="margin-top: 30px">Save</button>                   
                    </div>
                  </form>
                </div>
            </div>
        </div>
   

  @push('after-script')
     <script>
        console.log("sayang")
     </script>
  @endpush  
@endsection