<div class="col-sm-1"></div>
<div class="col-sm-10">
    <form method = 'post' action='library/api/add_user.php' enctype='multipart/form-data'>
        <input type="hidden"  name="method" value="add_user"/>
        <label for="name">Име:<span class="required">*</span></label><br/><input type="text" id="name"  name="name"  required/><br/><br/>
        <label for="surname">Презиме:<span class="required">*</span></label><br/><input type="text" id="surname"  name="surname"  required/><br/><br/>
        <label for="phone">Мобилен:<span class="required">*</span></label><br/><input type="text" id="phone"  name="phone"  required/><br/><br/>
        <label for="other_phone">Мобилен 2:</label><br/><input type="text" id="other_phone"  name="other_phone"/><br/><br/>
        <label for="email">Емаил:<span class="required">*</span></label><br/><input type="email" id="email"  name="email" required/><br/><br/>
        <label for="username">Корисник:<span class="required">*</span></label><br/><input type="text" id="new_user"  name="username" required/><br/><br/>
        <label for="password">Лозинка:<span class="required">*</span></label><br/><input type="password" id="password"  name="password" required/><br/><br/>
        <label for="password_confirm">Лозинка потврда:<span class="required">*</span></label><br/><input type="password" id="password_confirm"  name="password_confirm" required/><br/><br/>


        <input type="submit" value="Зачувај корисник"  id="add_user" />
    </form>
</div>
<div class="col-sm-1"></div>
</div>
<script>
    $('#password_confirm').change(function(){
        let pass = $('#password').val();
        let pass_confirm = $('#password_confirm').val();
        if(pass != pass_confirm){
            alert('Имате разлика помеѓу лозинката и потврда на лозинка!');
            $('#password_confirm').val('');
        }
    });
    $('#new_user').change(function(){
        let username = $('#new_user').val();
        $.ajax({
            url: "library/api/add_user.php",
            type: "post",
            async: false,
            dataType:"json",
            data : { "username": username, "method":"check_existing"},
            success: function(data){
                if(data.result == 'exist'){
                    alert(data.message);
                    $('#new_user').val('');
                }



            }
        });

    });
    $('#email').change(function(){
        let email = $('#email').val();
        var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i

        if(!pattern.test(email)) {
            alert('Ne validen email');
            $('#email').focus();
            $('#email').css('color','red')
            $('#email').css('border-color','red')
            $('#email').val('')
        }

    });
    $("#add_user").submit(function(e){
        let email = $('#email').val();
        var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i

        let pass = $('#password').val();
        let pass_confirm = $('#password_confirm').val();

        if(!pattern.test(email)) {
            alert('Ne validen email!');
            $('#email').focus();
            $('#email').css('color', 'red');
            $('#email').css('border-color', 'red');
            $('#email').val('');
            e.preventDefault();
        }
        else if(pass != pass_confirm){
            $('#password_confirm').focus();
            $('#password_confirm').css('border-color', 'red');
            $('#password_confirm').val('');
            alert('Potvrdata na lozinkata e razlicna od lozinkata!');
            e.preventDefault();

        }
    });
</script>