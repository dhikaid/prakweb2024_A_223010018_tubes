function handleRecommendation() {
    if (!this.prompt) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Tolong isi prompt terlebih dahulu",
        });
        return;
    }

    this.loading = true;
    this.result = "";
    const date = new Date();
    const prompt = `${this.prompt}}`;

    fetch("/service/api/findeventai", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ prompt }),
    })
        .then((response) => response.json())
        .then((data) => {
            if (isValidUrl(data.response)) {
                window.location.href = data.response;
            } else {
                this.result = data.response || "Terjadi kesalahan";
            }
        })
        .catch((error) => {
            console.error("Error:", error);
            this.result = "Terjadi kesalahan. Coba lagi.";
        })
        .finally(() => {
            this.loading = false;
        });
}

function isValidUrl(url) {
    const pattern = /^(https?|ftp):\/\/[^\s/$.?#].[^\s]*$/i;
    return pattern.test(url);
}

document.addEventListener("alpine:init", () => {
    Alpine.data("recommendationChat", () => ({
        open: false,
        loading: false,
        prompt: "",
        city: "",
        result: "",
        handleRecommendation,
    }));
});
