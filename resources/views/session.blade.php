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
                            <h2 class="nk-block-title fw-normal"> Dashboard </h2>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block nk-block-lg">

                        <div class="row g-gs">
                            <div class="col-lg-6">
                                <div class="card card-bordered h-100">
                                    <div class="card-inner">
                                        <div class="card-head">
                                            <h5 class="card-title">Get New Business Plan</h5>
                                        </div>

                                        {{-- <form action="#"> --}}
                                            <div class="form-group">
                                                {{-- <label class="form-label" for="full-name">Full Name</label> --}}
                                                <div class="form-control-wrap">
                                                    <img src="{{ asset('images/bizplan.jpeg') }}" alt="">

                                                    <br>
                                                    <a href="{{ route('create_business_profile') }}" class="btn btn-xl btn-primary">Generate A New Business Plan</a>
                                                </div>
                                            </div>

                                        {{-- </form> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card card-bordered h-100">
                                    <div class="card-inner">
                                        <div class="card-head">
                                            <h5 class="card-title">My Business Plans</h5>
                                        </div>
                                        <table class="table">
                                            <thead>
                                              <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Business Name</th>
                                                <th scope="col">Action</th>

                                              </tr>
                                            </thead>

                                            <tbody>
                                                @if ($businessProfile)
                                                <form action="{{ route('bizplan.manage', ['id' => $profile->id]) }}" method="GET">

                                                <tr>
                                                    <th scope="row">{{ $profile->id  }}</th>
                                                    <td>{{ $profile->business_name }}
                                                        <input type="text" name="profile_id" hidden value="{{ $profile->id }}"  id="">

                                                    </td>
                                                    <td><input class="btn btn-primary" type="submit" value="Manage" name="submit"></td>
                                                  </tr>
                                                </form>
                                                
                                                @endif


                                            </tbody>
                                          </table>
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
