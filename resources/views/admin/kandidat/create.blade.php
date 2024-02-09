@extends('layouts.admin-master')
@section('content')
        <h3 class="text-white mb-3">Management Kandidat</h3>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-secondary-gradient pt-2">Tambah Kandidat</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('management-kandidat.store')}}" name="kandidatForm"  method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-4 col-12 mb-2">
                                <label for="nama_kandidat" class="mb-2">Nama Kandidat</label>
                                <input type="text" name="nama_kandidat" id="nama_kandidat" class="form-control @error('nama_kandidat') is-invalid @enderror" value="{{old('nama_kandidat')}}">
                            </div>
                             <div class="col-md-4 col-12 mb-2">
                                <label for="jabatan" class="mb-2">Jabatan</label>
                                <input type="text" name="jabatan" id="jabatan" class="form-control @error('jabatan') is-invalid @enderror" value="{{old('jabatan')}}">
                            </div>
                            <div class="col-md-4 col-12 mb-2">
                                <label for="nbm" class="mb-2">NBM</label>
                                <input type="text" name="nbm" id="nbm" class="form-control @error('nbm') is-invalid @enderror" value="{{old('nbm')}}">
                            </div>
                            <div class="col-md-4 col-12 mb-2">
                                <label for="foto_kandidat" class="mb-2">Foto</label>
                                <input type="file" name="foto_kandidat" id="foto_kandidat" class="form-select @error('foto_kandidat') is-invalid @enderror" value="{{old('foto_kandidat')}}">
                                <input id="hidden_foto" type="hidden" name="hidden_foto">
                            </div>
                        </div>   

                        <div class="form-group row">
                            <div class="col-md-4 col-12 mb-2">
                                <label for="tempat_lahir" class="mb-2">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{old('tempat_lahir')}}">
                            </div>
                            <div class="col-md-4 col-12 mb-2">
                                <label for="tanggal_lahir" class="mb-2">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror">
                            </div>
                        </div>   
                        
                        <div class="form-group row">
                            <div class="col-md-6 col-12 mb-2">
                                <label for="visi" class="mb-2">Visi</label>
                                <textarea name="visi" id="visi" class="form-control @error('visi') is-invalid @enderror" value="{{old('visi')}}"></textarea>
                                {{-- <input type="text" name="visi" id="visi"> --}}
                            </div>
                            <div class="col-md-6 col-12 mb-2">
                                <label for="misi" class="mb-2">Misi</label>
                                <textarea name="misi" id="misi" class="form-control @error('misi') is-invalid @enderror" value="{{old('misi')}}"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-12 mb-2">
                                <label for="status" class="mb-2">Status</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                    <a class="btn btn-secondary"  href="{{route('management-kandidat.index')}}">Kembali</a>
                    <button type="submit" class="btn btn-primary mx-2" name="btn-save">Simpan</button>
                    </div>
                    </form>
                   
                </div>
            </div>
        </div>
@endsection