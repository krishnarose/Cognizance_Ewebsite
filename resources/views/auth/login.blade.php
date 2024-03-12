@extends('layouts.client.master')

@section('title', 'login - Ecommerce')

@section('content')
<div class="container-xxl py-5 bg-dark hero-header mb-5">
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="wow fadeInUp" data-wow-delay="0.2s">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <label for="name">Your Email</label>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="password" class="form-control" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <label for="email">Your Password</label>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
