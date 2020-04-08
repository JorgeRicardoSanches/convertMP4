@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('VideoUpload')])

@section('content')
<div class="content">
  <div class="container-fluid">
  <div class="row">
        <div class="col-md-12">
        <form method="post" action="{{url('store')}}" enctype="multipart/form-data">
            @csrf            
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Convert MP4 to HLS & Upload to S3') }}</h4>
                <p class="card-category">{{ __('choose mp4 file') }}</p>
              </div>
              <div class="card-body video-card-body">
                @if (\Session::has('success'))
                <div class="alert alert-success">
                  <p>{{ \Session::get('success') }}</p>
                </div><br />
                @endif
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                  <strong>Whoops!</strong> There were some problems with your input.<br><br>
                  <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                @endif                
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Module') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('module') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('module') ? ' is-invalid' : '' }}" name="module" id="input-module" type="text" placeholder="{{ __('Module') }}" required="true" aria-required="true"/>
                    @if ($errors->has('module'))
                      <span id="module-error" class="error text-danger" for="input-module">{{ $errors->first('module') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Topic') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('topic') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('topic') ? ' is-invalid' : '' }}" name="topic" id="input-topic" type="text" placeholder="{{ __('Topic') }}" required="true" aria-required="true"/>
                    @if ($errors->has('topic'))
                      <span id="topic-error" class="error text-danger" for="input-topic">{{ $errors->first('topic') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Location') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('location') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" id="input-location" type="text" placeholder="{{ __('Location') }}" required="true" aria-required="true"/>
                    @if ($errors->has('location'))
                      <span id="location-error" class="error text-danger" for="input-location">{{ $errors->first('location') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                  <div class="col-md-5"></div>                
                  <div class="col-md-2">
                    <div>
                      <span class="btn btn-rose btn-file">
                        <span class="fileinput-new">Select video</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="file" name="video" id="input-picture">
                      <div class="ripple-container"></div></span>
                        <a href="#pablo" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                    </div>    
                  </div> 
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-success">Upload</button>
                  </div>                  
              </div>
            </div>
          </form>
        </div>
      </div> 

    </div>
  </div>
@endsection

@push('js')
  <script>
    
  </script>
@endpush