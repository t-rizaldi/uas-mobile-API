$('.tombol-editResep').on('click', function(){
    var id = $(this).data('id');
    var namaMasakan = $(this).data('nama');
    var gambar = $(this).data('gambar');

    $('#editModalResep #id_resep').val(id);
    $('#editModalResep #nama_masakan').val(namaMasakan);
    $('#editModalResep #gambarLama').val(gambar);
    $('#editModalResep .gbrLama').html('<img src="'+ gambar +'" alt="Gambar '+ namaMasakan +'" width="200">');
});