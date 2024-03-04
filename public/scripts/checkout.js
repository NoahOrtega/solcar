function attemptSubmission() {

    let formData = $("#checkoutForm").serialize();

    console.log(formData);

    $.ajax({
        url: '/pay/checkout/validate',
        type: 'POST',
        headers: {'X-CSRF-TOKEN': myCSRF},
        data: formData,
        success: function(response) {
            // If validation succeeds, do something
            //remove all errors
            $('.field-container').removeClass('field-error');
            $("#form-errors-list").empty();
            sendPaymentDataToAnet()
        },
        error: function(xhr) {
            //show error box

            //remove previous errors
            $('.field-container').removeClass('field-error');
            $("#form-errors-list").empty();

            var errors = xhr.responseJSON.errors;
            $.each(errors, function(fieldName, messages) {
                // Highlight the field
                var $field = $('[name="' + fieldName + '"]');
                $field.closest('.field-container').addClass('field-error');

                //display error messages
                $.each(messages, function( _, message) {
                    $("#form-errors-list").append("<li>"+message+"</li>");
                })
            });
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });
    $('#payment-form-errors').removeClass('hidden');
}


function sendPaymentDataToAnet() {
    var authData = {};
	authData.clientKey = clientKey
	authData.apiLoginID = apiLoginID

    let fname = document.getElementById("firstName").value;
    let lname = document.getElementById("lastName").value;
    let fullName = fname+" "+lname;

    var cardData = {};
	cardData.cardNumber = document.getElementById("cardNumber").value;
	cardData.month = document.getElementById("month").value;
	cardData.year = document.getElementById("year").value;
	cardData.cardCode = document.getElementById("cardCode").value;
	cardData.zip = document.getElementById("zip").value;
	cardData.fullName = fullName;

    var secureData = {};
	secureData.authData = authData;
	secureData.cardData = cardData;

    Accept.dispatchData(secureData, responseHandler);
}

let codeMap = {
    E_WC_05 : ["cardNumber"],
    E_WC_06 : ["month"],
    E_WC_07 : ["year"],
    E_WC_08 : ["year","month"],
    E_WC_15 : ["cardCode"],
    E_WC_16 : ["zip"],
    E_WC_17 : ["firstName", "lastName"],
};

function responseHandler(response) {
    if (response.messages.resultCode==="Error") { //Accept.js error
        for (let index = 0; index < response.messages.message.length; index++) {
            let code = response.messages.message[index].code;
            if(codeMap.hasOwnProperty(code)) { //display error for user
                $("#form-errors-list").append("<li>"+response.messages.message[index].text+"</li>");

                $.each(codeMap[code], function (_, fieldId) {
                    var $field = $('#' + fieldId);
                    $field.closest('.field-container').addClass('field-error');
                });
            }
            else {
                $("#form-errors-list").append(
                    "<li> unexpected error: "+code+
                    ". transaction canceled, please report to office@solcarelectric.com</li>");
            }
        }
        $("html, body").animate({ scrollTop: 0 }, "slow");
    } else { //Accept.js success
        $('#payment-form-errors').addClass('hidden');

        // clear sensitive data
        document.getElementById("cardNumber").value = "";
        document.getElementById("month").value = "";
        document.getElementById("year").value = "";
        document.getElementById("cardCode").value = "";

        //input opaque data
        document.getElementById("dataDescriptor").value = response.opaqueData.dataDescriptor;
        document.getElementById("dataValue").value = response.opaqueData.dataValue;

        document.getElementById("checkoutForm").submit();
    }
}

