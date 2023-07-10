<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <title>Form data</title>
</head>
<body>

    <div class="container">
        <div class="col-md-12">
            <div class="card " >
                <div class="card-header text-white bg-primary">
                <strong><i class="fa fa-plus"></i><h2>Form</h2></strong>
                </div>
                  <div class="card-body">
                    <h5 class="card-title">Add Form Data</h5>
                    <?php
                        echo validation_errors('<div class="alert alert-danger">','</div>');
                        echo form_open();
                    ?>
                    <div class="form-group">
                        <label>First Name :-</label>
                        <input type="text" name="fname" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name :-</label>
                        <input type="text" name="lname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email :-</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                     <div class="form-group">
                        <label>Password:-</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                     <div class="form-group">
                        <label>Confirm Password :-</label>
                        <input type="password"  name="confirm_password" class="form-control">
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                    <?php
                        echo form_close();
                    ?>
                </div>
            </div>
        </div>
    </div>
    

</body>
</html>