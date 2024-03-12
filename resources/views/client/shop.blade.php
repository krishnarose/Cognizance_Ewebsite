@extends('layouts.client.master')
@section('content')
<div class="container-xxl py-5 bg-dark hero-header mb-5">
</div>


        <!-- Testimonial Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="text-center">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Testimonial</h5>
                    <h1 class="mb-5">Our Clients Say!!!</h1>
                </div>
                <div class="owl-carousel testimonial-carousel">

                    @php
                    $featuredcategories = App\Models\featuredCategory::all();
                @endphp

                @foreach ($featuredcategories as $fcat)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{ asset('uploads/category/' . $fcat->category->image) }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $fcat->category->title }}</h5>
                                {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                    the card's content.</p> --}}
                                <a href="{{url('/category/'.$fcat->category->slug)}}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>
                @endforeach


                </div>
            </div>
        </div>
        <!-- Testimonial End -->
@endsection
