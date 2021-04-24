@extends('layouts.app_layout')

@extends('layouts.section_top_nav')
@extends('layouts.section_sidebar')

@section('title', 'Create')

@section('styles')
  <!-- Add custom styles here -->
@endsection

@section('section_content')
  <section class="content">
    <div class="container-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <a href="{{ route('branch.index') }}" class="btn bg-blue-grey btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">arrow_back</i>
                            </a>
                            Add a New {{ ucwords(explode('.', request()->route()->getName())[0]) }}
                        </h2>
                        {{-- <ul class="header-dropdown m-r--5">
                            <li class="">
                                <a href="javascript:void(0);" class="btn btn-primary waves-effect ">
                                    <i class="material-icons">add_to_queue</i>&nbsp;Add
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul> --}}
                    </div>
                    <div class="body">
                        @if (session('message'))
                            <div class="alert alert-{{ session('type') }}">
                            {!! session('message') !!}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('branch.store') }}" enctype="multipart/form-data" id="form-input">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    @csrf
                                    <div class="form-group">
                                        <label>Name *</label>
                                        <div class="form-line @error('name') error focused @enderror">
                                            <input type="text" id="" class="form-control" name="name" placeholder="Enter name" required value="{{ old('name') }}">
                                        </div>
                                        @error('name')
                                            <label class="error">{{ $message }}</label>
                                        @enderror
                                    </div>

                                    <div class="input-group">
                                        <label>Branch Code *</label>
                                        <div class="form-line @error('code') error focused @enderror">
                                            <input type="text" class="form-control" name="code" placeholder="Enter branch code" value="{{ old('code') }}" required autocomplete="off">
                                        </div>
                                        @error('code') 
                                            <label class="error">{{ $message }}</label>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Description / Note</label>
                                        <div class="form-line @error('description') error focused @enderror">
                                            <textarea rows="3" class="form-control no-resize" name="description" placeholder="Enter description or some notes">{{ old('description') }}</textarea>
                                        </div>
                                        @error('description')
                                            <label class="error">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                            </div>
        
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect" id="btn-submit">Submit</button>
                            <button type="reset" class="btn btn-warning m-t-15 waves-effect">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
  </section>
@endsection

@section('scripts')
    <!-- Custom Js -->
    <script type="text/javascript">
        $(function () {
            $('#form-input').on('submit', function () { 
                $('#btn-submit').text('Loading...').prop('disabled', true);
            });
        });
    </script>
@endsection