import "flowbite";
import "./dark-mode.js";
import "./sidebar.js";
import Swal from "sweetalert2";

window.swal = Swal;

if (
    localStorage.getItem("color-theme") === "dark" ||
    (!("color-theme" in localStorage) &&
        window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
    document.documentElement.classList.add("dark");
} else {
    document.documentElement.classList.remove("dark");
}
