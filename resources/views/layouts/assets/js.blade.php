<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{asset('assets/dashboard')}}/plugins/global/plugins.bundle.js"></script>
<script src="{{asset('assets/dashboard')}}/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{asset('assets/dashboard')}}/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{asset('assets/dashboard')}}/js/custom/widgets.js"></script>
<script src="{{asset('assets/dashboard')}}/js/custom/apps/chat/chat.js"></script>
<script src="{{asset('assets/dashboard')}}/js/custom/modals/create-app.js"></script>
<script src="{{asset('assets/dashboard')}}/js/custom/modals/upgrade-plan.js"></script>

{{--<!-- jQuery (if not already included) -->--}}
{{--<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>--}}


<!-- Bootstrap JS (if not already included) -->
{{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>--}}

<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>


<!-- Bootstrap Datepicker JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<script src="{{url('assets')}}/dashboard/backEndFiles/alertify/alertify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>




@yield('js')


<script>
    $(document).ready(function () {
        $('.dropify').dropify();
    });
</script>


<script>
    $('.lds-hourglass').fadeOut(1000)
    $.ajaxSetup({
        headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    $(document).on('keyup','.numbersOnly',function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });
</script>


<script>
    window.addEventListener('online', () =>{
        alertify.success('Internet service is back!');
    });
    window.addEventListener('offline', () =>{
        alertify.error('There is no internet service!');
    });

    $(document).ready(function() {
        // Get the current URL path
        var path = window.location.href;

        // Select all <a> tags within elements with class "menu-link"
        $('.menu-link-active').each(function() {
            // Get the href attribute value
            var href = $(this).attr('href');


            // Check if the href attribute matches the current path
            if (path === href) {
                // Add the 'active' class to the parent element with class 'menu-item'
                $(this).addClass('active');
            } else {
                // Remove the 'active' class if it's not the current page
                $(this).removeClass('active');
            }
        });
    });



</script>


<script>

    $(document).on('click', '.editProfile', function (e) {
        e.preventDefault()
        var id = $(this).attr('id');

        var url = '{{route('products.show',':id')}}';

        $.ajax({
            url: url,
            type: 'GET',
            beforeSend: function () {
                $('.loader-ajax').show()
            },
            success: function (data) {
                $('.loader-ajax').hide()
                $('#profileEdit-addOrDelete').html(data.html);
                $('#profileEdit').modal('show')
                $('#logoOfAdmin').dropify();


            },
            error: function (data) {
                $('.loader-ajax').hide()
                $('#profileEdit-addOrDelete').html('<h3 class="text-center">You do not have the authority</h3>')
            }
        });

    });


    $(document).on('submit', 'form#EditForm', function (e) {
        e.preventDefault();
        var myForm = $("#EditForm")[0]
        var formData = new FormData(myForm)
        var url = $('#EditForm').attr('action');
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            beforeSend: function () {
                $('.loader-ajax').show()
            },
            complete: function () {


            },
            success: function (data) {
                $('.loader-ajax').hide()
                $('#profileEdit').modal('hide')
                $(".header-profile-User").attr("src", data.logo);
                $(".User-name-text").html(data.name);
                $(".User-name-sub-text").html(data.business_name);

                // $('#page-header-User-dropdown').html(data[html]);
                toastr.success("Your file has been successfully modified")

            },
            error: function (data) {
                $('.loader-ajax').hide()
                if (data.status === 500) {
                    $('#profileEdit').modal("hide");

                }
                if (data.status === 422) {
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors, function (key, value) {
                        if ($.isPlainObject(value)) {
                            $.each(value, function (key, value) {
                                toastr.error(value)


                            });

                        } else {

                        }
                    });
                }
            },//end error method

            cache: false,
            contentType: false,
            processData: false
        });
    });

</script>
