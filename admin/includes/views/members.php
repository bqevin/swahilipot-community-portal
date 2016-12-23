<?php

require_once 'functions/functions.php';
$msg = "";

if(isset($GET["msg"])){
    $msg = $GET["msg"];
}


?>

<div class="profile">
<div id="msg"><?php echo $msg; ?></div>
<table class="table table-hover">
    <tr>
        <th><input class="checkall" type="checkbox"></th>
        <th>#</th>
        <th>Full Names</th>
        <th>Regestration No.</th>
        <th>Contact</th>
        <th>Sex</th>
        <th>Cartegory</th>
        <th>Created</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>

<?php

$_db = Database::getInstance();

if($data = $_db::getAll("*","users")){

    getmemberDetails($data);
    // echo "<p class='alert alert-info'>There Are no Regesterd Members!!!</p>";
            
}
else{
    
}

?>
    
</table>

</div>
<?php
require_once 'register.php';
?>

</div>

