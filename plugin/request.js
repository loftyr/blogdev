// JS Page Request

$(document).ready(function(){
    $('.tgl-entry').datepicker({dateFormat: 'yy-mm-dd', maxDate: '0'});
});


function previewImage(input) {
    if(input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('img.img-preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("input#Logo").change(function() {
    previewImage(this); 
});


var btnSave         = document.querySelector('#btn-save');
const form          = document.getElementById("form");
const judulModal    = $('#title-modal');
const btn_save      = $('#btn-save');
const btn_posting   = document.querySelector('#posting-thread');

// Save
btnSave.addEventListener("click", function(event){
    event.preventDefault();
    var url         = 'send_request';
    var base_url    = $('#form').attr('link');
    var form        = document.querySelector("#form"); 
            
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
                    timer: 2000
                })
            }else{                
                Swal.fire({
                    position: 'top-end',
                    type: 'success',
                    title: result.Msg,
                    showConfirmButton: false,
                    timer: 2000
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        window.location.href = base_url;
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