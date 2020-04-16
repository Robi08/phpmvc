$(function(){

	$('.tombol-tambah').on('click', function(){
		$('#judulModal').html('Tambah Data Siswa');
		$('.modal-footer button[type=submit]').html('Tambah Data');
		
		$('#nis').val(null);
		$('#nama').val(null);
		$('#email').val(null);
		$('#jurusan').val(null);
	})


	$('.tombol-ubah').on('click', function(){
		$('#judulModal').html('Ubah Data Siswa');
		$('.modal-footer button[type=submit]').html('Ubah Data');
		$('.modal-body form').attr('action', 'http://localhost/phpmvc/public/siswa/ubah');

		const id = $(this).data('id');

		$.ajax({
			url: 'http://localhost/phpmvc/public/siswa/getubah',
			data: {id : id},
			method: 'post',
			dataType: 'json',
			success: function(data){
				console.log(data);
				$('#id').val(data.id);
				$('#nis').val(data.nis);
				$('#nama').val(data.nama);
				$('#email').val(data.email);
				$('#jurusan').val(data.jurusan);
			}
		});

	});

});