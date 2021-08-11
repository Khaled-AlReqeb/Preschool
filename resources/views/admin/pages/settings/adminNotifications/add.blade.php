    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{admin('Send Notification')}}</h5>
                </div>
                <div class="modal-body">
                    <!--begin: Code-->
                    <form class="form"  id="add_form">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>{{admin('Image')}}</label>
                                <div class="input-group">
                                    <div class="image-input image-input-empty image-input-outline"
                                            id="kt_user_edit_avatar"
                                            style="background-image: url('{{defaultImage()}}')">
                                        <div class="image-input-wrapper"></div>
                                        <label
                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                            data-action="change" data-toggle="tooltip" title=""
                                            data-original-title="Change avatar">
                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                            <input type="file" name="icon"
                                                    accept=".png, .jpg, .jpeg"/>
                                            <input type="hidden" name="profile_avatar_remove"/>
                                        </label>
                                        <span
                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                            data-action="cancel" data-toggle="tooltip"
                                            title="Cancel avatar">
                                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                            </span>
                                        <span
                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                            data-action="remove" data-toggle="tooltip"
                                            title="Remove avatar">
                                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>{{admin('Title')}}</label>
                                <span style="color: red;"> * </span>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="title">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="">{{admin('Way')}}</label>
                                <span style="color: red;"> * </span>
                                <div class="input-group">
                                    <select name="channels[]" id="channels" class="form-control form-control-lg form-control-solid select2" multiple="multiple">
                                        <option value="firebase">{{admin('Firebase Notification')}}</option>
                                        <option value="email">{{admin('Email Notification')}}</option>
                                        <option value="whatsapp">{{admin('Whatsapp Notification')}}</option>
                                        <option value="sms">{{admin('SMS Notification')}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label class="">{{admin('User type')}}</label>
                                <span style="color: red;"> * </span>
                                <select name="user_type" class="form-control" id="user_type">
                                    <option value="">{{admin('Select...')}}</option>
                                    <option value="individual">{{admin('Individual')}}</option>
                                    <option value="group">{{admin('Group')}}</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label class="">{{admin('Users')}}</label>
                                <span style="color: red;"> * </span>
                                <select name="users[]" id="users"  class="form-control form-control-lg form-control-solid select2" multiple="multiple"></select>
                            </div>
                        </div>
                        <div class="form-group ">
                                <label>{{admin('Content')}}</label>
                                <span style="color: red;"> * </span>
                                <textarea name="content" class="form-control" id="content" cols="30" rows="10"></textarea>
                        </div>     
                    </form>                  
                </div>
                <div class="modal-footer">
                <button type="submit" id="save"
                                        class="btn btn-success btn-elevate">{{admin('Send')}}</button>                </div>
            </div>
        </div>
    </div>
    @section('sub_scripts')
    <script>
    $(document).ready(function(){
        $('#channels').select2({
            placeholder: "{{admin('Choose')}}"
        });
        $('#users').select2({
            placeholder: "{{admin('Choose')}}"
        });
    })
    $('#user_type').on('change',function(){
        var user_type = $(this).val();
        feedUsers(user_type);
        
    });
    
    function feedUsers(user_type,myData) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let url = '{{route('admin.loadUsers')}}';
        if(user_type == 'group'){
            url =  '{{route('admin.loadRoles')}}';
        }
        $('#users').empty();
        $('#users').select2({
            placeholder: '{{admin('Choose')}}',
            allowClear: true,
            ajax: {
                url:  url,
                dataType: 'json',
                delay: 250,
                cache: false,
                data: function (params) {
                    return {
                        myData: myData,
                        search: params.term,
                        page: params.page || 1
                    };
                },
                processResults: function (data) {
                    data.page = data.page || 1;
                    return {
                        results: data.items.map(function (item) {
                            return {
                                id: item.id,
                                text:  item.name,
                            }
                        }),
                        pagination: {
                            more: data.pagination
                        }
                    };
                },

            },
        });
    }
    function feedRoles(myData) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
    }
    var KTFormControls = function () {
        // Private functions
        var add = function () {
            console.log('add_form');
            var validation = FormValidation.formValidation(
                document.getElementById('add_form'),
                {
                    fields: {

                        title: {
                            validators: {
                                notEmpty: {
                                    message: "{{admin('Title is required')}}"
                                },
                                stringLength: {
                                    min: 2,
                                    message: "{{admin('Title at least must be 2 digits')}}"
                                }
                            }
                        },
                        content: {
                            validators: {
                                notEmpty: {
                                    message: "{{admin('Content is required')}}"
                                },
                                stringLength: {
                                    min: 2,
                                    message: "{{admin('Content at least must be 2 digits')}}"
                                }
                            }
                        },
                        user_type: {
                            validators: {
                                notEmpty: {
                                    message: "{{admin('User type is required')}}"
                                },
                            }
                        },

                        users: {
                            validators: {
                                notEmpty: {
                                    message: "{{admin('users are required')}}"
                                },
                            },
                        },

                        type: {
                            validators: {
                                notEmpty: {
                                    message: "{{admin('Notification types are required')}}"
                                },
                            },
                        },


                    },

                    plugins: { //Learn more: https://formvalidation.io/guide/plugins
                        trigger: new FormValidation.plugins.Trigger(),
                        // Bootstrap Framework Integration
                        bootstrap: new FormValidation.plugins.Bootstrap(),
                        // Validate fields when clicking the Submit button
                        submitButton: new FormValidation.plugins.SubmitButton(),
                        // Submit the form when all fields are valid
                        // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                    }
                }
            );
            $('#save').on('click', function (e) {
                e.preventDefault();

                validation.validate().then(function (status) {
                    $("#save").click(function () {
                        $("#save").addClass("spinner  spinner-right spinner-sm spinner-ligh");
                        document.getElementById("save").disabled = true;
                    });
                    if (status == 'Valid') {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: "{{ route('admin.settings.admin_notifications.store') }}",
                            data: new FormData($("#add_form")[0]),
                            dataType: 'json',
                            async: false,
                            type: 'POST',
                            processData: false,
                            contentType: false,
                            success: function (e) {
                                if (e['result'] == 'ok') {
                                    $('#addModal').modal('toggle');
                                    toastr.options = {
                                        "closeButton": true,
                                        "debug": false,
                                        "newestOnTop": true,
                                        "progressBar": true,
                                        "positionClass": "toast-top-right",
                                        "preventDuplicates": false,
                                        "onclick": null,
                                        "showDuration": "300",
                                        "hideDuration": "1000",
                                        "timeOut": "5000",
                                        "extendedTimeOut": "1000",
                                        "showEasing": "swing",
                                        "hideEasing": "linear",
                                        "showMethod": "fadeIn",
                                        "hideMethod": "fadeOut"
                                    };
                                    toastr.success(e['message']);
                                    setTimeout(function () {
                                        $(location).attr('href', '{{route('admin.settings.admin_notifications.index')}}');
                                    }, 1500);

                                } else {
                                    toastr.options = {
                                        "closeButton": true,
                                        "debug": false,
                                        "newestOnTop": true,
                                        "progressBar": true,
                                        "positionClass": "toast-top-right",
                                        "preventDuplicates": false,
                                        "onclick": null,
                                        "showDuration": "300",
                                        "hideDuration": "1000",
                                        "timeOut": "5000",
                                        "extendedTimeOut": "1000",
                                        "showEasing": "swing",
                                        "hideEasing": "linear",
                                        "showMethod": "fadeIn",
                                        "hideMethod": "fadeOut"
                                    };
                                    toastr.error(e['message']);
                                    $("#save").removeClass("spinner  spinner-right spinner-sm spinner-ligh");
                                    document.getElementById("save").disabled = false;
                                }


                            },
                            error: function (e) {
                                toastr.options = {
                                    "closeButton": true,
                                    "debug": false,
                                    "newestOnTop": true,
                                    "progressBar": true,
                                    "positionClass": "toast-top-right",
                                    "preventDuplicates": false,
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                };
                                var error = e.responseJSON['errors'];
                                $.each(error, function (i, member) {
                                    for (var i in member) {
                                        toastr.error(member[i]);
                                    }
                                });

                                $("#save").removeClass("spinner  spinner-right spinner-sm spinner-ligh");
                                document.getElementById("save").disabled = false;


                            }
                        });
                    } else {
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": true,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        };
                        toastr.error('{{admin('Please, Insert All Required Items Correctly')}}');
                        $("#save").removeClass("spinner  spinner-right spinner-sm spinner-ligh");
                        document.getElementById("save").disabled = false;
                    }
                });
            });
        }

        return {
            // public functions
            init: function () {
                add();
            }
        };
    }();
    jQuery(document).ready(function () {
        KTFormControls.init();
    });
</script>

    @endsection

