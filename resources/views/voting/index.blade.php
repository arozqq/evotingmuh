@extends('layouts.admin-master')
@section('content')
<h3 class="text-white mb-3">Voting</h3>
<div class="col-lg-12">
  <div class="alert alert-info alert-dismissible fade show" role="alert">
    @foreach ($konfig_pilih as $item)
    <strong>Petunjuk :</strong> Jumlah formatur yang harus dipilih adalah <strong>{{$item->min_pilih}}</strong> Kandidat. dari <strong>{{$total}}</strong> Kandidat.
    @endforeach
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
    <div class="card p-3">  
      <div class="card-header p-3 mb-3">
          <div class="row">
            <div class="col-md-6 col-12">
              <h5>Silahkan Tentukan Beberapa Pilihan Anda !</h5>
            </div>
            <div class="col-md-6 col-12">
              <h5 class="count-check">Total dipilih : 0</h5>
            </div>
          </div>
        </div>
        <form action="/voting/store" method="POST">
          @csrf  
            <div class="card-body row">
            @foreach ($kandidat as $kd)
            <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-5">
                <div class="card shadow"> 
                  @if ($kd->foto_kandidat === NULL)
                  <img src="{{asset('foto/default.png')}}" class="img-fluid" alt="foto kandidat" style="max-height: 300px">
                  @else 
                    <img src="{{$kd->foto_kandidat}}" class="img-fluid" alt="foto kandidat"  style="max-height: 300px;">
                  @endif  
                    <div class="card-body">
                        <h5 class="card-title mb-2">{{$kd->nama_kandidat}}</h5>
                        <p>Jabatan : {{$kd->jabatan}}</p>
                      
                        <div class="form-check">
                            <input class="form-check-input cek-suara" type="checkbox" name="votes[]" value="{{$kd->id}}" id="vote-{{$kd->id}}">
                            <label class="form-check-label" for="vote-{{$kd->id}}">
                              Beri Suara
                            </label>
                          </div>
                    </div>
                  </div>
            </div>
            @endforeach
            </div>
            <div class="row p-3">
              <div class="col-md-6 col-12 mt-2">
                <button type="submit" class="btn btn-sm btn-primary">Kirim Pilihan</button>
              </div>
              <div class="col-md-6 col-12 mt-3">
                <h5 class="count-check">Total dipilih : 0</h5>
              </div>
            </div>
        </form>
    </div>
</div>


  @push('after-script')
      <script>
        var checkboxes = document.querySelectorAll('.cek-suara');
        // Menambahkan event listener untuk setiap checkbox
        checkboxes.forEach(function(checkbox) {
          checkbox.addEventListener('change', updateCount);
        });

        // Fungsi untuk mengupdate jumlah checkbox tercentang
        function updateCount() {
          var checkedCount = 0;

          // Menghitung jumlah checkbox yang tercentang
          checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
              $('.count-check').html('Total dipilih : ' + ++checkedCount)
            }
          });
        }
       
      </script>
  @endpush  
@endsection