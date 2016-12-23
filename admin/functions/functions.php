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


    function getRegno($reg){
        $db = Database::getInstance();

        $prefix = "SPH/MSA/";
        $month = date("M");
        $year = date("Y");
        
        // Get all IDs and compare with a rand no. to get unique
        // concat the prefix, category id, uniq rand no and year to regno of format: sph-001-0001/2016
        if($regno = $prefix."".$reg."/".$month."/".$year){
            return $regno;
        }

    }

    function sendActivationLink( $regno, $fname, $email){

        $from = "infor@swahilipot.co.ke";
        $subject = 'Swahilipot Account Activation';
        $message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Swahilipot Message</title></head><body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px; background:#1A237E; font-size:24px; color:#fff;"><a href="http://www.swahilipot.co.ke"><img src="https://www.facebook.com/Swahilipot/photos/a.1064566223585115.1073741829.1062563580452046/1162658900442513/?type=1&theater" width="36" height="30" alt="swahilipot" style="border:none; float:left;"></a>swahilipot Account Activation</div><div style="padding:24px; font-size:17px;">Hello '.$fname.',<br /><br />Click the link below to activate your account when ready:<br /><br /><a href="http://members.swahilipothub.co.ke/activation.php?email='.$email.'">Click here to activate your account now</a><br /><br />Login after successful activation using your:<br />* E-mail Address: <b>'.$email.'</b></div></body></html>';
        $headers = "From: $from\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
        
        if(mail($email, $subject, $message, $headers)){
            $msg = "<p class=\"alert alert-success\" >Activation Link Sent to ".$fname."</p>";
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