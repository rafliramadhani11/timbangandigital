import "./bootstrap";
import "flowbite";
import "./dark-mode.js";
import "./sidebar.js";

if (
    localStorage.getItem("color-theme") === "dark" ||
    (!("color-theme" in localStorage) &&
        window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
    document.documentElement.classList.add("dark");
} else {
    document.documentElement.classList.remove("dark");
}

// var inputTanggalLahir = document.getElementById("tgllahir");
// inputTanggalLahir.addEventListener("change", function () {
//     var selectedDate = new Date(inputTanggalLahir.value);

//     var tanggal = selectedDate.getDate();
//     var bulan = selectedDate.getMonth() + 1;
//     var tahun = selectedDate.getFullYear();

//     console.log("Tanggal: " + tanggal);
//     console.log("Bulan: " + bulan);
//     console.log("Tahun: " + tahun);
// });
