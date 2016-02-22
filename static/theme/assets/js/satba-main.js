$(document).ready(function (){
    //default DataTable initisiation
    $.extend( $.fn.dataTable.defaults, {
        searching: false,
        ordering:  false,
        pageLength: 10,
        rowId: 'id',
        searchDelay: 1000
    });
});