$('#submit_signin').on('click', function() {
    // Gán các giá trị trong form đăng nhập vào các biến
    $user_signin = $('#user_signin').val();
    $pass_signin = $('#pass_signin').val();
    
    // Nếu một trong các biến này rỗng
    if ($user_signin == '' || $pass_signin == '') {
        $('#formSignin .alert').removeClass('hidden');
        $('#formSignin .alert').html('Vui lòng điền đầy đủ thông tin bên trên.');
    }
    // Ngược lại
    else
    {
        $.ajax({
            url : 'signin.php',
            type : 'POST',
            data : {
                user_signin : $user_signin,
                pass_signin : $pass_signin
            }, success : function(data) {
                $('#formSignin .alert').html(data);
            }
        });
    }
});