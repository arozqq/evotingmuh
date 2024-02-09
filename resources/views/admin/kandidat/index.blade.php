@extends('layouts.admin-master')
@section('content')
        <h3 class="text-white mb-3">Management Kandidat</h3>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-secondary-gradient pt-2">List Kandidat</h5>
                </div>
                <div class="card-body">
                    <a class="btn btn-sm btn-primary-gradient py-2 mx-2 px-4 d-md-inline-block d-block mb-4" href="{{route('management-kandidat.create')}}">Tambah Kandidat</a>
                    <a class="btn btn-sm btn-outline-danger py-2 px-4 mx-2 d-md-inline-block d-block mb-4" id="deleteall">Delete Selected</a>
                    <table class="table table-striped kandidat-datatable">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th class="text-center">
                                <div class="custom-checkbox custom-control">
                                <input type="checkbox" class="custom-control-input" id="check-all">
                                <label for="check-all" class="custom-control-label">&nbsp;</label>
                                </div>
                             </th>
                              <th scope="col">Nama Kandidat</th>
                              <th scope="col">Jabatan</th>
                              <th scope="col">NBM</th>
                              <th scope="col">Tempat Lahir</th>
                              <th scope="col">Tanggal Lahir</th>
                              <th scope="col">Foto</th>
                              {{-- <th scope="col">Visi</th> --}}
                              {{-- <th scope="col">Misi</th> --}}
                              <!--<th scope="col">Status</th>-->
                              <th scope="col">Created at</th>
                              <th scope="col">Updated at</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                      </table>
                   
                </div>
            </div>
        </div>

  @push('after-script')
      <script>
        $(document).ready(function () {  
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
          
          var table = $('.kandidat-datatable').DataTable({
              processing: true,
              serverSide: true,
              dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            ajax: "{{ route('management-kandidat.index') }}",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data:'checkbox',name:'name', orderable: false, searchable: false},
                  {data: 'nama_kandidat', name: 'nama_kandidat'},
                  {data: 'jabatan', name: 'jabatan'},
                  {data: 'nbm', name: 'nbm'},
                  {data: 'tempat_lahir', name: 'tempat_lahir'},
                  {data: 'tanggal_lahir', name: 'tanggal_lahir'},
                  {data:'foto_kandidat', name:'foto_kandidat',
                    render: function(data, type, full, meta){
                    if(data === null) {
                        return '<p>Belum ada foto</p>';
                        } else {
                            return '<img src="'+data+'" height="50"/>'
                        }
                    },
                    orderable:false
                  },
                //   {data: 'visi', name: 'visi'},
                //   {data: 'misi', name: 'misi'},
                //   {data: 'status', name: 'status'},
                  {data: 'created_at', name: 'created_at'},
                  {data: 'updated_at', name: 'updated_at'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ],
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

            /* Delete User*/
            // sweeralert delete
            $(document).on('click', '#delete-kandidat', function () {
                    let id = $(this).data('id');
                    Swal.fire({
                        title: 'Apakah kamu yakin ?',
                        text: "Data kandidat ini akan dihapus secara permanen !",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#47C363',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                        $.ajax({
                            url: "/management-kandidat/"+id,
                            type: "POST",
                            data: {
                                '_method': 'DELETE',
                                '_token': '{{csrf_token()}}',
                                'id': id,
                            },
                            dataType:"JSON",
                            success: function(response) {
                            $('.kandidat-datatable').DataTable().ajax.reload();
                            Response(response);
                            }
                            })
                        }
                    });
                }); 
                // end delete kandidat


                 // Delete Selected
                 $(function(){
                    $('#check-all').on('click', function(){
                        $('.checkbox-select').prop('checked', $(this).prop('checked'))
                    });

                    $('#deleteall').on('click', function(e){
                        e.preventDefault();
                        var ids = [];
                        $(".checkbox-select:checked").each(function(){
                        ids.push($(this).val());
                        });

                        
                        if(ids.length <= 0)
                        {
                            Swal.fire(
                                    'Oops...',
                                    'Silahkan Pilih beberapa data kandidat yang ingin dihapus!',
                                    'error'
                                );
                        } else {
                            var strIds = ids.join(",");
                            Swal.fire({
                            title: 'Apakah kamu yakin',
                            text: "Data Kandidat yang terpilih akan dihapus secara permanen!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#47C363',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya',
                            cancelButtonText: 'Batal'
                            }).then((result) =>
                            {
                            if (result.isConfirmed) {
                                $.ajax({
                                url:"/selected-kandidat",
                                type: "POST",
                                data:{
                                _method:"DELETE",
                                _token: '{{csrf_token()}}',
                                id:strIds
                                },
                                success:function(response)
                                {
                                $('.kandidat-datatable').DataTable().ajax.reload();
                                Response(response);
                                }
                                }); 
                            }
                            })
                        }
                        });
                    });
                 // End Delete Selected
      </script>
  @endpush  
@endsection