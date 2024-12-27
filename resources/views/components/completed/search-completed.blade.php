<!-- Search Input -->
<div class="col-sm-4 search-box">
    <form action="{{ route('search.completed') }}" method="GET">
        <input id="searchInput" style="width: 240px;" type="text" name="search" placeholder="Search">
        <span class="icon-search"><i class="fas fa-search"></i></span>
    </form>
</div>
