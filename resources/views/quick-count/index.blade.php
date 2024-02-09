@extends('layouts.admin-master')
@section('content')
<h3 class="text-white mb-3">Quick Count</h3>
<div class="col-lg-12">
    <div class="card">
        <div class="card-body text-center">
           <h3 class="mt-2">{{number_format($total_suara_masuk, 2, ',', '.')}} % Suara Masuk</h3>
           <p>dari <strong>{{$total_user}}</strong> pemilih</p>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header">Grafik Perolehan Suara Kandidat</div>
        <div class="card-body">
           <div id="chart"></div>
        </div>
    </div>
  
    <div class="card mt-3">
        <div class="card-header">Detail Perolehan Suara Kandidat</div>
        <div class="card-body row p-4">
            @foreach ($items as $kd)
            <div class="col-lg-2 col-md-2 col-sm-6 col-12 mb-5">
                <div class="card shadow"> 
                    @if ($kd->foto_kandidat === NULL)
                    <img src="{{asset('foto/default.png')}}" class="img-responsive p-3" alt="foto kandidat" height="200">
                    @else 
                      <img src="{{$kd->foto_kandidat}}" class="img-responsive p-3" alt="foto kandidat" height="200">
                    @endif  
                    <div class="card-body text-center">
                        <h6 class="card-title mb-2">{{$kd->nama_kandidat}}</h6>
                         <h6 class="">{{number_format(($kd->users_count / $total_user) * 100, 2, ',', '.')}} % Suara</h6>
                       
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


  @push('after-script')
      <script>
      var options = {
          series: [{
            name: 'Perolehan Suara',
            data: [
                    @foreach($items as $item)
                            '{{ $item->users_count }}',
                    @endforeach
                ]
            }],
            chart: {
            type: 'bar',
            height: '595'
            },
            colors: ['#0EB193'],
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true,
                }
            },
            dataLabels: {
                enabled: true
            },
            noData: {
            text: "Loading...",
            },
            xaxis: {
                categories: [
                    @foreach($items as $item)
                            "{{ $item->nama_kandidat }}",
                    @endforeach
                ],
                min: 0,
                max: {{$total_user}},
                labels: {
                    formatter: function (val) {
                        return val.toFixed(0);
                    }
                },
                decimalsInFloat: 0,
            },
            yaxis: {
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: true
                },
                labels: {
                    show: true
                },
                
            },
            legend: {
                show: true,
                showForSingleSeries: true,
            },
            tooltip: {
             shared: false,
                x: {
                    formatter: function (val) {
                    return val
                    }
                },
                y: {
                    formatter: function (val) {
                    return Math.abs(val)
                    }
                }
            },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
        
  
     
      </script>
  @endpush  
@endsection