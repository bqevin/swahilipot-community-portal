<?php

?>

<!-- Modal content-->
<div id="regModal" class="modal fade" role="dialog">
<div class="modal-dialog">


    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h2>Regester Users</h2>
      </div>
        <form action="" method="POST">
        <div class="modal-body">
            <label>First Name <span class="asteric">*</span></label>
                <input class="form-control" type="text" name="fname" required>

            <label>Last Name <span class="asteric">*</span></label>
                <input class="form-control" type="text" name="lname" required>

            <label>Email Address <span class="asteric">*</span></label>
                <input class="form-control" type="email" name="email" required>
                <div class="row">
                    <div class="col-md-4">
                        <label>Registration <span class="asteric">*</span></label>
                        <input class="form-control" type="text" name="regno" required>
                    </div>
                    <div class="col-md-4">
                        <label>Gender <span class="asteric">*</span></label>
                        <select class="form-control" name="gender" required>
                            <option class="" value="">........</option>
                            <option class="" value="M">Male</option>
                            <option class="" value="F">Female</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Category <span class="asteric">*</span></label>
                        <select class="form-control" name="category" required>
                            <option class="" value="">........</option>
                            <option class="" value="Technologist">Techie</option>
                            <option class="" value="Artist">Art</option>
                            <option class="" value="Both">Both</option>
                        </select> 
                    </div>
                </div>
            </div>

            <div class="modal-footer">
            <button class="btn btn-primary" type="" name="add-member">Save Details</button>
            </div>
        </form>
    </div>
</div>