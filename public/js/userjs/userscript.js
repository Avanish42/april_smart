$(document).ready(function() {

if(status == 100){
    alertNotify(message);
}

    $(".tempbillitemselect").combobox({
        selected: function(event, ui) {
            $('#log').text('selected ' + $("#combobox").val());
        }
    });

    // $('.myElements').each(function() {
    //     var elem = $(this);
    //
    //     // Save current value of element
    //     elem.data('oldVal', elem.val());
    //
    //     // Look for changes in the value
    //     elem.bind("propertychange change click keyup input paste", function(event){
    //         // If value has changed...
    //         if (elem.data('oldVal') != elem.val()) {
    //             // Updated stored value
    //             elem.data('oldVal', elem.val());
    //
    //             // Do action
    //         ....
    //         }
    //     });
    // });

    jQuery.browser = {};
    jQuery.browser.msie = false;
    jQuery.browser.version = 0;
    if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
        jQuery.browser.msie = true;
        jQuery.browser.version = RegExp.$1;
    }
    $('.cheque_datepicker').datepicker();

    $('#completed-cheque').DataTable({
        "bPaginate": true,
        "processing": true,
        "bServerSide": true,
        buttons: [
            'copy','csv', 'excel', 'pdf', 'print'
        ],
        dom: 'Blfrtip',
        aoColumnDefs: [
            {
                bSortable: false,
                aTargets: [ 4,5 ]
            }
        ],
        "lengthMenu": [[100, 200, 500, -1], [100, 200, 500, "All"]],
        "ajax":{
            "url": APP_URL+"/cheque-completed-post",
            "dataType": "json",
            "type": "POST",
            "data":{ _token: token}
        },
        "columns": [
            { "data": "created_at" },
            { "data": "retailer_name" },
            { "data": "cheque_number" },
            { "data": "Cheque_Date" },
            // { "data": "cheque_amount" },
            { "data": "bank_name" },
            { "data": "amount" },
            { "data": "billno" },
            { "data": "allocationNo" },
            { "data": "remark" },
            { "data": "action" }
        ],



    });


    window.setTimeout(function() {
        $(".alert").hide();
    }, 3000);

    $('#penalty-modal').on('hidden.bs.modal', function () {
        $(this).find("input[type=text], select").val("");
    })

    $(document).on('click','#chequeBounce',function () {
            var id = $(this).attr('data-react-id');
            $('#bounce_cheque_id').val(id)
            var that = $(this);
            $('#penalty-modal').modal('show');
    })

    $(document).on('change','#penaltySelect',function () {
     var that = $(this)
        var id = $(this).val();
            if(id == ''){
                // $(this).parent().next().find('.penaltyBox').val('');
                 $('#penalty_amount').val('');

            }
            else{
                $('.loading').css("display", 'block');
                $.ajax({
                    type: "GET",
                    url: APP_URL + '/penalty-detail/' + id,
                    data: id,
                    success: function (resultData) {
                        $('#penalty_amount').val(resultData.amount);
                        // that.parent().next().find('.penaltyBox').val(resultData.amount);
                        $('.loading').css("display", 'none');
                    }
                });
            }
    });

    $(document).on('click','#chequeCleared',function () {
        if (confirm("Are you sure the cheque was cleared") == true) {

            $('.loading').css("display", 'block');

            var id = $(this).attr('data-react-id');
            var that = $(this);
            $.ajax({
                type: "GET",
                url: APP_URL + '/cleared-cheque/' + id,
                data: id,
                success: function (resultData) {
                    if (resultData.code == 100) {
                       $('p.successmessage').text(resultData.message);
                        $('.ajaxsuccess').show();
                        that.parent().closest('tr').remove();
                     }
                    $('.loading').css("display", 'none');
                }
            });

        } else {
            return false
        }
    })


    $('.selectemp').on('change', function () {
        var exist = false;
        var element = $('.empname')
        element.each(function () {
            var x = $(this).data('react');
            var y = ($('.selectemp option:selected ').val());
            if (x == y) {
                exist = true;
            }
        })
        if (exist) {
            alert('value exist');
        } else {
            var valueemp = $('.selectemp option:selected').val();
            var txt = $('.selectemp option:selected ').text();
            $('.addemploye').after("<a class='dropdown-item empname' data-react='" + valueemp + "'href='javascript:void(0)'>" + txt + '<span style="float: right" class="remove-emp">x</span></a>');
            $('.hidden-employee').append("<input type='hidden' name='emp-" + valueemp + "' value='" + valueemp + "' class='emp-" + valueemp + "' data-react='" + valueemp + "' </input>");
            $('#sync-all-bills').prop('disabled',false);
        }


    });
    $(document).on('click', '.remove-emp', function () {
        var empVal = $(this).parent().attr('data-react');
        $('.hidden-employee').find('.emp-' + empVal).remove();
        $(this).parent().remove();
        var l = $('.all-employees a').length;
        if(l == 0){
            $('#sync-all-bills').prop('disabled',true);
        }
    });

    $('#allocationNo').typeahead({
        source: Allocation
    });

    $('#billNo').typeahead({
        source: Bills
    });

    $('.unallocatatedBills').typeahead({
        source: UnallocatedBills
    })

    $('.pastallocation').typeahead({
        source: pastallocationBills
    })

    $('.bank_name_suggest').typeahead({
        source: bankName,
        // onSelect: function (item) {
        //     console.log(item)
        // }
      
    })

    $('.pendingbouncecheque').typeahead({
        source: unallocatedcheques
    })

    $(document).on('click', '#sync-all-bills', function () {
        $('.loading').css("display", 'block');
        var empIdis = [];
        $('.all-employees a').each(function () {
            empIdis.push($(this).attr('data-react'));
        })
            var formData = {
                'id':empIdis,
                '_token':token
            };
        $.ajax({
            url: APP_URL + "/send-notification-to-field",
            type: "post",
            data: formData,
            success: function (resultData) {

                if (resultData.code == 100) {

                    $('.successmessage').text(resultData.message);
                    $('.ajaxsuccess').show();
                }

                $('.loading').css("display", 'none');

            }
        });

    });


    $('.addNewAllocation').click(function (e) {
        e.preventDefault();
        $('.loading').css("display", 'block');
        // console.log("click");

        var toValue = $('.toValue').val();
        var fromValue = $('.fromValue').val();
        var singleValue = $('.singleValue').val();
        var formData = $('#formData').serialize();


        // console.log(formData);
        $.ajax({
            url: APP_URL + "/allocateBillsByAjax",
            type: "post",
            data: formData,
            success: function (resultData) {
                if (resultData.code == 400) {
                    alertNotify(resultData.message);
             }
                else {
                    $('#currentSuppluId').nextAll().remove();
                    $('#currentSuppluId').after(resultData);

                }
                $('.loading').css("display", 'none');

            }
        });
        //saveData.error(function() { console.log("error");});

    });

function alertNotify(message){
    $.notify({
            message: message
        },
        {
            allow_dismiss: true,
            newest_on_top: true,
            timer: 1000,
            type: "danger",
            placement:{
                from: 'top',
                align: 'right'
            },
            animate: {
                enter: 'animated rotateOutInRight',
                exit: 'animated rotateOutUpRight '
            }
        });
}

    $(document).on('click', '.allocationid', function () {
        // console.log("test");

        var data1 = $(this).attr('data-reactid');
        var data2= $(this).attr(('data-reactAllocation'));
        // console.log(data);

        var data = {
              "_token":token,
            "id": data1,
            'allocation':data2
        }


        $.ajax({
            url: APP_URL + "/removeCurrentAllocationByAjax",
            type: "post",
            data: data,
            success: function (resultData) {
                if (resultData.code == 400) {
                    // console.log('if');

                    $('.errormessage').text(resultData.message);
                    $('.ajaxerror').show();
                }

                else if (resultData.code == 100) {
                    // console.log('else if');

                    $('.successmessage').text(resultData.message);
                    $('.ajaxsuccess').show();
                }

                else {
                    // console.log('else');
                    $('#currentSuppluId').nextAll().remove();
                    $('#currentSuppluId').after(resultData);

                }


            }
        });

        //
        // $('.allocationid').click( function (e) {
        //
        //        e.preventDefault();
        //    // var data= $(this).val();
        //     console.log("test");
        // });


    });

    $(document).on('click', '.pastAllocation', function (e) {

        // console.log('pastallocationform');
            e.preventDefault();
        $('.loading').css("display", 'block');

        var formpastData = $('.pastallocationform').serialize();
        //console.log(formpastData);
      //  return false;

        $.ajax({
            url: APP_URL + "/pastAllocateBillsByAjax",
            type: "post",
            data: formpastData,
            success: function (resultData) {
                if (resultData.code == 400) {
                    alertNotify(resultData.message);
                }
                else {
                    $('#pastSupplyId').nextAll().remove();
                    $('#pastSupplyId').after(resultData);

                  }


                $('.loading').css("display", 'none');
            }
        });//ajax end


    });

    $(document).on('click', '.allocationidpast', function () {
        // console.log("test");

        var data1 = $(this).attr('data-reactid');
        var data2= $(this).attr(('data-reactAllocation'));
        console.log(data);
            return false;
        var data = {
            "_token":token,
            "id": data1,
            'allocation':data2
        }
        $(document).on('click', '.bounceallocation', function (e) {

            // console.log('pastallocationform');
            e.preventDefault();
            $('.loading').css("display", 'block');

            var formpastData = $('.bouncechequeallocationform').serialize();
            //console.log(formpastData);
            //  return false;

            $.ajax({
                url: APP_URL + "/bounce-cheque-allocation",
                type: "post",
                data: formpastData,
                success: function (resultData) {
                    if (resultData.code == 400) {
                        alertNotify(resultData.message);
                    }
                    else {
                        $('#pastSupplyId').nextAll().remove();
                        $('#pastSupplyId').after(resultData);

                    }


                    $('.loading').css("display", 'none');
                }
            });//ajax end
        });


        $.ajax({
            url: APP_URL + "/removePastAllocationByAjax",
            type: "post",
            data: data,
            success: function (resultData) {
                if (resultData.code == 400) {
                    // console.log('if');

                    $('.errormessage').text(resultData.message);
                    $('.ajaxerror').show();
                }

                else if (resultData.code == 100) {
                    // console.log('else if');
                    $('.successmessage').text(resultData.message);
                    $('.ajaxsuccess').show();
                }
                else {
                    // console.log('else');
                    $('#currentSuppluId').nextAll().remove();
                    $('#currentSuppluId').after(resultData);

                }


            }
        });

        //
        // $('.allocationid').click( function (e) {
        //
        //        e.preventDefault();
        //    // var data= $(this).val();
        //     console.log("test");
        // });


    });

});