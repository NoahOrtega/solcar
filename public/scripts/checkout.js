function sendPaymentDataToAnet() {
    var authData = {};
	authData.clientKey = clientKey
	authData.apiLoginID = apiLoginID

    let fname = document.getElementById("firstname").value;
    let lname = document.getElementById("lastname").value;
    let fullName = fname+" "+lname;

    var cardData = {};
	cardData.cardNumber = document.getElementById("cardnumber").value;
	cardData.month = document.getElementById("expirationmonth").value;
	cardData.year = document.getElementById("expirationyear").value;
	cardData.cardCode = document.getElementById("securitycode").value;
	cardData.zip = document.getElementById("zip").value;
	cardData.fullName = fullName;

    var secureData = {};
	secureData.authData = authData;
	secureData.cardData = cardData;

    Accept.dispatchData(secureData, responseHandler);
}

function responseHandler(response) {
    if (response.messages.resultCode==="Error") {
        for (let index = 0; index < response.messages.message.length; index++) {
            console.log(
                response.messages.message[index].code + ": " +
                response.messages.message[index].text
            );
        }
    } else {
        var data = response.opaqueData;
        data.email = document.getElementById("email").value;
        data.phone = document.getElementById("phone").value;
        data.firstName = document.getElementById("firstname").value;
        data.lastName = document.getElementById("lastname").value;
        data.company = document.getElementById("company").value;
        data.address = document.getElementById("street").value +" "+ document.getElementById("apartment").value;
        data.city = document.getElementById("city").value;
        data.zip = document.getElementById("zip").value;
        confirmPayment(data);
    }
}

function confirmPayment(data) {
    const url = "/pay/checkout/confirm";
    const requestOptions = {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-Token": myCSRF,
        },
        body: JSON.stringify(data),
    };

    fetch(url, requestOptions)
        .then((response) => {
            if (!response.ok) {
                throw new Error(response);
            }
            return response.json(); // Parse response body as JSON
        })
        .then((data) => {
            console.log("Checkout Response:", data);
        })
        .catch((error) => {
            console.error("Unable to confirm payment", error);
        });
}

