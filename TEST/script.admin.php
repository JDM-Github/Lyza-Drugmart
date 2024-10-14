<script type="text/javascript">
    $(document).ready(function() {
        
        // Load the first page of products by default
        load_data(1);

        // Function to load table data
        function load_data(page) {
            $.ajax({
                url: "fetch_data.inc.php",    // URL of the PHP script to load data
                type: "POST",
                data: {page: page},       // Pass the current page number to the script
                success: function(data) {
                    $('#table-data').html(data);  // Update the table content with the new data
                }
            });
        }

        // Handle pagination link click event
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr("id");  // Get the page number from the clicked link
            load_data(page);                 // Load the corresponding data
        });

    });
</script>