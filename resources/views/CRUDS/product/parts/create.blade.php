<!--begin::Form-->

<form id="form" enctype="multipart/form-data" method="POST" action="{{route('products.store')}}">
    @csrf
    <div class="row g-4">

        <div class="form-group">
            <label for="name" class="form-control-label">image </label>
            <input type="file" class="dropify" name="image" data-default-file="{{get_file()}}" accept="image/*"/>
            <span
                class="form-text text-muted text-center">Only the following formats are allowed: jpeg, jpg, png, gif, svg, webp, avif.</span>
        </div>

        <div class="d-flex flex-column mb-7 fv-row col-sm-12">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1">Title <span class="red-star">*</span></span>
            </label>
            <!--end::Label-->
            <input required type="text" class="form-control form-control-solid" placeholder="" name="title" value=""/>
        </div>

        <!--end::Input group-->

        <div class="d-flex flex-column mb-7 fv-row col-sm-6">
            <!--begin::Label-->
            <label for="price" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1"> price</span>
                <span class="red-star">*</span>
            </label>
            <!--end::Label-->
            <input id="price" type="number" class="form-control form-control-solid" placeholder=" " name="price"
                   value=""/>
        </div>


        <div class="d-flex flex-column mb-7 fv-row col-sm-6">
            <!--begin::Label-->
            <label for="quantity" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1"> Quantity</span>
                <span class="red-star">*</span>
            </label>
            <!--end::Label-->
            <input id="quantity" type="number" class="form-control form-control-solid" placeholder=" " name="quantity"
                   value=""/>
        </div>



            <div class="col-sm-12 pb-3 p-2">
                <label for="desc" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                    <span class="mr-1">Description</span>
                </label>
                <textarea name="desc" id="desc" class="form-control" rows="5"></textarea>
            </div>







    </div>
</form>
<script>
    $('.dropify').dropify();

</script>
<script>
    ClassicEditor
        .create(document.querySelector('#desc'))
        .catch(error => {
            console.error(error);
        });

</script>
