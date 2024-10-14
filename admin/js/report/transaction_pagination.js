$(document).ready(function() {
    // Load the first page
    loadTableData(1);

    // Function to load table data
    function loadTableData(page) {
        $.ajax({
            url: 'includes/report/transaction.report.php',  
            method: 'POST',
            data: { page: page },
            success: function(response) {
                $('#table-data').html(response);
            }
        });
    }

    // Pagination click event
    $(document).on('click', '.page-link', function(e) {
        e.preventDefault();
        var page = $(this).data('page');
        loadTableData(page);
    });

});
