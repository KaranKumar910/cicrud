<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ListData</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
     <div class="row">
    <div class="container">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>#.</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $list = $this->db->get('data');
            $i = 1;
            foreach ($list->result() as $value) {
              echo '<tr>
                      <td>'.$i++.'.</td>
                      <td>'.$value->fname.'</td>
                      <td>'.$value->lname.'</td>
                      <td>'.$value->email.'</td>
                      
                      <td><a href="'.site_url('Welcome/EditData/'.$value->id).'" class="btn btn-info">Edit</a></td>
                      <td><a href="'.site_url('Welcome/DeleteData/'.$value->id).'" class="btn btn-danger">Delete</a></td>
                    </tr>';
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
<script type="text/javascript">
$(function() {
$(".delbutton").click(function(){
var element = $(this);
var del_id = element.attr("id");
var info = 'id=' + del_id;
if(confirm("Are you sure you want to delete this Record?")){
    $.ajax({
        type: "GET",
        url: "deleteCourse.php",
        data: info,
        success: function(){   
    }
});
    $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
    .animate({ opacity: "hide" }, "slow");
}
return false;
});
});
</script>