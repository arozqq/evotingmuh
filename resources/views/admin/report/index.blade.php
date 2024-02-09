@extends('layouts.admin-master')
@section('content')
        <h3 class="text-white mb-3">Report</h3>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-secondary-gradient pt-2">Report Perolehan Suara Kandidat</h5>
                </div>
                <div class="card-body">
                  <button class="btn btn-sm btn-danger mb-4 reset-voting">Reset Voting</button>
                    <table class="table table-striped report-datatable">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nama Kandidat</th>
                              <th scope="col">Total Suara</th>
                              <th scope="col">Persentase</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                                $n = 1
                            @endphp
                            @foreach ($items as $item)
                            <tr>
                                <td>{{$n++}}</td>
                                <td>{{$item->nama_kandidat}}</td>
                                <td>{{$item->users_count}}</td>
                                <td>{{number_format(($item->users_count / $total_user) * 100, 2, ',', '.') ?? 0}} % Suara</td>
                            </tr>
                                
                            @endforeach
                          </tbody>
                      </table>
                </div>
            </div>
        </div>
   
  

  @push('after-script')
      <script>
        $(document).ready(function () {  
         $('.report-datatable').DataTable({
              "dom": "<'dt--top-section'<'row'<'col-12 col-sm-4 d-flex justify-content-sm-start justify-content-center mt-sm-0 mt-3'l''><'col-12 col-sm-4 mt-sm-0 mt-3 d-flex justify-content-sm-center justify-content-center'B''><'col-12 col-sm-4 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f'>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center mt-3'<'dt--pages-count mb-sm-0 mb-3'i><'dt--pagination'p>>",  
            "oLanguage": {
          "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },   "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
           "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 10,
          });
        });
        

        $('.reset-voting').click(function(){
          Swal.fire({
              title: 'Apakah kamu yakin ?',
              text: "Pengambilan suara akan di ambil ulang",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#47C363',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya',
              cancelButtonText: 'Batal'
          }).then((result) => {
              if (result.isConfirmed) {
              $.ajax({
                  url: '/reset-voting' ,
                  success: function(response) {
                  Response(response);
                  }
                  })
              }
          });
        });
      </script>
  @endpush  
@endsection