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
	$('.tgl-entry').datepicker({dateFormat: 'yy-mm-dd'});

	$('.modal').on('hidden.bs.modal', function(e){
		$(this).find('form').trigger('reset');
		$('img.img-preview').attr('src', '');
	});
});

var btnAdd 			= document.querySelector('#add-loker');
var btnSave			= document.querySelector('#btn-save');
const form 			= document.getElementById("form");
const modalView 	= $('#modal-loker');
const judulModal 	= $('#title-modal');
const btn_save		= $('#btn-save');
var method;

btnSave.addEventListener("click", function(){
	var url;
	var base_url	= $('#form').attr('link');
	var form 		= document.querySelector("#form"); 

	if(method == 'add') {
		url = base_url+'/save';
	}else {
		url = base_url+'/saveEdit';
	}

	$.ajax({
		url: url,
		data: new FormData(form),
		type: "POST",
		dataType: "JSON",
		processData:false,
        contentType:false,
        cache:false,
		success:function(result){
			if (result.Status == false) {
				Swal.fire({
					position: 'top-end',
				    type: 'error',
				    title: result.Msg,
				    showConfirmButton: false,
				    timer: 1500
				});
			}else{
				Swal.fire({
					position: 'top-end',
				    type: 'success',
				    title: result.Msg,
				    showConfirmButton: false,
				    timer: 1500
				});
				modalView.modal('hide');
				window.location.reload();
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
	var id = $(this).attr('dataID');
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
	method = 'edit';

	judulModal.html("Edit Thread Loker");
	btn_save.html("Save Edit");
	modalView.modal("show");
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
			Swal.fire({
				position: 'top-end',
			    type: 'success',
			    title: 'Data Has been Delete',
			    showConfirmButton: false,
			    timer: 1500
			})
		}
	})
});

$("input#Logo").change(function() {
	previewImage(this);	
})

// Akhir JS Page Loker