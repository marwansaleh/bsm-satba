$(document).ready(function (){
    KonversiMataUang.init();
    
    /************************
    /*	LAYOUT
    /************************/

    /* set minimum height for content wrapper */
    $('.content-wrapper').css('min-height', $('.wrapper').outerHeight(true) - $('.top-bar').outerHeight(true));


    /************************
    /*	MAIN NAVIGATION
    /************************/

    $('.main-menu .js-sub-menu-toggle').click( function(e){

        e.preventDefault();

        $li = $(this).parent('li');
        if( !$li.hasClass('active')){
            $li.find(' > a .toggle-icon').removeClass('fa-angle-left').addClass('fa-angle-down');
            $li.addClass('active');
        }
        else {
            $li.find(' > a .toggle-icon').removeClass('fa-angle-down').addClass('fa-angle-left');
            $li.removeClass('active');
        } 

        $li.find(' > .sub-menu').slideToggle(300);
    });

    $('.js-toggle-minified').clickToggle(
        function() {
            $('.left-sidebar').addClass('minified');
            $('.content-wrapper').addClass('expanded');

            $('.left-sidebar .sub-menu')
            .css('display', 'none')
            .css('overflow', 'hidden');

            $('.main-menu > li > a > .text').animate({opacity: 0}, 200);

            $('.sidebar-minified').find('i.fa-angle-left').toggleClass('fa-angle-right');
        },
        function() {
            $('.left-sidebar').removeClass('minified');
            $('.content-wrapper').removeClass('expanded');
            $('.main-menu > li > a > .text').animate({opacity: 1}, 600);

            $('.sidebar-minified').find('i.fa-angle-left').toggleClass('fa-angle-right');
        }
    );

    // main responsive nav toggle
    $('.main-nav-toggle').clickToggle(
        function() {
            $('.left-sidebar').slideDown(300)
        },
        function() {
            $('.left-sidebar').slideUp(300);
        }
    );
    
    /************************
    /*	WINDOW RESIZE
    /************************/

    $(window).bind("resize", resizeResponse);

    function resizeResponse() {

        if( $(window).width() < (992-15)) {
            if( $('.left-sidebar').hasClass('minified') ) {
                $('.left-sidebar').removeClass('minified');
                $('.left-sidebar').addClass('init-minified');
            }

        }else {
            if( $('.left-sidebar').hasClass('init-minified') ) {
                $('.left-sidebar')
                .removeClass('init-minified')
                .addClass('minified');
            }
        }
    }
    //default DataTable initisiation
    $.extend( $.fn.dataTable.defaults, {
        searching: false,
        ordering:  false,
        pageLength: 10,
        rowId: 'id',
        searchDelay: 1000
    });
//    var dtp = $('.datepicker').datepicker({format: 'yyyy-mm-dd'})
//    .on('changeDate', function(e) {
//            dtp.datepicker('hide');
//    });
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
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
    }).on('changeDate', function (e){
        $(this).datepicker('hide');
    })

    //$('select.selectpicker').selectpicker();
    $('select.select2').select2();
    //$('.multiselect').multiselect();
});

// toggle function
$.fn.clickToggle = function( f1, f2 ) {
    return this.each( function() {
        var clicked = false;
        $(this).bind('click', function() {
            if(clicked) {
                clicked = false;
                return f2.apply(this, arguments);
            }

            clicked = true;
            return f1.apply(this, arguments);
        });
    });

}

var KonversiMataUang = {
    init: function(){
        /*
         * Fungsi init menentukan basis rate yang digunakan berdasarkan bulan dan tahun
         * serta nilai kurs yang diperoleh dari server
         * Jika gagal, makan objek KonversiMatauang tidak bisa digunakan
         */
        
        if (typeof basis_kurs === 'undefined'){
            this.initiated = false;
            console.log('Rate bases is not defined');
            //alert('Basis rate kurs belum didefinisikan. Perhitungan kurs tidak dapat dilakukan !');
            
            return false;
        }else{
            console.log('Rate bases is defined, ok!');
        }
        //set kurs
        this.bases = basis_kurs;
        this.initiated = true;
    },
    initiated: false,
    bases: {},
    setBases: function(bases){
        for (var matauang in bases){
            this.bases[matauang] = parseFloat(bases[matauang]);
        }
    },
    rateUpdate: function(matauang,rate){
        this.bases[matauang] = rate;
    },
    getRate: function (matauang){
        if (!this.initiated){
            return false;
        }
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
    getConvert: function (matauang, nilai_dasar){
        var rate = this.getRate(matauang);
        console.log('get matauang:'+matauang+', rate:'+rate);
        
        return (rate * nilai_dasar);
    },
    convert: function(matauang, nilaidasar){
        return this.getConvert(matauang, nilaidasar);
    }
};
