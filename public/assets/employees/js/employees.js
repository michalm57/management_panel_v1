$(function () {
    $('#companyFilterModal').on('click', '.apply-filter', applyCompanyFilter());

    $('#employees-table').DataTable({
        "paging": true,
        "searching": true,
        "ordering": true,
        "info": true, 
        "pageLength": 20
    });

    function applyCompanyFilter() {
        var selectedCompanies = [];
        $('#companyFilterForm input:checked').each(function() {
            selectedCompanies.push($(this).val());
        });

        $('#employees-table').DataTable().column(2).search(selectedCompanies.join('|'), true, false).draw();

        $('#companyFilterModal').modal('hide');
    }
});