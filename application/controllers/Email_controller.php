      
<?php

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
       // $this->load->library('session');
        $this->load->helper('form');
    }
    
    
    public function email(){
        $email_fr = 'iosapp@webeliteapps.com';
        $email_to = 'info@imasaustralia.com';
        $email_from = $this->input->post('email');
         $subject = $this->input->post('subject');
          $body = $this->input->post('body');
          
                $this->load->library('email', NULL, 'ci_email');
                $this->load->library('parser');
                $config['protocol']         = 'smtp'; // 'mail', 'sendmail', or 'smtp'
                $config['mailpath']         = 'mail.webeliteapps.com';
                $config['smtp_host']        = 'smtp.gmail.com'; // if you are using gmail password
                $config['smtp_user']        = 'iosapp@webeliteapps.com';
                $config['smtp_pass']        = 'D*N]D~SNg#%~';
                $config['smtp_port']        = 487; // for gmail
                $config['smtp_timeout']     = 5; 
                $config['charset'] = 'utf-8';
                $config['newline'] = "\r\n";
                 $config ['crlf'] = "\n";
                $config['mailtype']     = 'html'; 
                $config['wordwrap'] = TRUE;
               
            
                $this->load->library('email', $config);
              // $this->email->newline = "\r\n";
              // $subject = mb_encode_mimeheader($title,"UTF-8");
                $this->email->from($email_from); // change it to yours
                $this->email->to($email_fr);// change it to yours
                $this->email->cc($email_to);
                //$this->email->bcc($another1);
              // $this->email->set_header($msg);
                 
                $this->email->set_header('Content-Type', 'text/html');
                $this->email->subject($subject);
                $this->email->message($body);
                
                $this->email->crlf = "\n";
                
                if($this->email->send())
                {
                    echo'send';
                }
                else
                {
                    echo 'error';
                }
          
          
    }

//mfurqanulhaq1997@gmail.com
    // shahbaziqbal150@gmail.com
    
    //  public function index() {
    //     $this->load->view('check');
    // }
