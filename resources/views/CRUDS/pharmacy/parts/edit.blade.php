<!--begin::Form-->
<form id="form" enctype="multipart/form-data" method="POST" action="{{ route('pharmacies.update', $row->id) }}">
    @csrf
    @method('PUT')

    <div class="row g-4">
        <div class="d-flex flex-column mb-7 fv-row col-sm-12">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1">Name <span class="red-star">*</span></span>
            </label>
            <!--end::Label-->
            <input required type="text" class="form-control form-control-solid" placeholder="" name="name" value="{{$row->name}}"/>
        </div>

        <div class="d-flex flex-column mb-7 fv-row col-sm-12">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1">Address <span class="red-star">*</span></span>
            </label>
            <!--end::Label-->
            <input required type="text" class="form-control form-control-solid" placeholder="" name="address" value="{{$row->address}}"/>
        </div>

    </div>
</form>

