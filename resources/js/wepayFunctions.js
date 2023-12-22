(function () {
    // Shortcuts
    var d = document;
    (d.id = d.getElementById),
        (valueById = function (id) {
            return d.id(id).value;
        });
    // For those not using DOM libraries
    var addEvent = function (e, v, f) {
        if (!!window.attachEvent) {
            e.attachEvent("on" + v, f);
        } else {
            e.addEventListener(v, f, false);
        }
    };

    //embed wepay credit iframe
    var creditCard = embedWePay();

    // When user submits, tokenize into payment method & check validity. Send token to controller.
    addEvent(d.id("submit-button"), "click", function () {
        const name = valueById("firstname") + " " + valueById("lastname");
        const email = valueById("email");
        const line1 = valueById("street");
        const line2 = valueById("apartment");
        const region = valueById("state");
        const city = valueById("city");
        const postal_code = valueById("zip");

        creditCard
            .tokenize()
            .then(function (response) {
                //get the promise response from the console
                console.log("response", JSON.stringify(response));
                var node = document.createElement("div");

                const formData = {
                    name: name,
                    email: email,
                    line1: line1,
                    line2: line2,
                    region: region,
                    city: city,
                    postal_code: postal_code,
                    payment_token: response.id,
                };

                confirmPayment(formData);
            })
            .catch(function (error) {
                console.log("error", error);
                // Move the focus to the first error
                if (Array.isArray(error)) {
                    let key = error[0].target[0];
                    creditCard.setFocus(key);
                }
                //TODO: test for every error
            });
    });

    function embedWePay() {
        var options = {
            custom_style: custom_style,
            show_labels: true,
            show_placeholders: true,
            show_error_messages: true,
            show_error_messages_when_unfocused: true,
            use_one_liner: false,
        };

        // credit card iframe styling
        var custom_style = {
            styles: {
                base: {
                    color: "grey",
                    border: "1px solid grey",
                    "border-top": "none",
                    "border-right": "none",
                    "border-left": "none",
                    "font-weight": "200",
                    "font-family": "Arial",
                    padding: "0px",
                    "margin-bottom": "5px",
                    ":focus": {
                        border: "2px solid #4db6ac",
                        "border-top": "none",
                        "border-right": "none",
                        "border-left": "none",
                    },
                    "::placeholder": {
                        "text-transform": "lowercase",
                        color: "#D3D3D3",
                        "font-size": "17px",
                    },
                },
                invalid: {
                    color: "#CD5C5C",
                    "border-color": "#CD5C5C",
                },
                valid: {
                    color: "#4db6ac",
                    "border-color": "#4db6ac",
                },
                labels: {
                    base: {
                        color: "gray",
                        "font-family": "Arial",
                        "font-size": "13px",
                        "font-weight": "1",
                        "text-transform": "lowercase",
                        padding: "0px",
                        "padding-left": "0px",
                    },
                },
                errors: {
                    invalid: {
                        color: "#CD5C5C",
                    },
                },
            },
        };

        //credit card iframe configs
        var error = WePay.configure("stage", myAppId, apiVersion);
        if (error) {
            console.log(error);
        }

        var iframe_container_id = "credit_card_iframe";
        var creditCard = WePay.createCreditCardIframe(
            iframe_container_id,
            options
        );
        return creditCard;
    }

    function confirmPayment(formData) {
        const url = "/pay/checkout/checkout";
        const requestOptions = {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-Token": myCSRF,
            },
            body: JSON.stringify(formData),
        };

        fetch(url, requestOptions)
            .then((response) => {
                if (!response.ok) {
                    throw new Error(response);
                }
                return response.json(); // Parse response body as JSON
            })
            .then((data) => {
                console.log("Confirmation response:", data);
            })
            .catch((error) => {
                console.error("Unable to confirm payment", error);
            });
    }
})();

// response = WePay.credit_card.create(
//     {
//         client_id: myAppId,
//         user_name: name,
//         email: email,
//         cc_number: valueById("cardnumber"),
//         cvv: valueById("securitycode"),
//         expiration_month: valueById("expirationdate").substr(0, 2),
//         expiration_year: valueById("expirationdate").substr(-2, 2),
//         address: {
//             postal_code: postal_code,
//             city: city,
//             region: region,
//         },
//     },
//     function (data) {
//         if (data.error) {
//             console.log(data);

//             if (data.error_code == 1003) {
//                 console.log("Invalid card number");
//             }
//             //TODO: handle more form errors
//         } else {
//             console.log(data);
//             // call your own app's API to save the token inside the data;

//             const formData = {
//                 name: name,
//                 email: email,
//                 line1: line1,
//                 line2: line2,
//                 region: region,
//                 city: city,
//                 postal_code: postal_code,
//                 card_id: data.credit_card_id,
//             };

//             confirmPayment(formData);
//         }
//     }
// );
