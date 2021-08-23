<?php

?>
<br><br><br>
<div id="signupOuter">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card shadow" style="width: 22rem; margin: 0 auto;">
                    <div class="card-body">
                        <h3 class="card-title mb-3">Sign-Up</h5>
                        <form action="../app/includes/post_data.php" method="post">
                            <div class="mb-2">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control form-control-sm" name="name"  placeholder="Full Name" required>
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Email address</label>
                                <input type="email" class="form-control form-control-sm" name="email"  placeholder="name@example.com" required>
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Username</label>
                                <input type="text" class="form-control form-control-sm" name="username"  placeholder="Username" required>
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Password</label>
                                <input type="password" class="form-control form-control-sm" name="password"  placeholder="Your Password" required>
                                <!-- <i class="bi bi-eye-slash" id="togglePassword"></i> -->
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Repeat Password</label>
                                <input type="password" class="form-control form-control-sm" name="passwordR"  placeholder="Repeat Your Password" required>
                            </div>
                            <br>
                            <button class="btn btn-primary" name="signUpSubmit">Create Account</button>
                        </form>
                        <div id="yourcontainer"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    /* var strength = 1;
    var arr = [/.{5,}/, /[a-z]+/, /[0-9]+/, /[A-Z]+/];
    jQuery.map(arr, function(regexp) {
    if(pass.match(regexp))
        strength++;
    }); */

    function checkExistingLogins(val, type){
        var base = '<?php echo $baseDir; ?>';
        $.ajax({
            type:'POST',
            url:base+'/app/includes/post_data.php',
            data:{"checkLoginVal":val},
            success:function(html){
                if(html == '"true"'){
                    $('button[name="signUpSubmit"]').prop("disabled",true);
                    $('input[name="'+type+'"]').addClass('is-invalid');
                } else{
                    $('button[name="signUpSubmit"]').prop("disabled",false);
                    $('input[name="'+type+'"]').removeClass('is-invalid');
                }
            }
        });
    }

    $('input[name="email"]').on('input', function() {
        var email = $(this).val();
        checkExistingLogins(email, 'email');
    });
    $('input[name="username"]').on('input', function() {
        var username = $(this).val();
        checkExistingLogins(username, 'username');
    });

    /* const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    togglePassword.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye / eye slash icon
        this.classList.toggle('bi-eye');
    }); */

</script>