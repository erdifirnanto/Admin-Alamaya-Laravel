// {{-- Animasi JS --}}
window.onload = function () {
    const overlay = document.querySelector(".circle-overlay");
    const mainPage = document.querySelectorAll(".main-page");
    const title = document.getElementById("title");
    const logoBlack = document.getElementById("logo-black"); // Logo hitam (awal)
    const logoWhite = document.getElementById("logo-white"); // Logo putih (setelah animasi)
    const bgWhite = document.getElementById("bg-white"); // Background putih (setelah animasi)

    // Periksa apakah animasi sudah pernah ditampilkan
    const hasAnimated = sessionStorage.getItem("hasAnimated");

    // Jika animasi belum pernah ditampilkan, jalankan animasi
    if (!hasAnimated) {
        // Fungsi untuk mengganti logo
        const changeLogo = () => {
            logoBlack.style.display = "none"; // Sembunyikan logo hitam
            logoWhite.style.display = "block"; // Tampilkan logo putih
        };

        // Hentikan tampilan lingkaran dan halaman utama
        overlay.addEventListener("animationend", (event) => {
            if (event.animationName === "circleExpand") {
                overlay.style.display = "none"; // Sembunyikan lingkaran
                title.style.display = "none"; // Sembunyikan judul setelah lingkaran menutupi layar
                bgWhite.style.display = "none"; // Sembunyikan background putih
                mainPage.forEach((page) => {
                    page.style.display = "block"; // Tampilkan setiap elemen dengan class main-page
                });
                sessionStorage.setItem("hasAnimated", "true"); // Tandai bahwa animasi sudah selesai
            }
        });

        // Deteksi kapan animasi circleExpand dimulai
        overlay.addEventListener("animationstart", (event) => {
            if (event.animationName === "circleExpand") {
                changeLogo(); // Ubah logo saat lingkaran mulai membesar
            }
        });
    } else {
        // Jika animasi sudah pernah ditampilkan, tampilkan langsung halaman utama tanpa animasi
        overlay.style.display = "none";
        title.style.display = "none";
        bgWhite.style.display = "none";
        logoBlack.style.display = "none";
        logoWhite.style.display = "block";
        mainPage.forEach((page) => {
            page.style.display = "block";
        });
    }
};

// End Animasi

// <!-- Clock Start-->
function updateClock() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();

    var period = hours < 12 ? "AM" : "PM";
    hours = hours % 12;
    hours = hours ? hours : 12; // Convert midnight (0 hours) to 12 AM

    hours = hours < 10 ? "0" + hours : hours;
    minutes = minutes < 10 ? "0" + minutes : minutes;
    seconds = seconds < 10 ? "0" + seconds : seconds;

    var currentTime = hours + ":" + minutes + ":" + seconds + " " + period;

    document.getElementById("clock").innerText = currentTime;

    setTimeout(updateClock, 1000);
}

updateClock();
// <!-- End Of Clock -->

// Card Start delay animation
const cards = document.querySelectorAll(".card-home"); // Menargetkan semua kartu
let hoverTimeouts = []; // Array untuk menyimpan timeout untuk setiap kartu

cards.forEach((card, index) => {
    card.addEventListener("mouseover", function () {
        // Tambahkan kelas hover ketika mouse masuk
        card.classList.add("hovered");

        // Hapus timeout sebelumnya jika ada
        if (hoverTimeouts[index]) clearTimeout(hoverTimeouts[index]);

        // Set timeout untuk menghapus kelas setelah 1 menit (60000 ms)
        hoverTimeouts[index] = setTimeout(() => {
            card.classList.remove("hovered");
        }, 1500);
    });
});
// Card End

// Collapse Table
document.querySelectorAll(".toggle-chevron").forEach(function (chevron, index) {
    chevron.addEventListener("click", function () {
        const collapseRow = document.querySelectorAll(".collapse-row")[index];
        const collapseContent = collapseRow.querySelector(".collapse-content");
        const collapseContent1 =
            collapseRow.querySelector(".collapse-content1");

        if (collapseRow.style.display === "none") {
            collapseRow.style.display = "table-row"; // Tampilkan baris terlebih dahulu
            const height = collapseContent.scrollHeight + "px"; // Ambil tinggi asli konten
            collapseContent.style.height = height; // Terapkan tinggi asli untuk animasi expand
            collapseContent1.style.height = height; // Terapkan tinggi asli untuk animasi expand
            this.querySelector(".fas").classList.remove("fa-chevron-down");
            this.querySelector(".fas").classList.add("fa-chevron-up"); // Ubah ikon jadi chevron-up
        } else {
            collapseContent.style.height = "0"; // Set tinggi ke 0 untuk collapse
            collapseContent1.style.height = "0"; // Set tinggi ke 0 untuk collapse
            setTimeout(() => {
                collapseRow.style.display = "none"; // Sembunyikan baris setelah animasi collapse selesai
            }, 500); // Sama dengan durasi animasi CSS
            this.querySelector(".fas").classList.remove("fa-chevron-up");
            this.querySelector(".fas").classList.add("fa-chevron-down"); // Ubah ikon jadi chevron-down
        }
    });
});

function copyText(text) {
    // Menggunakan Clipboard API untuk menyalin teks
    navigator.clipboard
        .writeText(text)
        .then(function () {
            // Menampilkan alert atau perubahan ikon setelah teks berhasil disalin
            alert("Teks disalin: " + text);
        })
        .catch(function (error) {
            console.error("Teks gagal disalin: ", error);
        });
}

// End Collapse

// JavaScript for "Select All" checkbox
// document.getElementById("select-all").addEventListener("change", function () {
//     var checkboxes = document.querySelectorAll(".client-checkbox");
//     checkboxes.forEach(function (checkbox) {
//         checkbox.checked = this.checked;
//     }, this);
// });

