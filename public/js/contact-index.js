    $(function() {
        // csrf token for ajax
        var table = $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "contact",
            columns: [{
                    data: 'checkbox'
                },
                {
                    data: 'name'
                },
                {
                    data: 'email'
                },
                {
                    data: 'phone'
                },
                {
                    data: 'action'
                },

            ]
        });

        //display modal form
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#addrecord').on('click', function() {
            $("#contactform").trigger("reset");
            $('#inputid').val('');
            $("#contact_id").val('');
            $("#modalheading").html("ADD CONTACT");
            $('#modal').modal('show');
            $('#showdetails').removeClass('d-none');
            $('#showdetails').addClass('d-none');
            $('#submitbtn').removeClass("d-none");
        });

        //save(store) modal data
        $('#submitbtn').on('click', function() {
            // alert('save');

            var id = $('#inputid').val()

            if ($('#inputid').val() == '') {
                $.ajax({
                    data: $("#contactform").serialize(),
                    url: "{{ route('contact.store') }}",
                    type: "POST",
                    success: function(data) {
                        $("#contactform").trigger("reset");
                        $('#modal').modal('hide');
                        table.draw();
                    }
                });
            } else {

                $.ajax({
                    data: $("#contactform").serialize(),
                    url: "contact/" + id,
                    type: "PATCH",
                    success: function(data) {
                        $("#contactform").trigger("reset");
                        $('#modal').modal('hide');
                        table.draw();
                    }
                });
            }
        });

        //edit

        $('body').on('click', '.editContact', function() {
            // alert('asdf');
            $("#modalheading").html("EDIT CONTACT");
            $('#modal').modal('show');
            $('#modalbody').removeClass('d-none');
            $('#showdetails').addClass('d-none');
            $('#submitbtn').removeClass("d-none");

            var contactId = $(this).data("id");
            console.log(contactId);
            // alert($contactId);

            $.ajax({
                url: "{{ route('contact.index') }}" + '/' + contactId + '/edit',
                type: "GET",
                success: function(data) {

                    //console.log(data);

                    $('#name').val(data.name);
                    $('#email').val(data.email);
                    $('#phone').val(data.phone);
                    $('#inputid').val(data.id);

                }
            });
        });

        //show

        $('body').on('click', '.showContact', function() {
            $('#showdetails').modal('show');
            $('#modalbody').val('');
            var contactId = $(this).data("id");

            $.ajax({
                url: 'contact/' + contactId,
                type: 'GET',
                success: function(data) {
                    console.log(data);
                    $('#sname').text(data.name);
                    $('#semail').text(data.email);
                    $('#sphone').text(data.phone);
                }

            });
        });

        //delete
        $('body').on('click', '.deleteContact', function() {
            var contact_id = $(this).data("id");
            if ((confirm("Are You sure want to delete !")) == true) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('contact.store') }}" + '/' + contact_id,
                    success: function(data) {
                        table.draw();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            }
        });

        // mass delete
        //main checkbox select/deselect -> all value select
        $(document).on('change', '#checkbox', function() {
            if ($(this).is(':checked', true)) {
                $('.delete').each(function() {
                    this.checked = true;
                });
            } else {
                $('.delete').each(function() {
                    this.checked = false;
                });
            }
        });

        //all value select -> main checkbox also select

        // $(document).on('click','.delete',function(){
        //     if($('.delete:ckecked').length == $('.delete').length){
        //         $('#checkbox').each('checked',true);
        //     }else{
        //         $('#checkbox').each('checked',false);
        //     }
        // });

        //Alldelete button
        $('#deleteAllBtn').on('click', function() {

            var idsArr = [];
            $(".delete:checked").each(function() {
                idsArr.push($(this).attr('data-id'));
            });
            //console.log(idsArr);
            if (idsArr.length <= 0) {
                //console.log('idsArr.lenght');
                alert("Please select atleast one record to delete.");
            } else {
                if (confirm("Are you sure, you want to delete the selected records?")) {
                    var contactId = idsArr.join(",");
                    //console.log(contactId);
                    $.ajax({
                        type: "POST",
                        url: "{{ route('contact.multipledelete') }}",
                        data: "allIds=" + contactId,
                        success: function(data) {
                            table.draw();
                        }
                    });
                }
            }
        });

        //mass update
        $('#updateAll').on('click', function() {
            var idsArr = [];
            $(".delete:checked").each(function() {
                idsArr.push($(this).attr('data-id'));
            });
            console.log(idsArr);
            if (idsArr.length <= 0) {
                alert("please select atleast one record for update");
                // $('#updatemodal').modal('hide');
            } else {
                $(document).on('click', '#massupdate', function() {
                   var contactId = idsArr.join(",");
                   //console.log(contactId);
                   var name = $('#name').val();
                   var email = $('#email').val();
                   var phone = $('#phone').val();
                    //var formdata = $('#updatemass').serialize();
                    console.log(name , email , phone);
                    $.ajax({
                        type: "POST",
                        url: "{{route('contact.multipleupdate')}}",
                        data: {
                            id: contactId,
                            name: name,
                            email: email,
                            phone: phone,
                        },
                        success: function (data) {
                            $('#updatemodal').modal('hide');
                            table.draw();
                        }
                    });
                });
            }
        });

    });
//


