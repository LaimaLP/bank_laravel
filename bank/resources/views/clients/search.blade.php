<div class="input-group">
    <div class="form-outline" data-mdb-input-init>
        <input id="search-input" type="search" id="form1" class="form-control" />
        <label class="form-label" for="form1">Search</label>
    </div>
    <button id="search-button" type="button" class="btn btn-primary">
        <i class="fas fa-search"></i>
    </button>
</div>

<form action="/">
    <div> class="relative border-2 border-gray-100 m-4 rounded-lg">
        <div class="absolute top-4 left -3">
            <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
        </div>
        <input type="text" name="search"
            class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:show focus:outline-none"
            placeholder="Search FutureBank..." />
        <div class="absolute top-2 right-2">
            <button type="submit" class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600">Search</button>
        </div>
    </div>
</form>
