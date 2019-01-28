<div class="row col-md-12" id="view-loader"></div>

<script type="text/template" class="login-view-template">

    <div class="container col-md-8 login image_pane">
        <img class="login image_pane image" src="<?php echo base_url('assets/images/loginPage.jpg') ?>" alt="">
    </div>
    <div class="container col-md-4 login content_pane">
        <div class="login logo div">
            <img class="login content_pane logo img" src="<?php echo base_url('assets/images/logo.png') ?>" alt="">
        </div>
        <div class="container col-md-10 login content_pane form loginForm" id="loginForm">
            <form>
                <div class="form-group">
                    <label for="userName">User Name</label>
                    <input type="text" class="form-control input" id="userName" placeholder="Enter User Name" required>
                </div>
                <div class="form-group">
                    <label for="userPassword">Password</label>
                    <input type="password" class="form-control input" id="userPassword" placeholder="Password">
                </div>
                <button type="button" class="btn btn-primary loginButton" id="login">Login</button>
                <button type="button" class="btn btn-primary registerViewButton" id="registerViewButton">Register
                </button>
            </form>
        </div>
    </div>

</script>

<script type="text/template" class="register-view-template">

    <div class="container col-md-8 login image_pane">
        <img class="login image_pane image" src="<?php echo base_url('assets/images/loginPage.jpg') ?>" alt="">
    </div>
    <div class="container col-md-4 login content_pane">
        <div class="login logo div">
            <img class="login content_pane logo img" src="<?php echo base_url('assets/images/logo.png') ?>" alt="">
        </div>
        <div class="container col-md-10 login content_pane form loginForm" id="loginForm">
            <form>

                <div class="form-group">
                    <label for="userName">User Name</label>
                    <input type="text" class="form-control input" id="userName"
                           placeholder="Enter User Name" required>

                </div>
                <!--password-->
                <div class="form-group">
                    <label for="userPassword">Password</label>
                    <input type="password" class="form-control input" id="userPassword" placeholder="Password">
                </div>
                <!--confirm password-->
                <div class="form-group">
                    <label for="userPasswordConfirm">Confirm Password</label>
                    <input type="password" class="form-control input" id="userPasswordConfirm"
                           placeholder="Confirm Password">
                </div>
                <!--wish list name-->
                <div class="form-group">
                    <label for="wishListName">Wish List Name</label>
                    <input type="text" class="form-control input" id="wishListName"
                           placeholder="Enter Wish List Name">

                </div>
                <!--wish list description-->
                <div class="form-group">
                    <label for="wishListDescription">Wish List Description</label>
                    <input type="text" class="form-control input" id="wishListDescription"
                           placeholder="Enter Wish List Description">

                </div>

                <button type="button" class="btn btn-primary registerButton" id="registerButton">Register</button>
                <button type="button" class="btn btn-primary backButton" id="backButton">Back</button>
            </form>
        </div>
    </div>

</script>

<script src="<?php echo base_url('assets/js/login.js') ?>"></script>