//   Visa Application - IMAS Australia
    
    function email_admin() {
        $title = "Visa Application - IMAS Australia";
        $email_from = 'iosapp@webeliteapps.com';
        $email_to = $this->input->post('email_to');
         $another = 'iosapp@webeliteapps.com';
       //  $another1 = 'shahbaziqbal150@gmail.com';
         $another1 = 'info@imasaustralia.com';
         
        $name = $this->input->post('name');
         $email = $this->input->post('email');
          $DOB = $this->input->post('DOB');
           $phone = $this->input->post('phone');
           $passport = $this->input->post('passport');
            $Visa  = $this->input->post('visa');
            $rate  = $this->input->post('rate');
        $main = 'We will be in contact with you shortly';
       
      
       
        $visa_rejection = $this->input->post('visa_rejection');
        $travel_countries = $this->input->post('travel_countries');
        $material_status = $this->input->post('material_status');
        $living_with_parent = $this->input->post('living_with_parent');
        $traveling_with_parent = $this->input->post('traveling_with_parent');
        $traveling_with_patner = $this->input->post('traveling_with_patner');
        $saving = $this->input->post('saving');
        $properties = $this->input->post('properties');
        $reletive_in_australia = $this->input->post('reletive_in_australia');
        $family_no_objection = $this->input->post('family_no_objection');
        $purpose_of_visit = $this->input->post('purpose_of_visit');
        $how_long_visit = $this->input->post('how_long_visit');
        
        
 
        
        if ($visa_rejection == 'yes') {
            $visa_rejection1 = '1. Is there any visa rejections in the past?  [YES]';
        } else {
            $visa_rejection1 = '1. Is there any visa rejections in the past?  [NO]';
        }
        
        if ($travel_countries == 'yes') {
            $travel_countries1 = '2. Have you travelled any of the following countries(UK, US or any Europe countries)?  [YES]';
        } else {
            $travel_countries1 = '2. Have you travelled any of the following countries(UK, US or any Europe countries)?  [NO]';
        }

        if ($material_status == 1) { //1 for single
        $material_status1 = '6. What is your Marital Status? [Single]';
            if ($living_with_parent == 'yes') {
                $living_with_parent1 = '3. Are you living with your parents?  [YES]';
            } else {
                $living_with_parent1 = '3. Are you living with your parents?  [NO]';
            }
        } else if ($material_status == 2) { //2 for married
        $material_status1 = '6. What is your Marital Status? [Married]';
            if ($traveling_with_parent == 'yes') {
                $living_with_parent1 = '3. Are you travelling with your family?  [YES]';
            } else {
                $living_with_parent1 = '3. Are you travelling with your family? = [NO]';
            }
        } else { // De facto
        $material_status1 = '6. What is your Marital Status? [De facto]';
            if ($traveling_with_patner == 'yes') {
                $living_with_parent1 = '3. Are you travelling with your partner?  [YES]';
            } else {
                $living_with_parent1 = '3. Are you travelling with your partner?  [NO]';
            }
        }
        
        if ($saving == 1) {
            $saving1 = '4. How much savings you have?  [Below 100,000LKR]';
        } else if ($saving == 2) {
            $saving1 = '4. How much savings you have?  [Between 100,000-500,000LKR]';
        } else {
            $saving1 = '4. How much savings you have?  [Above]';
        }
        
         if ($properties == 'yes') {
             $properties1 = '7. Do you have any properties under your name? [YES]';
            if ($reletive_in_australia == 'yes') {
                $reletive_in_australia1 = '5. Do you have anyone in Australia who is able to provide an Invitation letter? [YES]';
            } else {
                $reletive_in_australia1 = '5. Do you have anyone in Australia who is able to provide an Invitation letter?  [NO]';
            }
        } else if ($properties == 'no'){
            $properties1 = '7. Do you have any properties under your name? [NO]';
            if ($family_no_objection == 'yes') {
                $reletive_in_australia1 = '5. Can anyone in your family show their properties with a no objection letter?  [YES]';
            } else {
                $reletive_in_australia1 = '5. Can anyone in your family show their properties with a no objection letter? [NO]';
            }
        }
        
        if ($purpose_of_visit == 1) {
            $purpose_of_visit1 = '7. What is your main purpose of the visit?  [Transit]';
        } else if ($purpose_of_visit == 2) {
            $purpose_of_visit1 = '7. What is your main purpose of the visit? [Business]';
        } else if ($purpose_of_visit == 3) {
            $purpose_of_visit1 = '7. What is your main purpose of the visit? [Medical]';
        } else {
            $purpose_of_visit1 = '7. What is your main purpose of the visit? [Tourist]';
        }
       
        if ($how_long_visit == 1) {
            $how_long_visit1 = '8. For how long do you want to visit?  [Below 3 months]';
        } else if ($how_long_visit == 2) {
            $how_long_visit1 = '8. For how long do you want to visit? [1 Year]';
        } else {
            $how_long_visit1 = '8. For how long do you want to visit? [More Than One Year]';
        }
       
       if(!empty($Visa)){
          $body = "$title<br>
                 $main<br>
                <b>Name:</b>&nbsp; $name <br>
                <b>DOB:</b>&nbsp; $DOB <br> 
                <b>Email:</b>&nbsp; $email <br>
                <b>Phone No:</b>&nbsp;$phone <br>
                <b>Passport #:</b> &nbsp;$passport <br> 
                <b>Visa Rejected Countries:</b>&nbsp; $Visa <br>
                <b>Acceptance Rate:</b>&nbsp; $rate% <br>
                
                    $visa_rejection1<br>
                    $travel_countries1<br>
                    $living_with_parent1<br>
                    $saving1<br>
                    $reletive_in_australia1<br>
                    $material_status1<br>
                    $properties1<br>
                    $how_long_visit1<br>
                   
                ";
       }else{
       
        $body = "$title<br>
                 $main<br>
                <b>Name:</b>&nbsp; $name <br>
                <b>DOB:</b>&nbsp; $DOB <br> 
                <b>Email:</b>&nbsp; $email <br>
                <b>Phone No:</b>&nbsp;$phone <br>
                <b>Passport #:</b> &nbsp;$passport <br> 
                <b>Visa Rejected Countries:</b>&nbsp; $Visa <br>
                <b>Acceptance Rate:</b>&nbsp; $rate% <br>
                
                    $visa_rejection1<br>
                    $travel_countries1<br>
                    $living_with_parent1<br>
                    $saving1<br>
                    $reletive_in_australia1<br>
                    $material_status1<br>
                    $properties1<br>
                    $how_long_visit1<br>
                   
                ";
       }
      
      $subject = 'Visa Application - IMAS Australia';
        //  $skuList = explode(PHP_EOL,$body);
            
    //     $list = array($email_to, $another);
    //     $send =implode(', ', $list);
    //     $data = [
    //              'body' => $skuList
    //          ];
  
    //   $msg = $this->load->view('check',$data,true);
      $this->load->library('email', NULL, 'ci_email');
        $this->load->library('parser');

    // $config = Array(
    //     'protocol' => 'smtp',
    //     'smtp_host' => 'ssl://smtp.googlemail.com',
    //     'smtp_port' => 465,
    //     'smtp_user' => 'iosapp@webeliteapps.com',
    //     'smtp_pass' => ' D*N]D~SNg#%~',
    //     'mailtype'  => 'html',
    //     'charset'   => 'iso-8859-1'
    // );
    $config['protocol']         = 'smtp'; // 'mail', 'sendmail', or 'smtp'
    $config['mailpath']         = 'mail.webeliteapps.com';
    $config['smtp_host']        = 'smtp.gmail.com'; // if you are using gmail
    $config['smtp_user']        = 'iosapp@webeliteapps.com';
    $config['smtp_pass']        = 'D*N]D~SNg#%~'; // App specific password
    $config['smtp_port']        = 465; // for gmail
    $config['smtp_timeout']     = 5; 
   $config['charset'] = 'utf-8';
    $config['newline'] = "\r\n";
   $config ['crlf'] = "\n";
    $config['mailtype']     = 'html'; 
    $config['wordwrap'] = TRUE;
   

    $this->load->library('email', $config);
   // $this->email->newline = "\r\n";
   // $subject = mb_encode_mimeheader($title,"UTF-8");
    $this->email->from($email_from); // change it to yours
    $this->email->to($email_to);// change it to yours
    $this->email->cc($another);
    $this->email->bcc($another1);
  // $this->email->set_header($msg);
     
    $this->email->set_header('Content-Type', 'text/html');
    $this->email->subject($subject);
    $this->email->message($body);
    
    $this->email->crlf = "\n";
    
    if($this->email->send())
    {
        echo'send';
    }
    else
    {
        echo 'error';
    }
        
     }
 

}

?>