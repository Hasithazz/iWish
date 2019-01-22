<div class="row col-md-12">
    <div class="container col-md-8 login image_pane">
        <img class="login image_pane image" src="<?php echo base_url('assets/images/loginPage.jpg')?>" alt="">
    </div>
    <div class="container col-md-4 login content_pane">
        <div class="container col-md-10 login content_pane form loginForm" id="loginForm">
            <form>
                <div class="form-group">
                    <label for="userName">User Name</label>
                    <input type="text" class="form-control" id="userName" aria-describedby="emailHelp"
                           placeholder="Enter User Name">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.
                    </small>
                </div>
                <div class="form-group">
                    <label for="userPassword">Password</label>
                    <input type="password" class="form-control" id="userPassword" placeholder="Password">
                </div>                
                <button type="button" class="btn btn-primary loginButton" id="login">Login</button>
            </form>
        </div>
    </div>
</div>
