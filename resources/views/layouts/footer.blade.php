<section class="main-page" id="main-page">
    <div>
        <!-- Footer Start -->
        <footer class="d-flex justify-content-center" style="background-color: #e0e0e6; height: 100px;">
            <div style="font-size: 15px; text-align: center; align-content: center;">
                <a style="color: #8F939A; text-decoration: none; text-align: center; justify-content: center; text-transform: capitalize;"
                    href="alamaya.com">Login as - {{ Auth::user()->role ?? 'User' }}
                    {{ Auth::user()->name }}</a> <br>
                <a style="color: #8F939A; text-decoration: none; text-align: center; justify-content: center;"
                    href="alamaya.com">Copyright © PT Indonesia Online Alamaya.
                    All
                    rights reserved.</a>
            </div>
        </footer>
        <!-- End Of Footer -->
    </div>
</section>
