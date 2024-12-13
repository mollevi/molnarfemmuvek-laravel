<div id="filter-buttons" class="btn-group" role="group">
    <button type="button" class="btn btn-default" onclick="applyFilter(0)">Active</button>
    <button type="button" class="btn btn-default" onclick="applyFilter(1)">With Deleted</button>
    <button type="button" class="btn btn-default" onclick="applyFilter(2)">Only Deleted</button>
</div>
<script>
    function applyFilter(filter) {
        var url = new URL(window.location.href);
        url.searchParams.set('trashed', filter);
        window.location.href = url.href;
    }
</script>
