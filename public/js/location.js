window.addEventListener("load", () => {
    getCoordinates();

    // Step 1: Get user coordinates
    function getCoordinates() {
        const options = {
            enableHighAccuracy: true,
            timeout: 5000,
            maximumAge: 0,
        };

        navigator.geolocation.getCurrentPosition(
            (pos) => {
                const { latitude: lat, longitude: lng } = pos.coords;
                getCity(lat, lng);
            },
            (err) => {
                console.warn(`ERROR(${err.code}): ${err.message}`);
                return;
            },
            options
        );
    }

    // Step 2: Get city name
    async function getCity(lat, lng) {
        try {
            const responsne = await fetch("https://api.ipify.org/?format=json");
            const dataresponse = await responsne.json();
            const datas = dataresponse.ip;
            const response = await fetch(
                `/service/api/getcity/?lat=${lat}&long=${lng}&ip=${datas}`
            );
            if (!response.ok) throw new Error("Failed to fetch city data");

            const data = await response.json();

            const city = data.data.toLowerCase().replace(/\s+/g, "-"); // Format city ke slug (contoh: "New York" -> "new-york")

            // Cek apakah URL mengandung path selain "/"
            const currentPath = window.location.pathname;

            if (currentPath === "/") {
                // Redirect ke /{city} jika belum ada path
                window.location.href = `/${city}`;
                return;
            }
        } catch (error) {
            console.error("Error:", error.message);
        }
    }
});
