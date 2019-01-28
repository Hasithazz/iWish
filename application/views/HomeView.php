<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="<?php echo base_url('assets/images/logo.png') ?>" width="70" height="70"
             class="d-inline-block align-middle" alt="">
        &nbsp iWish
    </a>
</nav>
<div class="row col-md-12" style="padding: 0 0 0 0 !important; margin: 0 0 0 0 !important">
    <div class="col-md-3">
        <nav class="nav flex-column" id="wish-list-template-items" style="background-color:#4d6590;">
            <a class="nav-link active" href="#">Active</a>
            <a class="nav-link" href="#">Link</a>
            <a class="nav-link" href="#">Link</a>
        </nav>
        <div class="col-md-12">
            <button class="col-md-12 btn btn-success add-button" id="add-wishList-btn">
                Add New Wish List &nbsp;
                <i class="fas fa-clipboard-check"></i>
            </button>
        </div>
    </div>
    <div class="col-md-9" id="contents">

    </div>
</div>

<script type="text/template" id="wish-list-template">
    <div class="row col-md-12" style="padding-top: 10px">
        <div class="col-md-11">
            <a class="home wishList-name" href="#"><%= list_name%></a>
        </div>
        <div class="col-md-1">
            <button class="btn btn-danger home wishList-delete">
                <i class="fas fa-trash-alt"></i>
            </button>
        </div>
    </div>
</script>

<script type="text/template" id="wish-list-content-load-template">
 <div>
     <form>
         <div class="form-group">
             <label for="exampleInputEmail1">Email address</label>
             <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
             <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
         </div>
         <div class="form-group">
             <label for="exampleInputPassword1">Password</label>
             <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
         </div>
         <div class="form-check">
             <input type="checkbox" class="form-check-input" id="exampleCheck1">
             <label class="form-check-label" for="exampleCheck1">Check me out</label>
         </div>
         <button type="submit" class="btn btn-primary">Submit</button>
     </form>
 </div>
</script>

<script src="<?php echo base_url('assets/js/home.js') ?>"></script>