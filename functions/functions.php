<?php
    //fetch all data for each member and put it in an assoc_array

     function getmemberDetails($input){
        $rowData;
    
        if(!empty($input)){
            foreach($input as $value ){

                $newUser  = array(
                    "id" => ($value->id),
                    "name" => ($value->name),
                    "email" => ($value->email),
                    "gender" => ($value->gender),
                    "regno" => ($value->reg_no),
                    "category" => ($value->category),
                    "status" => ($value->status),

                    "tel" => ($value->tel),
                    "website" => ($value->website),
                    "created" => ($value->created),
                    "bio" => ($value->bio),
                    "address" => ($value->address)
                );
                extract($newUser);

                $email = "<a href=\"mailto:".$email."\">".$email."</a>";
                $contacts = $email."<br/>".$tel;
                $status = getStatus($status);
                
                echo  "<tr>
                        <td><input type=\"checkbox\"></td>
                        <td>".$id."</td>
                        <td>".$name."</td>
                        <td>".$regno."</td>
                        <td>".$contacts."</td>
                        <td>".$gender."</td>
                        <td>".$category."</td>
                        <td>".$created."</td>
                        <td>".$status."</td>
                        <td>
                        <a href=\"index.php?edit=".$id."\"><span class=\"glyphicon glyphicon-pencil\"></span></a>

                        <a href=\"javascript:sureToApprove(".$id.")\"><span class=\"glyphicon glyphicon-trash\"></span></a></td>
                    </tr>";
            }
        }
        else{
            return false;
            
        }
    }
    function getStatus($status){
        if($status == 0){
            $status = "<span class=\"label label-default\">Pending</span>";
            
        }else if($status == 1){
            $status = "<span class=\"label label-success\">Active</span>";

        }else{
            $status = "<span class=\"label label-danger\">Deactivated</span>";
        }
        return $status;
    }


    function getRegno($category){
        $db = Database::getInstance();

        $prefix = "sph-";
        $year = date("Y");
        
        // Get all IDs and compare with a rand no. to get unique
        if($res = $db::getAll( "id","users")){
            
            foreach ($res as $key => $arr) {
                foreach ($arr as $key => $value) {
                    $arr = array();
                    array_push($arr, $value);
                    
                    $rand = rand(0, 9999);
                    if(!in_array($rand ,  $arr)){
                        $id = $rand;
                    }
                }
            }
        }
        
        // Assign each categogory an id ie tech = 1, art = 2 and both = 3;
        switch ($category) {
            case 'techie':
                $category = 001;
                break;
            
            case 'art':
                $category = 002;
                break;
            default:
                $category = 003;
                break;
        }

        // concat the prefix, category id, uniq rand no and year to regno of format: sph-001-0001/2016
        if($regno = $prefix."".$category."-".$id."/".$year){
            return $regno;
        }

    }

    

    function addMember($fields = array()){
      $_db = Database::getInstance();

        if($_db->insert("users",$fields)){
            return true;
        }else{
            return false;
        }
    }
?>