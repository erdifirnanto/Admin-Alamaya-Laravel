<!-- Custom Pagination -->
                       <nav aria-label="Page navigation">
                           <ul class="pagination justify-content-end" style="align-items: center;">
                               <!-- Tombol Previous -->
                               @if ($teams->onFirstPage())
                                   <li class="page-item disabled">
                                       <span class="page-link" style="background-color: #082F1B; border-radius: 5px;">
                                           <i style="color: white;" class="fa-solid fa-chevron-left"></i>
                                       </span>
                                   </li>
                               @else
                                   <li class="page-item">
                                       <a class="page-link" href="{{ $teams->previousPageUrl() }}"
                                           style="background-color: #082F1B; border-radius: 5px;">
                                           <i style="color: white;" class="fa-solid fa-chevron-left"></i>
                                       </a>
                                   </li>
                               @endif

                               <!-- Tombol Angka Halaman dengan Batas 10 -->
                               @if ($teams->lastPage() > 10)
                                   <!-- Tampilkan halaman pertama -->
                                   <li class="page-item {{ $teams->currentPage() == 1 ? 'active' : '' }}">
                                       <a class="page-link1" href="{{ $teams->url(1) }}">1</a>
                                   </li>

                                   @if ($teams->currentPage() > 5)
                                       <!-- Tambahkan titik tiga jika halaman saat ini lebih dari 5 -->
                                       <li class="page-item disabled"><span class="page-link1">...</span></li>
                                   @endif

                                   <!-- Loop untuk menampilkan 5 halaman di sekitar halaman saat ini -->
                                   @for ($i = max(2, $teams->currentPage() - 2); $i <= min($teams->lastPage() - 1, $teams->currentPage() + 2); $i++)
                                       <li class="page-item {{ $teams->currentPage() == $i ? 'active' : '' }}">
                                           <a class="page-link1" href="{{ $teams->url($i) }}">{{ $i }}</a>
                                       </li>
                                   @endfor

                                   @if ($teams->currentPage() < $teams->lastPage() - 4)
                                       <!-- Tambahkan titik tiga jika halaman saat ini kurang dari halaman terakhir - 4 -->
                                       <li class="page-item disabled"><span class="page-link1">...</span></li>
                                   @endif

                                   <!-- Tampilkan halaman terakhir -->
                                   <li
                                       class="page-item {{ $teams->currentPage() == $teams->lastPage() ? 'active' : '' }}">
                                       <a class="page-link1"
                                           href="{{ $teams->url($teams->lastPage()) }}">{{ $teams->lastPage() }}</a>
                                   </li>
                               @else
                                   <!-- Jika halaman kurang dari atau sama dengan 10, tampilkan semua halaman -->
                                   @for ($i = 1; $i <= $teams->lastPage(); $i++)
                                       <li class="page-item {{ $teams->currentPage() == $i ? 'active' : '' }}">
                                           <a class="page-link1" href="{{ $teams->url($i) }}">{{ $i }}</a>
                                       </li>
                                   @endfor
                               @endif

                               <!-- Tombol Next -->
                               @if ($teams->hasMorePages())
                                   <li class="page-item">
                                       <a class="page-link" href="{{ $teams->nextPageUrl() }}"
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