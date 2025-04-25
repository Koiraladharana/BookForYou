<div class="container mt-5">
    <h1>Search for Books</h1>
    <form action="<?php echo e(route('search.results')); ?>" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control" id="search" name="query" placeholder="Enter title, author, or ISBN">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <div id="autocomplete-results"></div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#search").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "<?php echo e(route('search.autocomplete')); ?>",
                    type: 'GET',
                    dataType: "json",
                    data: {
                        query: request.term
                    },
                    success: function(data) {
                        response($.map(data, function(item) {
                            return {
                                label: item.value,
                                value: item.value,
                                data: item.data
                            };
                        }));
                    }
                });
            },
            minLength: 1,
            select: function(event, ui) {
                $("#search").val(ui.item.value);
                $("form.search-form").submit();
            }
        });
    </script><?php /**PATH C:\xampp\htdocs\BookForYou\resources\views/search/form.blade.php ENDPATH**/ ?>