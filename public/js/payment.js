const startTransaction = (token) => {
    // POST TRANSACTION WITH FETCH TO /services/api/transactions
    return {
        async start() {
            const data = Alpine.raw(this.tickets);
            const response = await fetch("/service/api/transaction", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    _token: token,
                    data,
                }),
            });

            // Wait for the JSON response and log it
            const responseData = await response.json();
            paymentHandler(responseData.message).pay();
        },
    };
};

function paymentHandler(snapToken) {
    return {
        pay() {
            snap.pay(snapToken, {
                onSuccess: function (result) {
                    console.log("Pembayaran berhasil:", result.pdf_url);
                    // Tambahkan logika untuk pembayaran berhasil
                },
                onPending: function (result) {
                    console.log("Pembayaran pending:", result);
                    // Tambahkan logika untuk pembayaran pending
                },
                onError: function (result) {
                    console.log("Pembayaran gagal:", result);
                    // Tambahkan logika untuk pembayaran gagal
                },
            });
        },
    };
}
