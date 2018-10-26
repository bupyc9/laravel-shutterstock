<form action="{{route('search')}}" class="form-inline" method="get">
    <label for="search-input" class="sr-only">Search</label>
    <input type="text" placeholder="Search" class="form-control mb-2 mr-sm-2 w-50" id="search-input"
           name="q" value="{{$query}}" maxlength="255">
    <button class="btn btn-primary mb-2">Submit</button>
</form>