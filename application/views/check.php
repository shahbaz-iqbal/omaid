
    public function check() {
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
            if ($living_with_parent == 'yes') {
                $living_with_parent1 = '3. Are you living with your parents?  [YES]';
            } else {
                $living_with_parent1 = '3. Are you living with your parents?  [NO]';
            }
        } else if ($material_status == 2) { //2 for married
            if ($traveling_with_parent == 'yes') {
                $living_with_parent1 = '3. Are you travelling with your family?  [YES]';
            } else {
                $living_with_parent1 = '3. Are you travelling with your family? = [NO]';
            }
        } else { // De facto
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
            if ($reletive_in_australia == 'yes') {
                $reletive_in_australia1 = '5. Do you have anyone in Australia who is able to provide an Invitation letter? [YES]';
            } else {
                $reletive_in_australia1 = '5. Do you have anyone in Australia who is able to provide an Invitation letter?  [NO]';
            }
        } else if ($properties == 'no'){
            if ($family_no_objection == 'yes') {
                $reletive_in_australia1 = '5. Can anyone in your family show their properties with a no objection letter?  [YES]';
            } else {
                $reletive_in_australia1 = '5. Can anyone in your family show their properties with a no objection letter? [NO]';
            }
        }

        if ($purpose_of_visit == 1) {
            $purpose_of_visit1 = '6. What is your main purpose of the visit?  [Transit]';
        } else if ($purpose_of_visit == 2) {
            $purpose_of_visit1 = '6. What is your main purpose of the visit? [Business]';
        } else if ($purpose_of_visit == 3) {
            $purpose_of_visit1 = '6. What is your main purpose of the visit? [Medical]';
        } else {
            $purpose_of_visit1 = '6. What is your main purpose of the visit? [Tourist]';
        }
//        $data = [
//            'visa' => $visa_rejection1,
//            'travel' => $travel_countries1,
//            // 'matirial' => $material_status1,
//            'living_parent' => $living_with_parent1,
//            //  'traveling_parrent' => $traveling_with_parent1,
//            //   'traveling_patner' => $traveling_with_patner1,
//            //   'property' => $properties1,
//            'relative_autralia' => $reletive_in_australia1,
//            // 'family_objection' => $family_no_objection1,
//            'purpose' => $purpose_of_visit1
//        ];
        $body = "svsvdsvd<br>
             
                <b>Name:</b>&nbsp;  svd <br>
                <b>DOB:</b>&nbsp; sdv <br> 
                <b>Email:</b>&nbsp; sdv <br>
                <b>Phone No:</b>&nbsp;sdv <br>
                <b>Passport #:</b> &nbsp;sdv <br> 
                <b>Visa Rejected Countries:</b>&nbsp; svdsvd <br>
                <b>Acceptance Rate:</b>&nbsp; svdsdv% <br>
                
                    $visa_rejection1<br>
                    $travel_countries1<br>
                    $living_with_parent1<br>
                    $saving1<br>
                    $reletive_in_australia1<br>
                    $purpose_of_visit1<br>
                ";

        echo '<pre>';
        print_r($body);
        echo '</pre>';
        die();
    }



