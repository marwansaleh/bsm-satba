$(document).ready(function (){
    //default DataTable initisiation
    $.extend( $.fn.dataTable.defaults, {
        searching: false,
        ordering:  false,
        pageLength: 10,
        rowId: 'id',
        searchDelay: 1000
    });
    var dtp = $('.datepicker').datepicker({format: 'yyyy-mm-dd'})
    .on('changeDate', function(e) {
            dtp.datepicker('hide');
    });
    $('form.form-validation').on('keydown', 'input, select, textarea', function(e) {
        var self = $(this)
          , form = self.parents('form:eq(0)')
          , focusable
          , next
          ;
        if (e.keyCode == 13) {
            focusable = form.find('input,a,select,button,textarea').filter(':visible');
            next = focusable.eq(focusable.index(this)+1);
            if (next.length) {
                next.focus();
            }
            /*
            else {
                form.submit();
            }*/
            return false;
        }
    });
});

var KonversiMataUang = {
    bases: {USD:13500,HKD:9800},
    setBases: function(bases){
        for (var matauang in bases){
            this.bases[matauang] = parseFloat(bases[matauang]);
        }
    },
    getRate: function (matauang){
        var rate = 1;
        for (var mata in this.bases){
            if (mata == matauang){
                rate = this.bases[mata];
                break;
            }
        }
        //console.log(rate);
        return rate;
    },
    konversi: function(matauang,src,target){
        //get rate for usd
        var rate = this.getRate(matauang);
        var nilai_src = $(src).val();
        
        var nilai_konversi = nilai_src ? (nilai_src * rate) : 0.00;
        $(target).val(nilai_konversi);
    }
};