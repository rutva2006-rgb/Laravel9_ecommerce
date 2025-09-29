
@extends('layouts.app')
@section('title', 'User Profile')

@section('content')

<div class="py-5 bg-gray">
    <div class="container">

        {{-- Flash Messages --}}
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger mb-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-10">
                <h4 class="fw-bold">
                    User Profile
                    <a href="{{ url('change-password') }}" class="btn btn-warning float-end">
                        Forgot Password ?
                    </a>
                </h4>
                <div class="underline mb-4"></div>
            </div>

            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-header bg-primary">
                        <h4 class="mb-0 text-white">User Details</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ url('profile') }}" method="POST">
                            @csrf
                            <div class="row">

                                {{-- Username --}}
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Username</label>
                                        <input type="text" name="username"
                                            value="{{ Auth::user()->name }}"
                                            class="form-control" />
                                    </div>
                                </div>

                                {{-- Email --}}
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Email Address</label>
                                        <input type="text" name="email"
                                            value="{{ Auth::user()->email }}"
                                            class="form-control" />
                                    </div>
                                </div>

                                {{-- Phone --}}
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Phone Number</label>
                                        <input type="text" name="phone"
                                            value="{{ Auth::user()->userDetail->phone ?? '' }}"
                                            class="form-control" />
                                    </div>
                                </div>

                                {{-- Pin Code --}}
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Zip / Pin Code</label>
                                        <input type="text" name="pin_code"
                                            value="{{ Auth::user()->userDetail->pin_code ?? '' }}"
                                            class="form-control" />
                                    </div>
                                </div>

                                {{-- Address --}}
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control" rows="3">{{ Auth::user()->userDetail->address ?? '' }}</textarea>
                                    </div>
                                </div>

                                {{-- Submit --}}
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        Save Data
                                    </button>
                                </div>

                            </div> {{-- row --}}
                        </form>
                    </div>
                </div>
            </div>
        </div> {{-- row --}}
    </div> {{-- container --}}
</div> {{-- py-5 --}}

@endsection
