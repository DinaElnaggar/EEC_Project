@extends('layouts.inc.app')

@section('title')
    Product Details@endsection

@section('content')
    <div class="profile-bg bg_img"
         style="background-image: url('https://script.viserlab.com/ratelab/assets/images/frontend/breadcrumb/6354d380899a21666503552.jpg');">
    </div>
    <div class="profile-header">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-9">
                    <nav class="profile-nav">
                        <div class="profile-head "><h1>Product Details {{$product->title}}</h1></div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="main-wrapper">
        <div class="pt-50 pb-50 section--bg">
            <div class="container">
                <div class="row justify-content-between flex-row-reverse">

                    <div class="col-xl-9 col-lg-8 order-0">

                        <div class="container profile-widget mt-2 mb-5">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 mb-4">

                                        <div class="mt-3 mb-3 d-flex justify-content-start align-items-center">
                                                <h6 class="me-3"><i>Title: </i></h6>
                                                <h5> <b>{{ $product->title }}</b></h5>
                                        </div>

                                        <div class="mt-3 mb-3 d-flex justify-content-start align-items-center">
                                                <h6 class="me-3"><i>Description: </i></h6>
                                                <h5> <b>{!!   $product->desc !!}</b></h5>
                                        </div>


                                    </div>


                                    <!-- Pharmacies Table -->
                                    <div class="container profile-widget mt-4">
                                        <h4>Pharmacies</h4>
                                        <table class="table table-bordered mt-3">
                                            <thead class="bg-light">
                                            <tr>
                                                <th>#</th>
                                                <th>{{ $product->title }}</th>
                                                <th>Price</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($pharmacies as $index => $pharmacy)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $pharmacy->name }}</td>
                                                    <td>{{ $product->price ?? 'N/A' }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3">No pharmacies associated with this product.</td>
                                                </tr>
                                            @endforelse
                                            </tbody>


                                        </table>
                                        <div class="d-flex justify-content-center mt-3">
                                            {{ $pharmacies->links() }}
                                        </div>

                                    </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')


@endsection
