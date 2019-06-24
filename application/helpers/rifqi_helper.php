<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function chek_session() {
    $ci = & get_instance();
    if ($ci->session->userdata('status_login') != 'login_diterima') {
        redirect('login');
    }
}