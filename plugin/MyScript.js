// JS Page Loker

function previewImage(input) {
	if(input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function(e) {
			$('img.img-preview').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}

$(document).ready(function(){
	$('.tgl-entry').datepicker();

	$('.modal').on('hidden.bs.modal', function(e){
		$(this).find('form').trigger('reset');
		$('img.img-preview').attr('src', '');
	});
});

var btnEdit 	= document.querySelector('#edit');
var btnHapus 	= document.querySelector('#hapus');
var btnAdd 		= document.querySelector('#add-loker');
var btnLihat	= document.querySelectorAll('.lihat');
	
var method = '';

// btnEdit.addEventListener("click", function(){
// 	method = 'edit';
// 	const modalEdit 	= $('#modal-loker');
// 	const judulModal 	= $('#title-modal');

// 	judulModal.html("Edit Thread Loker");

// 	modalEdit.modal("show");
// });

function lihat() {
	$('#tab-loker a[href="#detail-thread"]').tab('show');
}


$("input#Logo").change(function() {
	previewImage(this);	
})

// Akhir JS Page Loker