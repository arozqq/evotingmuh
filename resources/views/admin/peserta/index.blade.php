@extends('layouts.admin-master')
@section('content')
        <h3 class="text-white mb-3">Management Peserta</h3>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-secondary-gradient pt-2">List Peserta</h5>
                </div>
                <div class="card-body">
                    <a class="btn btn-sm btn-primary-gradient py-2 mx-2 px-4 d-md-inline-block d-block mb-4" id="btn-new-peserta">Tambah Peserta</a>
                    <a class="btn btn-sm btn-outline-danger py-2 px-4 mx-2 d-md-inline-block d-block mb-4" id="deleteall">Delete Selected</a>
                    <table class="table table-striped peserta-datatable">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th class="text-center">
                                <div class="custom-checkbox custom-control">
                                <input type="checkbox" class="custom-control-input" id="check-all">
                                <label for="check-all" class="custom-control-label">&nbsp;</label>
                                </div>
                             </th>
                              <th scope="col">Nama Lengkap</th>
                              <th scope="col">Email</th>
                              <th scope="col">Username</th>
                              <th scope="col">Role</th>
                              <th scope="col">Submited</th>
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
   
  
  <!-- Modal User -->
  <div class="modal fade" id="pesertaModal" tabindex="-1" aria-labelledby="pesertaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="pesertaModalLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <span id="form-result"></span>
            <form action="{{route('management-peserta.store')}}" id="pesertaForm" name="pesertaForm"  method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6 col-12 mb-2">
                            <label for="fullname" class="mb-2">Nama Lengkap</label>
                            <input type="text" name="fullname" id="fullname" class="form-control @error('fullname') is-invalid @enderror" value="{{old('fullname')}}">
                        </div>
                        <div class="col-md-6 col-12 mb-2">
                            <label for="username" class="mb-2">Username</label>
                            <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{old('username')}}">
                        </div>
                    </div>   
                    <div class="form-group row">
                        <div class="col-md-6 col-12 mb-2">
                            <label for="email" class="mb-2">Email</label>
                            <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                        </div>
                        <div class="col-md-6 col-12 mb-2">
                            <label for="password" class="mb-2">Password</label>
                            <input type="text" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-12 mb-2">
                            <label for="role" class="mb-2">Role</label>
                            <select name="role" id="role" class="form-select">
                                <option value="User">User</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-12 mb-2">
                            <label for="submited" class="mb-2">Submited?</label>
                            <select name="submited" id="submited" class="form-select">
                                <option value="0">Belum</option>
                                <option value="1">Sudah</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" id="btn-save">Simpan</button>
                </div>
            </form>

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
          
          var table = $('.peserta-datatable').DataTable({
              processing: true,
              serverSide: true,
              dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            ajax: "{{ route('management-peserta.index') }}",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data:'checkbox',name:'name', orderable: false, searchable: false},
                  {data: 'fullname', name: 'fullname'},
                  {data: 'email', name: 'email'},
                //   {data: 'nik', name: 'nik'},
                  {data: 'username', name: 'username'},
                  {data: 'role', name: 'role'},
                  {data: 'submited', name: 'submited'},
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
        
            // add
              /* When click New Peserta button */
              $('#btn-new-peserta').click(function () {
                $('#btn-save').val("create-peserta");
                $('#btn-save').html("Simpan");
                $('#id').val('');
                $('#form-result').html('');
                $('#pesertaForm').trigger("reset");
                $('#pesertaModalLabel').html("Tambah Data Peserta");
                $('#pesertaModal').modal('show');
            });

            /* Edit Peserta */
            $(document).on('click', '#edit-peserta', function () {
            var id= $(this).data('id');
            $.get('/peserta/'+id+'/edit', function (data) {
                $('#pesertaModalLabel').html("Ubah Data Peserta");
                $('#btn-save').html("Update");
                $('#btn-save').val("update");
                $('#pesertaModal').modal('show');
                $('#id').val(data.id);
                $('#fullname').val(data.fullname);
                $('#nik').val(data.nik);
                $('#username').val(data.username);
                $('#email').val(data.email);
                $('#role').val(data.role);
                $('#submited').val(data.submited);
                });
            });

            /* Delete User*/
            // sweeralert delete
            $(document).on('click', '#delete-peserta', function () {
                    let id = $(this).data('id');
                    Swal.fire({
                        title: 'Apakah kamu yakin ?',
                        text: "Data peserta ini akan dihapus secara permanen!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#47C363',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                        $.ajax({
                            url: "/delete-peserta/delete/"+id,
                            type: "POST",
                            data: {
                                '_method': 'DELETE',
                                '_token': '{{csrf_token()}}',
                                'id': id,
                            },
                            dataType:"JSON",
                            success: function(response) {
                            $('.peserta-datatable').DataTable().ajax.reload();
                            Response(response);
                            }
                            })
                        }
                    });
                }); 
                // end delete peserta


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
                                    'Silahkan Pilih beberapa data peserta yang ingin dihapus!',
                                    'error'
                                );
                        } else {
                            var strIds = ids.join(",");
                            Swal.fire({
                            title: 'Apakah kamu yakin?',
                            text: "Semua data yang terpilih akan dihapus secara permanen!",
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
                                url:"/selected-peserta",
                                type: "POST",
                                data:{
                                _method:"DELETE",
                                _token: '{{csrf_token()}}',
                                id:strIds
                                },
                                success:function(response)
                                {
                                $('.peserta-datatable').DataTable().ajax.reload();
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