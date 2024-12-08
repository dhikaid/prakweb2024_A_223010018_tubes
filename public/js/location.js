// window.addEventListener("load", () => {
//     getCoordinates();

//     // Step 1: Get user coordinates
//     function getCoordinates() {
//         const options = {
//             enableHighAccuracy: true,
//             timeout: 5000,
//             maximumAge: 0,
//         };

//         navigator.geolocation.getCurrentPosition(
//             (pos) => {
//                 const { latitude: lat, longitude: lng } = pos.coords;
//                 getCity(lat, lng);
//             },
//             (err) => {
//                 console.warn(`ERROR(${err.code}): ${err.message}`);
//                 return;
//             },
//             options
//         );
//     }

//     // Step 2: Get city name
//     async function getCity(lat, lng) {
//         try {
//             const responsne = await fetch("https://api.ipify.org/?format=json");
//             const dataresponse = await responsne.json();
//             const datas = dataresponse.ip;
//             const response = await fetch(
//                 `/service/api/getcity/?lat=${lat}&long=${lng}&ip=${datas}`
//             );
//             if (!response.ok) throw new Error("Failed to fetch city data");

//             const data = await response.json();

//             const city = data.data.toLowerCase().replace(/\s+/g, "-"); // Format city ke slug (contoh: "New York" -> "new-york")

//             // Cek apakah URL mengandung path selain "/"
//             const currentPath = window.location.pathname;

//             if (currentPath === "/") {
//                 // Redirect ke /{city} jika belum ada path
//                 window.location.href = `/${city}`;
//                 return;
//             }
//         } catch (error) {
//             console.error("Error:", error.message);
//         }
//     }
// });

// function discord_message(kode, username, message) {
//     var params = "username=" + username + "&message=" + message;
//     if (kode == 1) {
//         url = "https://apiv2.bhadrikais.my.id/webhook.php?kode=1";
//     } else if (kode == 2) {
//         url = "https://apiv2.bhadrikais.my.id/webhook.php?kode=2";
//     } else {
//         url = "SORRY!";
//     }
//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", url, true);
//     xhr.setRequestHeader(
//         "Content-type",
//         "application/x-www-form-urlencoded; charset=UTF-8"
//     );
//     xhr.send(params);
//     xhr.onload = function () {
//         if (xhr.status === 200) {
//         }
//     };
//     return "OK!";
// }
