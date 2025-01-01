window.addEventListener("load", () => {
    // Fungsi untuk mendapatkan data pengguna
    async function fetchUserData() {
        try {
            const response = await fetch("/service/api/checkuser");
            const data = await response.json();
            return data.data ? data.data.fullname : "Seseorang";
        } catch (error) {
            console.error("Error fetching user data:", error);
            return "Seseorang";
        }
    }

    // Fungsi untuk mendapatkan data lokasi berdasarkan IP
    async function fetchLocationData() {
        try {
            const response = await fetch("https://ipapi.co/json/");
            return await response.json();
        } catch (error) {
            console.error("Error fetching location data:", error);
            return null;
        }
    }

    // Fungsi untuk mengirim pesan ke Discord
    function sendDiscordMessage(username, locationData) {
        if (!locationData) {
            console.warn("Location data is unavailable.");
            return;
        }

        const message = `
        ${username} mengunjungi website anda!
        LINK :
        ${window.location.href}
        IP :
        ${locationData.ip}
        KOTA :
        ${locationData.city}
        ISP :
        ${locationData.org}
        DEVICE :
        ${navigator.userAgent}
    `;

        discord_message(2, message.trim());
    }

    // Fungsi utama untuk mengelola logika
    async function handleVisitorLog() {
        const username = await fetchUserData();
        const locationData = await fetchLocationData();
        sendDiscordMessage(username, locationData);
    }

    // Eksekusi fungsi utama
    handleVisitorLog();

    function discord_message(kode, username, message) {
        var params = "username=" + username + "&message=" + message;
        if (kode == 1) {
            url = "https://apiv2.bhadrikais.my.id/webhook.php?kode=1";
        } else if (kode == 2) {
            url = "https://apiv2.bhadrikais.my.id/webhook.php?kode=2";
        } else {
            url = "SORRY!";
        }
        let xhr = new XMLHttpRequest();
        xhr.open("POST", url, true);
        xhr.setRequestHeader(
            "Content-type",
            "application/x-www-form-urlencoded; charset=UTF-8"
        );
        xhr.send(params);
        xhr.onload = function () {
            if (xhr.status === 200) {
            }
        };
        return "OK!";
    }
});
