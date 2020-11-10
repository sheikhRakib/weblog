<!-- Search Widget -->
<div class="card my-4">
    <h5 class="card-header">Search</h5>
    <div class="card-body">
        <div class="input-group">
            <input id="query" type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-append">
                <button id="search" class="btn btn-secondary" type="button">Go!</button>
            </span>
        </div>
    </div>

    <script>
        $(document).ready(function () { 
            $("#search").click(function(){
                var q = $("#query").val();
                var url = "/query/";
                window.location.href= url+q;
            });
        });
    </script>
</div>
<!-- Search Widget -->