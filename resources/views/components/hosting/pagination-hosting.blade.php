<!-- Custom Pagination -->
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-end py-5" style="align-items: center;">
        <!-- Tombol Previous -->
        @if ($hostings->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link" style="background-color: #082F1B; border-radius: 5px;">
                    <i style="color: white;" class="fa-solid fa-chevron-left"></i>
                </span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $hostings->previousPageUrl() }}"
                    style="background-color: #082F1B; border-radius: 5px;">
                    <i style="color: white;" class="fa-solid fa-chevron-left"></i>
                </a>
            </li>
        @endif

        <!-- Tombol Angka Halaman dengan Batas 7 -->
        @if ($hostings->lastPage() > 7)
            <!-- Halaman pertama -->
            <li class="page-item {{ $hostings->currentPage() == 1 ? 'active' : '' }}">
                <a class="page-link1" href="{{ $hostings->url(1) }}">1</a>
            </li>

            @if ($hostings->currentPage() > 4)
                <!-- Titik tiga jika halaman saat ini lebih dari 4 -->
                <li class="page-item disabled"><span class="page-link1">...</span></li>
            @endif

            <!-- Loop untuk menampilkan 5 halaman di sekitar halaman saat ini -->
            @for ($i = max(2, $hostings->currentPage() - 2); $i <= min($hostings->lastPage() - 1, $hostings->currentPage() + 2); $i++)
                <li class="page-item {{ $hostings->currentPage() == $i ? 'active' : '' }}">
                    <a class="page-link1" href="{{ $hostings->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            @if ($hostings->currentPage() < $hostings->lastPage() - 3)
                <!-- Titik tiga jika halaman saat ini kurang dari halaman terakhir - 3 -->
                <li class="page-item disabled"><span class="page-link1">...</span></li>
            @endif

            <!-- Halaman terakhir -->
            <li class="page-item {{ $hostings->currentPage() == $hostings->lastPage() ? 'active' : '' }}">
                <a class="page-link1" href="{{ $hostings->url($hostings->lastPage()) }}">{{ $hostings->lastPage() }}</a>
            </li>
        @else
            <!-- Jika total halaman <= 7, tampilkan semuanya -->
            @for ($i = 1; $i <= $hostings->lastPage(); $i++)
                <li class="page-item {{ $hostings->currentPage() == $i ? 'active' : '' }}">
                    <a class="page-link1" href="{{ $hostings->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
        @endif

        <!-- Tombol Next -->
        @if ($hostings->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $hostings->nextPageUrl() }}"
                    style="background-color: #082F1B; border-radius: 5px;">
                    <i style="color: white;" class="fa-solid fa-chevron-right"></i>
                </a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link" style="background-color: #082F1B; border-radius: 5px;">
                    <i style="color: white;" class="fa-solid fa-chevron-right"></i>
                </span>
            </li>
        @endif
    </ul>
</nav>
