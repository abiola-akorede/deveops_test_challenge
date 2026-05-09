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
                            <h2 class="nk-block-title fw-normal">  Business Plan Profile Created </h2>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block nk-block-lg">

                        <div class="row g-gs">
                            <div class="col-lg-12">
                                <div class="card card-bordered h-100">
                                    <div class="card-inner">
                                        <div class="card-head">
                                            <h5 class="card-title">  Business Plan Profile Created </h5>
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

                                        <div>
                                            <p>
                                                The special program organized by district: are they to just take any program to organize or they were assigned from the central
                                                2. Biological children transfer: Is it from A1 or A2
                                                3. Presentation does nor capture the number of biological children
                                                4. Displaying some of the pictures of the program organized
                                                5. Skill acquisition for our children
                                                6. Book reading should be added to our children’s assignment on monthly basis
                                                7. A1, A2, A4 and A9 needs to collaborate on our children training
                                                8. Being intentional about training our children giving them chance on the field work
                                                9. We should be deliberate in assigning duties to our biological children starting from the December camping program
                                            </p>
                                        </div>
                                        <br>
                                        <div>
                                            <p>
                                                The special program organized by district: are they to just take any program to organize or they were assigned from the central
                                                2. Biological children transfer: Is it from A1 or A2
                                                3. Presentation does nor capture the number of biological children
                                                4. Displaying some of the pictures of the program organized
                                                5. Skill acquisition for our children
                                                6. Book reading should be added to our children’s assignment on monthly basis
                                                7. A1, A2, A4 and A9 needs to collaborate on our children training
                                                8. Being intentional about training our children giving them chance on the field work
                                                9. We should be deliberate in assigning duties to our biological children starting from the December camping program
                                            </p>
                                        </div>
                                        <br>

                                        <form action="{{ route('new_profile') }}" method="">
                                            @csrf
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <br>
                                                    <input type="text" hidden name="id" value="">
                                                    <input type="submit" formaction="/mybizplan/description" formmethod="GET" class="btn btn-xl btn-primary" value="CREATE YOUR BUSINESS PLAN">
                                                    <input type="submit" formaction="{{ route('dashboard.index')  }}" formmethod="GET" class="btn btn-xl btn-primary" value="BACK TO DASHBOARD">
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
