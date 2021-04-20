// event saat link klik!
$('.page-scroll').on('click', function(e){

    // isi href
    var tujuan = $(this).attr('href');
    // tangkap
    var elemenTujuan = $(tujuan);
    // pindahkan scroll

    $('body').animate({
        scrollTop: elemenTujuan.offset().top - 50
    }, 1250, 'swing');
    
    e.preventDefault();
});