const startTransaction = (token, eventid) => {
    // POST TRANSACTION WITH FETCH TO /services/api/transactions
    return {
        async start() {
            // disabled buutton ini
            this.disabled = true;
            const data = Alpine.raw(this.tickets);
            const response = await fetch(
                "/service/api/transaction/" + eventid,
                {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({
                        _token: token,
                        data,
                    }),
                }
            );

            // Wait for the JSON response and log it
            const responseData = await response.json();
            if (responseData.status == "error") {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: responseData.message,
                });
            } else {
                paymentHandler(
                    responseData.message.booking_uuid,
                    eventid,
                    responseData.message.token,
                    token
                ).pay();
            }
        },
    };
};

function paymentHandler(bookingid, eventid, snapToken, token) {
    return {
        pay() {
            snap.pay(snapToken, {
                onSuccess: function (result) {
                    console.log("success");
                    console.log(result);
                    payment(bookingid, eventid, result, token);
                },
                onPending: function (result) {
                    console.log("pending");
                    console.log(result);
                    payment(bookingid, eventid, result, token);
                },
                onError: function (result) {
                    console.log("error");
                    console.log(result);
                },
                onClose: function (result) {
                    console.log(result);
                    console.log(
                        "customer closed the popup without finishing the payment"
                    );
                },
            });
        },
    };
}

const payment = async (bookingid, eventid, data, token) => {
    const response = await fetch(
        "/service/api/transaction/" + eventid + "/pay",
        {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                _token: token,
                data,
                booking_uuid: bookingid,
            }),
        }
    );

    // Wait for the JSON response and log it
    const responseData = await response.json();

    if (responseData.status === "success") {
        //    redirect to urll google
        window.location.href = `/transaction/${responseData.message.uuid}`;
    }
};

function countdown(date, status) {
    return {
        targetDate: new Date(date),
        minutes: 0,
        seconds: 0,
        startCountdown() {
            this.updateCountdown();
            setInterval(() => {
                this.updateCountdown();
            }, 1000);
        },
        updateCountdown() {
            const now = new Date();
            const distance = this.targetDate - now;
            this.minutes = Math.floor(
                (distance % (1000 * 60 * 60)) / (1000 * 60)
            );
            this.seconds = Math.floor((distance % (1000 * 60)) / 1000);

            if (distance < 0) {
                clearInterval(this);
                this.minutes = 0;
                this.seconds = 0;
                if (status) {
                    location.reload();
                }
            }
        },
    };
}
