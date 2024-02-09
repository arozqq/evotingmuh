 <!-- JavaScript Libraries -->
 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
 <script src="{{asset('asset/lib/wow/wow.min.js')}}"></script>
 <script src="{{asset('asset/lib/easing/easing.min.js')}}"></script>
 <script src="{{asset('asset/lib/waypoints/waypoints.min.js')}}"></script>
 <script src="{{asset('asset/lib/counterup/counterup.min.js')}}"></script>
 <script src="{{asset('asset/lib/owlcarousel/owl.carousel.min.js')}}"></script>

 <!-- Template Javascript -->
 <script src="{{asset('asset/js/main.js')}}"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
 <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
 <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
 <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>

 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

 @stack('after-script')
 <script>
     function Response(response){
     const Toast = Swal.mixin({
       toast: true,
       position: 'top-end',
       showConfirmButton: false,
       timer: 2000,
       timerProgressBar: true,
       didOpen: (toast) => {
         toast.addEventListener('mouseenter', Swal.stopTimer)
         toast.addEventListener('mouseleave', Swal.resumeTimer)
       }
     })  
     Toast.fire({
       icon: 'success',
         title: response.success,
       })
   }
 </script>
</body>

</html>