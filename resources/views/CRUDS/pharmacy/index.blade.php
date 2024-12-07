@extends('layouts.inc.app')
@section('title')
    Pharmacies
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
                <span class="card-label fw-bolder fs-3 mb-1">Pharmacies</span>
                {{-- <span class="text-muted mt-1 fw-bold fs-7">Over 500 new Pharmacies</span> --}}
            </h3>

            <div class="card-toolbar">
                <button id="addBtn"  class="btn btn-sm btn-light-primary">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->Add Pharmacy</button>
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
                            <th>Name</th>
                            <th>Address</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                        <tbody>
                            @foreach($pharmacies as $index => $data)
                                <tr>
                                    <td>{{$index +1}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{!! $data->address !!}</td>
                                    <td>
                                        <!-- Edit Button -->
                                        <button class="btn btn-sm btn-primary editBtn" data-id="{{ $data->id }}">
                                            Edit
                                        </button>
                                        <!-- Delete Button -->
                                        <button class="btn btn-sm btn-danger deleteBtn" data-id="{{ $data->id }}">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>
                <!-- Pagination Controls -->
                <div class="mt-4 d-flex justify-content-center">
                    {{ $pharmacies->links() }}
                </div>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
    </div>


    <div class="modal fade" data-bs-backdrop="static"  id="Modal" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered modal-lg mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content" id="modalContent">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2><span id="operationType"></span> Pharmacy </h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" style="cursor: pointer"
                         data-bs-dismiss="modal" aria-label="Close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                      transform="rotate(-45 6 17.3137)"
                                      fill="black"/>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                      fill="black"/>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7" id="form-load">

                </div>
                <!--end::Modal body-->
                <div class="modal-footer">
                    <div class="text-center">
                        <button type="reset" data-bs-dismiss="modal" aria-label="Close" class="btn btn-light me-3">
                          cancel
                        </button>
                        <button form="form" type="submit" id="submit" class="btn btn-primary">
                            <span class="indicator-label">ok</span>
                        </button>
                    </div>
                </div>
            </div>

            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>

@endsection
@section('js')

    <script src="{{url('assets/dashboard/js/select2.js')}}"></script>


    <script>
        $(document).ready(function () {
            // Trigger modal open and load content
            $('#addBtn').on('click', function () {
                $.ajax({
                    url: "{{ route('pharmacies.create') }}", // Route to fetch the create form
                    type: 'GET',
                    success: function (response) {
                        // Load the response (form) into the modal body
                        $('#form-load').html(response);
                        // Set the operation type in the modal title
                        $('#operationType').text('Add');
                        // Show the modal
                        $('#Modal').modal('show');
                    },
                    error: function (xhr) {
                        console.error(xhr.responseText); // Log any error response
                        alert('Failed to load the form. Please try again.');
                    }
                });
            });
        });
    </script>
<script>
    $(document).on('submit', '#form', function (e) {
        e.preventDefault(); // Prevent default form submission

        let formData = new FormData(this);

        $.ajax({
            url: $(this).attr('action'), // Use the form action
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status) {
                    // Show success toaster
                    toastr.success(response.message);

                    // Close the modal and reload the table
                    $('#Modal').modal('hide');
                    $('#table').DataTable().ajax.reload(); // If you're using DataTables
                } else {
                    toastr.error(response.message);
                }
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    // Loop through validation errors and show them as toaster messages
                    $.each(errors, function (key, value) {
                        toastr.error(value[0]); // Display the first error for each field
                    });
                } else {
                    toastr.error('An unexpected error occurred. Please try again.');
                }
            }
        });
    });

</script>
<script>
    $(document).on('click', '.editBtn', function () {
        let id = $(this).data('id');
        $.ajax({
            url: `/pharmacies/${id}/edit`, // Your edit route
            type: 'GET',
            success: function (response) {
                // Load the edit form into the modal
                $('#form-load').html(response);
                $('#operationType').text('Edit');
                $('#Modal').modal('show');
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                toastr.error('Failed to load the edit form. Please try again.');
            }
        });
    });

</script>
    <script>
        $(document).on('click', '.deleteBtn', function () {
            let id = $(this).data('id');

            // Confirm deletion
            if (confirm('Are you sure you want to delete this Pharmacy?')) {
                $.ajax({
                    url: `/pharmacies/${id}`, // Your delete route
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}' // Include CSRF token
                    },
                    success: function (response) {
                        toastr.success('Pharmacy deleted successfully!');
                        location.reload();
                        $('#table').DataTable().ajax.reload(); // Reload the table

                    },
                    error: function (xhr) {
                        console.error(xhr.responseText);
                        toastr.error('Failed to delete the Pharmacy. Please try again.');
                    }
                });
            }
        });

    </script>
@endsection
