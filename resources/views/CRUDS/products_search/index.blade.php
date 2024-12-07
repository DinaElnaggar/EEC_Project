@extends('layouts.inc.app')
@section('title')
    Products Search
@endsection
@section('css')

    <link href="{{url('assets/dashboard/css/select2.css')}}" rel="stylesheet"/>


    <style>
        .select2-container {
            z-index: 100000000000000000000000000000000; /* Adjust the value as needed */
        }

    </style>


@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!--begin::Tables Widget 11-->
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Products Search</span>
            </h3>
            <div>
                <input type="text" id="searchBar" class="form-control" placeholder="Search by title">
            </div>

        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table id="table" class="table align-middle gs-0 gy-4 table table-bordered dt-responsive nowrap table-striped align-middle">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bolder text-muted bg-light">
                            <th>#</th>
                            <th>image</th>
                            <th>Title</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <tbody id="tableBody">
                    @include('CRUDS.products_search.parts.table', ['products' => $products])

                    </tbody>
                </table>
                <!-- Pagination Controls -->
                <div class="mt-4 d-flex justify-content-center">
                    {{ $products->links() }}
                </div>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
    </div>


@endsection
{{--@section('js')--}}
    @push('scripts')

        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).ready(function () {
                console.log("Document ready");

                // Attach event listener for the search bar
                $('#searchBar').on('change', function () {
                    console.log("Change detected");

                    let query = $(this).val();
                    console.log("Query: ", query);

                    $.ajax({
                        url: "{{ route('product.search') }}",
                        type: 'GET',
                        data: { search: query },
                        beforeSend: function () {
                            console.log("Sending request to server...");
                        },
                        success: function (response) {
                            console.log("AJAX Success: ", response);
                            $('#tableBody').html(response.html);
                        },
                        error: function (xhr) {
                            console.error("AJAX Error: ", xhr.responseText);
                        }
                    });
                });
            });

        </script>

    @endpush
{{--@endsection--}}
