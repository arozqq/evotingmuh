@if (session()->has('success')) 
<div class="row">
    <div class="col-md-8">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session()->get('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
</div>
@endif 

@if ($errors->any())
  <div class="row">
    <div class="col-md-8">
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
        @foreach ($errors->all() as $error)
        <li class="" style="list-style-type: none">{{ $error }}</li>
        @endforeach
      </ul>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    </div>
  </div>
@endif

@if (session()->has('error')) 
<div class="row">
  <div class="col-md-8">
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{session()->get('error')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  </div>
</div>
@endif