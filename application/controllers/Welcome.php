<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index() {
        $this->load->view('login');
    }

    public function dashboard() {

        //////////////////////For User by Date mounth Wise///////////////////////////
//        $day = date('d');
//       $month = date('m');
//       $year = date('Y');

        $get_user_mounth = $this->Welcomes->get_mounth_wise_user();
        $get_user_year = $this->Welcomes->get_year_wise_user();
        $get_user_day = $this->Welcomes->get_day_wise_user();

        $get_age_user_range_20_30 = $this->Welcomes->get_user_by_age_range_20_30();
        $get_age_user_range_30_40 = $this->Welcomes->get_user_by_age_range_30_40();
        $get_age_user_range_40_50 = $this->Welcomes->get_user_by_age_range_40_50();
        //////////////////////For User by Date mounth Wise/////////////////////////
        //////////////////////For Toytal bill Date Wise///////////////////////////
        $total_bill_made_day = $this->Welcomes->get_total_bill_per_day();
        foreach ($total_bill_made_day as $value) {
            $sum_day[] = $value->total_price;
        }
        $total_day_bill = array_sum($sum_day);

        $total_bill_made_year = $this->Welcomes->get_total_bill_per_year();
        foreach ($total_bill_made_year as $year) {
            $sum_year[] = $year->total_price;
        }
        $total_year_bill = array_sum($sum_year);
        $total_bill_made_month = $this->Welcomes->get_total_bill_per_month();

        foreach ($total_bill_made_month as $month) {
            $sum_month[] = $month->total_price;
        }
        $total_month_bill = array_sum($sum_month);

        //////////////////////For Toytal bill Date Wise///////////////////////////
        //////////////////////Top Location Gender Or charts///////////////////////
        $top_location = $this->Welcomes->top_locations();
        foreach ($top_location as $year) {
            $sum_year[] = $year->location;
        }
        $count_value = array_count_values($sum_year);
        //$find_top_location_count = (max($count_value));
        //$find_top_location = array_search(max($count_value), $count_value);
        $find_top_location_count = 250;
        $find_top_location = 'mall of lahore';
        $top_gender = $this->Welcomes->top_gender();
        foreach ($top_gender as $yeargender) {
            $sum_gender[] = $yeargender->gender;
        }
        $count_valu = array_count_values($sum_gender);
        //  $find_top_Gender_count = (max($count_valu));
        // $find_top_Gender = array_search(max($count_valu), $count_valu);
        $find_top_Gender_count = 100;
        $find_top_Gender = 'Male';

        $suggested_compny = $this->Welcomes->top_suggested_company();
        foreach ($suggested_compny as $topcomapny) {
            $top_comapny[] = $topcomapny->location;
        }
        $count_vall = array_count_values($top_comapny);
        //$find_top_company_count = (max($count_vall));
        //$find_top_company = array_search(max($count_vall), $count_vall);
        $find_top_company_count = 140;
        $find_top_company = 'Z-company';
        //////////////////////Top Location Gender Or charts///////////////////////////
        //////////////////////Top Vouchers///////////////////////////
        $voucher_per_day = $this->Welcomes->top_voucher_per_day();
        $voucher_per_month = $this->Welcomes->top_voucher_per_month();
        $voucher_per_year = $this->Welcomes->top_voucher_per_year();

        //////////////////////Top Vouchers///////////////////////////

        $managers = (count($this->Managers->get_manager()));
        $shop = (count($this->Shops->get_shop()));
        $users = $this->Welcomes->get_all_user();
        $vouchers = $this->Welcomes->get_all_vouchers();

        $recent_shop = $this->Welcomes->recent_shop();
        $recent_user = $this->Welcomes->recent_user();

        $feedback_on_note = $this->Welcomes->recent_feedback_on_note();
        $feedback = $this->Welcomes->recent_feedback();
        $reports = $this->Welcomes->recent_reports();
        $data = [
            'top_company_count' => $find_top_company_count,
            'top_company' => $find_top_company,
            'top_gender_count' => $find_top_Gender_count,
            'top_gender' => $find_top_Gender,
            'top_location_count' => $find_top_location_count,
            'top_location' => $find_top_location,
            'voucher_year' => $voucher_per_year,
            'voucher_month' => $voucher_per_month,
            'voucher_day' => $voucher_per_day,
            'year_bill' => $total_year_bill,
            'month_bill' => $total_month_bill,
            'day_bill' => $total_day_bill,
            'age_range_20_30' => $get_age_user_range_20_30,
            'age_range_30_40' => $get_age_user_range_30_40,
            'age_range_40_50' => $get_age_user_range_40_50,
            'user_month' => $get_user_mounth,
            'user_year' => $get_user_year,
            'user_day' => $get_user_day,
            'recentShop' => $recent_shop,
            'recentUser' => $recent_user,
            'manager' => $managers,
            'shop' => $shop,
            'user' => $users,
            'voucher' => $vouchers,
            'report' => $reports,
            'feedback' => $feedback
        ];

        $this->load->view('dashboard', $data);
    }

    public function bill() {

        $year = $this->input->post('year');
        $month = $this->input->post('month');
        $date = $month . '/' . $year;
        if (!empty($date)) {
            $res = $this->Welcomes->total_bill($date);
            $data = [
                'bill' => $res
            ];
        } else {
            $res = $this->Welcomes->get_total_bill();
            $data = [
                'bill' => $res
            ];
        }
        $this->load->view('total_bill_detail', $data);
    }

    public function login() {

        $name = $this->input->post('user');
        $username = $this->input->post('user');
        $pass = $this->input->post('password');
        $data = [
            'username' => $username,
            'email' => $name,
            'password' => $pass,
        ];
        $res = $this->Welcomes->get_users($data);
        if ($res) {
            $data = [
                'user_detail' => $res,
                'logged_in' => TRUE
            ];
            $this->session->set_userdata($data);
        }
        if (!empty($res)) {
            $this->session->set_flashdata('success', 'Login Successfully');
            redirect('Welcome/dashboard');
        } else {
            $this->session->set_flashdata('error', 'Invalid Email\Password');
            redirect('Welcome/index');
        }
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect(base_url(), 'refresh');
    }

//    public function subscription() {
//        
//        $this->session->unset_userdata('logged_in');
//        session_destroy();
//        redirect(base_url(), 'refresh');
//    }
}
