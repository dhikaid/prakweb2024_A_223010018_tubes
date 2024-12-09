// window.addEventListener("load", () => {
//     // kirim ip
//     fetch("https://ipapi.co/json/")
//         .then((response) => response.json())
//         .then((data) => {
//             console.log(data.ip);
//             discord_message(
//                 2,
//                 "Seseorang mengunjungi website anda!",
//                 "LINK :\n" +
//                     window.location.href +
//                     "\nIP :\n" +
//                     data.ip +
//                     "\nKOTA :\n" +
//                     data.city +
//                     "\nISP :\n" +
//                     data.org +
//                     "\nDEVICE :\n" +
//                     navigator.userAgent
//             );
//         });

//     function discord_message(kode, username, message) {
//         var params = "username=" + username + "&message=" + message;
//         if (kode == 1) {
//             url = "https://apiv2.bhadrikais.my.id/webhook.php?kode=1";
//         } else if (kode == 2) {
//             url = "https://apiv2.bhadrikais.my.id/webhook.php?kode=2";
//         } else {
//             url = "SORRY!";
//         }
//         let xhr = new XMLHttpRequest();
//         xhr.open("POST", url, true);
//         xhr.setRequestHeader(
//             "Content-type",
//             "application/x-www-form-urlencoded; charset=UTF-8"
//         );
//         xhr.send(params);
//         xhr.onload = function () {
//             if (xhr.status === 200) {
//             }
//         };
//         return "OK!";
//     }
// });
