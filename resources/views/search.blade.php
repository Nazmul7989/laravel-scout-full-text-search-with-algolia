@extends('layouts.app')

@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row">
                <div class="col-6 mb-3">
                    <form action="{{ route('search.index') }}" method="post">
                        @csrf
                        @method('GET')
                        <div class="form-group d-flex justify-content-center">
                            <input name="search" type="text" class="form-control" />
                            <button type="submit" class="btn btn-primary ms-2">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ $product->image }}" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $product->title }}</h5>
                                    <!-- Product price-->
                                    $40.00 - $80.00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col mt-2">
                    <div >{{ $products->links() }}</div>
                </div>

            </div>
        </div>
    </section>
@endsection
