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
	$('.tgl-entry').datepicker({dateFormat: 'yy-mm-dd', maxDate: '0'});

	$('.modal').on('hidden.bs.modal', function(e){
		$(this).find('form').trigger('reset');
		$('img.img-preview').attr('src', '');
	});

	$('#dataTable').DataTable();
	$('#table-posting').DataTable();
});

var btnAdd 			= document.querySelector('#add-loker');
var btnSave			= document.querySelector('#btn-save');
const form 			= document.getElementById("form");
const modalView 	= $('#modal-loker');
const judulModal 	= $('#title-modal');
const btn_save		= $('#btn-save');
const btn_posting	= document.querySelector('#posting-thread');
var method;


btn_posting.addEventListener("click", function(){
	$.ajax({
		url: 'posting',
		type: 'POST',
		dataType: 'JSON',
		success:function(result){
			if (result.Status == true) {
				Swal.fire({
					position: 'top-end',
				    type: 'success',
				    title: result.Msg + ' Jumlah => ' + result.Jumlah,
				    showConfirmButton: false,
				    timer: 1000
				}).then((result) => {
				  	if (result.dismiss === Swal.DismissReason.timer) {
					    window.location.reload();
					 }
				})
			}else{
				Swal.fire({
					position: 'top-end',
				    type: 'error',
				    title: result.Msg,
				    showConfirmButton: false,
				    timer: 1000
				}).then((result) => {
				  	if (result.dismiss === Swal.DismissReason.timer) {
					    window.location.reload();
					 }
				})
			}
		}
	})
});

btnSave.addEventListener("click", function(event){
	event.preventDefault();
	var url;
	var base_url	= $('#form').attr('link');
	var form 		= document.querySelector("#form"); 
	
	
	if(method == 'add') {
		url = base_url+'/save';
	}else {
		url = base_url+'/saveEdit';
	}
	
	$('.progress').show();
	btnSave.disabled = true;

	$.ajax({

		xhr : function() {
			var xhr = new window.XMLHttpRequest();
			xhr.upload.addEventListener('progress', function(e){
				if(e.lengthComputable) {
					console.log('Bytes Load : ' + e.loaded);
					console.log('Total Size : ' + e.total);
					console.log('Persen : ' + (e.loaded / e.total));
					var percent = Math.round((e.loaded / e.total) * 100);

					$('.progress-bar').attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '%');
				}
			});
			return xhr;
		},
		url: url,
		data: new FormData(form),
		type: "POST",
		dataType: "JSON",
		processData:false,
        contentType:false,
        cache:false,
		success:function(result){
			$('.progress').hide();
			btnSave.disabled = false;
			
			if (result.Status == false) {
				Swal.fire({
					position: 'top-end',
				    type: 'error',
				    title: result.Msg,
				    showConfirmButton: false,
				    timer: 1500
				})
			}else{
				modalView.modal('hide');
				
				Swal.fire({
					position: 'top-end',
				    type: 'success',
				    title: result.Msg,
				    showConfirmButton: false,
				    timer: 1500
				}).then((result) => {
				  	if (result.dismiss === Swal.DismissReason.timer) {
					    window.location.reload();
					 }
				})
				// window.location.reload();
			}
		},
		error:function(jqXHR, textStatus, errorThrown) {
			alert('Error Add / Update Data');
		}
	});
	
});


btnAdd.addEventListener("click", function(){
	method = 'add';

	judulModal.html("Add Thread Loker");
	btn_save.html("Save");
	modalView.modal("show");
});

$(document).on('click', '.btnLihat', function() {
	const id 			= $(this).attr('dataID');
	$('#tab-loker a[href="#detail-thread"]').tab('show');
	const bodyTable 	= $('#table-detail');

	$.ajax({
		url: "lihat",
		data: {id:id},
		type: 'POST',
		success:function(result){
			bodyTable.html(result);
		}
	});
});

$(document).on('click', '.btnEdit', function(){
	const id 	= $(this).attr('dataID');
	method 		= 'edit';

	$.ajax({
		url: 'viewEdit',
		data: {id:id},
		type: 'POST',
		dataType: 'JSON',
		success:function(result){
			judulModal.html("Edit Thread Loker");

			$('[name="id"]').val(result.id);
			$('[name="Judul"]').val(result.judul_thread);
			$('[name="Ket"]').val(result.ket_thread);
			$('[name="Tgl"]').datepicker('setDate', result.tanggal);
			$('[name="Alamat"]').val(result.alamat_thread);
			$('[name="Link"]').val(result.link_website);

			btn_save.html("Save Edit");
			modalView.modal("show");
		}
	});

});

$(document).on('click', '.btnHapus', function(){
	Swal.fire({
		title: 'Are You Sure?',
		text: 'Delete This Thread !!!',
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
		if (result.value) {
			var id = $(this).attr('dataID');

			$.ajax({
				url: "delete/"+id,
				type: 'GET',
				dataType: 'JSON',
				success:function(result){
					if (result.Status == true) {
						Swal.fire({
							position: 'top-end',
						    type: 'success',
						    title: result.Msg,
						    showConfirmButton: false,
						    timer: 1000
						}).then((result) => {
						  	if (result.dismiss === Swal.DismissReason.timer) {
							    window.location.reload();
							 }
						})
					}else{
						Swal.fire({
							position: 'top-end',
						    type: 'error',
						    title: result.Msg,
						    showConfirmButton: false,
						    timer: 1000
						}).then((result) => {
						  	if (result.dismiss === Swal.DismissReason.timer) {
							    window.location.reload();
							 }
						})
					}
				}
			});
						
		}else {
			Swal.fire({
				position: 'top-end',
			    type: 'info',
			    title: 'Data will be keep . . .',
			    showConfirmButton: false,
			    timer: 1000
			})
		}
	})
});

$("input#Logo").change(function() {
	previewImage(this);	
})

// Akhir JS Page Loker