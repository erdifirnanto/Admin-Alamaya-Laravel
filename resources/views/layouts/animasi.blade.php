<section>
    {{-- Section Animasi --}}
    <div style="position: absolute; z-index: 1002">
        <div id="bg-white"
            style="
              width: 100vw; /* 100% dari lebar viewport */
              height: 100vh; /* 100% dari tinggi viewport */
              background-color: white;
            ">
        </div>
        <div class="content">
            <div id="title" class>
                <!-- Logo 1 (hitam, awal) -->
                <img id="logo-black" src="images/logo_alamaya.png" height="40" style="margin: 35px 0px" />

                <!-- Logo 2 (putih, untuk setelah animasi) -->
                <img id="logo-white" src="/images/logo_alamaya_putih.png" height="40"
                    style="margin: 35px 0px; display: none" />
            </div>
        </div>
        <div class="circle-overlay"></div>
    </div>
</section>
