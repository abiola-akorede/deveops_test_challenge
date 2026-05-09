@extends('layout.main')
@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview wide-md mx-auto">
                    <div class="nk-block-head nk-block-head-lg wide-sm">
                        <div class="nk-block-head-content">
                            {{-- <div class="nk-block-head-sub"><a class="back-to" href="html/components.html"><em class="icon ni ni-arrow-left"></em><span>Components</span></a></div> --}}
                            <h2 class="nk-block-title fw-normal"> New Business Plan Profile </h2>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block nk-block-lg">

                        <div class="row g-gs">
                            <div class="col-lg-12">
                                <div class="card card-bordered h-100">
                                    <div class="card-inner">
                                        <div class="card-head">
                                            <h5 class="card-title"> New Business Plan Profile</h5>
                                        </div>
                                        
                                        @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            @if(session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif
                                            @if(session('error'))
                                            <div class="alert alert-danger">
                                                {{ session('error') }}
                                            </div>
                                        @endif

                                        <form action="{{ route('new_profile') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                {{-- <label class="form-label" for="full-name">Full Name</label> --}}
                                                <div class="form-control-wrap">
                                                    <label class="form-label" for="full-name">Business Name</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" name="business_name" class="form-control" id="business-name">
                                                                    <span>The business name can not be changed</span>
                                                                </div>
                                                    <br>
                                                    {{-- <a href="#" class=> Initialize New Business Profile</a> --}}
                                                    <input type="submit" class="btn btn-xl btn-primary" value="Initialize New Business Profile">
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- .nk-block -->
                </div><!-- .components-preview -->
            </div>
        </div>
    </div>
</div>
@endsection
