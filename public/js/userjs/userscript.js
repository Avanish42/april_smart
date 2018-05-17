$(document).ready(function() {

$('#suggestInvoice').focus(function () {
    $('#error_invoice').hide();
})
$('#selected_tembill').focus(function () {
    $('#invoice_error').hide();
})

    $("#suggestInvoice").typeahead({
        onSelect: function(item) {
           $('#redirect_slug').attr('data-react-slug' ,item.text);
        },
        ajax: {
            url: APP_URL+"/search-temporary-bill-sale-return",
            timeout: 500,
            displayField: "invoice_no",
            triggerLength: 1,
            method: "get",
            loadingClass: "loading-circle",

        }
    });

    $("#selected_tembill").typeahead({
        onSelect: function(item) {
           $('#jump_to_searched_bill').attr('data-react-slug-bill' ,item.text);
        },
        ajax: {
            url: APP_URL+"/get-all-matched-bill",
            timeout: 500,
            displayField: "invoice_no",
            triggerLength: 1,
            method: "get",
            loadingClass: "loading-circle",

        }
    });
    $(document).on('click','#redirect_slug',function () {
        var slug = $(this).attr('data-react-slug');
        if(slug == ''){
            $('#error_invoice').show();
        }
        else{
            window.location.href = APP_URL+'/temporary-bill/sale-return/'+slug
        }
    });

    $(document).on('click','#jump_to_searched_bill',function () {
        var slugbill = $(this).attr('data-react-slug-bill');
        if(slugbill == ''){
            $('#invoice_error').show();
        }
        else{
            window.location.href = APP_URL+'/temporary-bill/search/'+slugbill
        }
    });


if(status == 100){
    alertNotify(message);
}

    $(".tempbillitemselect").combobox({
        selected: function(event, ui) {
            $('#log').text('selected ' + $("#combobox").val());
        }
    });

var tempProducts = []
    for(var i =0;i>products.length;i++){
            tempProducts.push(products[i].item_name)
    }



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
            {  bSortable: false,
                aTargets: [ 4,5 ]
            },
            { "sClass":"retailer_table","aTargets": [ 1 ] },
            { "sClass":"cheque_num_table","aTargets": [ 2 ] },
            { "sClass":"cheque_amt_table","aTargets": [ 5 ] }
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
            var retailerName = $(this).parent().parent().find('.retailer_table').text();
            var chequeNumber= $(this).parent().parent().find('.cheque_num_table').text();
            var amount = $(this).parent().parent().find('.cheque_amt_table').text();

            $('#bounce_cheque_id').val(id)
            $('#retailer_name_modal').val(retailerName)
            $('#cheque_number_modal').val(chequeNumber)
            $('#cheque_amount_modal').val(amount)
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
    $('.suggest_product').typeahead({
        source:products,
        displayField: 'item_name'

    })
    $('.suggest_retailer_name').typeahead({
        source:retailers,
        displayField: 'retailer_name'

    })
    $('.temporybillsuggest').typeahead({
        source:temporaryBills,
        displayField: 'invoice_no'

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

    $(document).on('click', '.bounceallocation', function (e) {

        // console.log('pastallocationform');
        e.preventDefault();
        $('.loading').css("display", 'block');

        var formpastData = $('.bouncechequeallocationform').serialize();
        //console.log(formpastData);
        //  return false;

        $.ajax({
            url: APP_URL + "/bounce-check-allocation",
            type: "post",
            data: formpastData,
            success: function (resultData) {
                if (resultData.code == 400) {
                    alertNotify(resultData.message);
                }
                else {
                    $('#bounceChequeAllocationId').nextAll().remove();
                    $('#bounceChequeAllocationId').after(resultData);
                    $('.pendingbouncecheque').val('');
                }


                $('.loading').css("display", 'none');
            }
        });//ajax end
    });

    $(document).on('click', '.allocateTempBill', function (e) {

        // console.log('pastallocationform');
        e.preventDefault();
        $('.loading').css("display", 'block');

        var formpastData = $('.temporarybillallocationform').serialize();
        //console.log(formpastData);
        //  return false;

        $.ajax({
            url: APP_URL + "/temporary-bill-allocation",
            type: "post",
            data: formpastData,
            success: function (resultData) {
                if (resultData.code == 400) {
                    alertNotify(resultData.message);
                }
                else {
                    $('#allocatedtemporarybills').nextAll().remove();
                    $('#allocatedtemporarybills').after(resultData);
                    $('.temporybillsuggest').val('');
                }


                $('.loading').css("display", 'none');
            }
        });//ajax end
    });

    $('.allocatebouncecheque').click(function (e) {
        e.preventDefault();
        $('.loading').css("display", 'block');

        var formData = $('.bouncechequeallocationform').serialize();


        // console.log(formData);
        $.ajax({
                url: APP_URL + "/bounce-check-allocation",
            type: "post",
            data: formData,
            success: function (resultData) {
             //    if (resultData.code == 400) {
             //        alertNotify(resultData.message);
             // }
             //    else {
             //        $('#currentSuppluId').nextAll().remove();
             //        $('#currentSuppluId').after(resultData);
             //
             //    }
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

            return false;
        var data = {
            "_token":token,
            "id": data1,
            'allocation':data2
        }



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