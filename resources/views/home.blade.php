@include('layouts.partials.header')

<!-- Navbar & Hero Start -->
<div class="container-xxl position-relative p-0" id="home">
    @include('layouts.partials.navbar')
    @include('layouts.partials.hero-header')
</div>
<!-- Navbar & Hero End -->

<!-- Kandidat & Peserta Start -->
<div class="container-xxl py-5" id="kandidat">
    <div class="container py-5 px-lg-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                {{-- <h5 class="text-primary-gradient fw-medium">Kandidat & Peserta</h5> --}}
                <h1 class="mb-2">Kandidat & Peserta</h1>
                <p class="mb-4">Informasi total data kandidat dan data peserta</p>
                <div class="row g-4 mb-4">
                    <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                        <div class="d-flex">
                            <i class="fa fa-users fa-2x text-primary-gradient flex-shrink-0 mt-1"></i>
                            <div class="ms-3">
                                @if ($kandidat > 0)
                                <h3 class="mb-0" data-toggle="counter-up">{{$kandidat}}</h3>
                                @else 
                                <h3 class="mb-0" data-toggle="counter-up">0</h3>
                                @endif
                                <p class="text-primary-gradient mb-0">Total Kandidat</p>
                            </div>
                        </div>
                    </div>
                 
                    <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                        <div class="d-flex">
                            <i class="fa fa-clipboard-check fa-2x text-primary-gradient flex-shrink-0 mt-1"></i>
                            <div class="ms-4">
                                @if ($user > 0)
                                <h3 class="mb-0" data-toggle="counter-up">{{$user}}</h3>
                                @else 
                                <h3 class="mb-0" data-toggle="counter-up">0</h3>
                                @endif
                                <p class="text-primary-gradient mb-0">Peserta Sudah Memilih</p>
                            </div>
                        </div>
                    </div>
                
                    
                    <div class="col-sm-4 wow fadeIn" data-wow-delay="0.7s">
                        <div class="d-flex">
                            <i class="fa fa-user-times fa-2x text-secondary-gradient flex-shrink-0 mt-1"></i>
                            <div class="ms-3">
                                @if ($user_b_pilih > 0)
                                <h3 class="mb-0" data-toggle="counter-up">{{$user_b_pilih}}</h3>
                                @else 
                                <h3 class="mb-0" data-toggle="counter-up">0</h3>
                                @endif
                                <p class="text-disabled mb-0">Peserta Belum Memilih</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <a href="/voting">
                <img class="img-fluid wow fadeInUp" data-wow-delay="0.5s" src="{{asset('asset/img/hero-img.png')}}" width="500">
                </a>
            </div>
        </div>
    </div>
</div>


<div class="container-xxl py-5" id="kandidat">
    <div class="container py-5 px-lg-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            {{-- <h5 class="text-primary-gradient fw-medium">Visi & Misi</h5> --}}
            <h1 class="mb-5">Kandidat</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            @forelse ($data_kandidat as $dk)
            <div class="card mx-3">
                <div class="testimonial-item rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        {{-- <img class="img-fluid bg-white rounded flex-shrink-0 p-1" src="{{asset($dk->foto_kandidat)}}" style="width: 85px; height: 85px;"> --}}
                        <div class="ms-4">
                            <h5 class="mb-1 text-center">{{$dk->nama_kandidat}}</h5>
                        </div>
                    </div>
                    {{-- <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#visi-{{$dk->id}}" aria-expanded="false" aria-controls="visi-{{$dk->id}}">
                              Visi
                            </button>
                          </h2>
                          <div id="visi-{{$dk->id}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">{{$dk->visi}}</div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#misi-{{$dk->id}}" aria-expanded="false" aria-controls="misi-{{$dk->id}}">
                              Misi
                            </button>
                          </h2>
                          <div id="misi-{{$dk->id}}" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">{{$dk->misi}}</div>
                          </div>
                      </div>
                    </div> --}}
                </div> 
            </div>
            
            @empty
                <h5 class="text-info">Belum ada kandidat.</h5>
            @endforelse
            
        </div>
    </div>
</div>
<!-- Kandidat End -->

<!-- QC Start -->
{{-- <div class="container-xxl py-4" id="qc">
    <div class="container py-4 px-lg-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="text-primary-gradient fw-medium">Perolehan Data</h5>
            <h1 class="mb-5">Quick Count</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg wow fadeInUp" data-wow-delay="0.1s">
                <div class="feature-item bg-light rounded p-4">
                   <div id="chart"></div>
                </div>
            </div>
        </div>
        <a href="quick-count" class="wow fadeInUp btn btn-primary-gradient rounded-pill py-2 px-4 d-md-inline-block d-block mt-4">Lihat Selengkapnya</a>
    </div>
</div> --}}
<!-- QC End -->
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
                            '{{ $item->nama_kandidat }}',
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

@include('layouts.partials.footer')
