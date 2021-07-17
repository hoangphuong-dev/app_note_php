// Bắt sự kiện khi click vào nút tạo
$('#submit_create_note').on('click', function() {
    $title_create_note = $('#title_create_note').val();
    $body_create_note = $('#body_create_note').val();
    $ac = 'create'; // Hành động
    if ($title_create_note == '' || $title_create_note == '') {
	        $('#formCreateNote .alert').removeClass('hidden');
	        $('#formCreateNote .alert').html('Vui lòng điền đầy đủ thông tin bên trên.');
    }
    else {
	        $.ajax({
		            url : 'note.php',
		            type : 'POST',
            data : {
	                title_create_note : $title_create_note,
	                body_create_note : $body_create_note,
	                ac : $ac
            }, success : function(data) {
	                $('#formCreateNote .alert').removeClass('hidden');
	                $('#formCreateNote .alert').html(data);
            }
        });
    }
});




// Bắt sự kiện khi click vào nút Sửa
$('#submit_edit_note').on('click', function() {
    $title_edit_note = $('#title_edit_note').val();
    $body_edit_note = $('#body_edit_note').val();
    $ac = 'edit'; // Hành động
    $id_edit_note = $('#id_edit_note').val(); // Lấy ID trong field ẩn
    if ($title_edit_note == '' || $title_edit_note == '') {
	        $('#formEditNote .alert').removeClass('hidden');
	        $('#formEditNote .alert').html('Vui lòng điền đầy đủ thông tin bên trên.');
    }
    else {
	        $.ajax({
		            url : 'note.php',
		            type : 'POST',
            data : {
	                title_edit_note : $title_edit_note,
	                body_edit_note : $body_edit_note,
	                ac : $ac,
	                id_edit_note : $id_edit_note
            }, success : function(data) {
	                $('#formEditNote .alert').html(data);
            }
        });
    }
});




// Bắt sự kiện khi click vào nút Xoá
$('#submit_delete_note').on('click', function() {
    $ac = 'delete'; // Hành động
    $id_edit_note = $('#id_edit_note').val();
    $.ajax({
	        url : 'note.php',
	        type : 'POST',
        data : {
	            ac : $ac,
	            id_edit_note : $id_edit_note
        }, success : function(data) {
	            $('#modalDeleteNote .alert').html(data);
        }
    });
});