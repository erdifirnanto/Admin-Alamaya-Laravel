<!-- Search Input -->
<div class="search-box">
    <form action="{{ route('search.onprogress') }}" method="GET">
        <input id="searchInput" style="width: 300px;" type="text" name="search" placeholder="Search">
        <span class="icon-search"><i class="fas fa-search"></i></span>
    </form>
</div>
