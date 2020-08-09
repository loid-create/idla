<?php

function is_login()
{
    $ci = get_instance();

    if (!$ci->session->userdata('email')) {
        redirect('home/masuk');
    }
}

function check_admin()
{
    $ci = get_instance();
    $user_check = $ci->session->userdata('role_id');

    if ($user_check == 2) {
        redirect('member');
    } elseif ($user_check == 3) {
        redirect('dokter');
    }
}

function check_member()
{
    $ci = get_instance();
    $user_check = $ci->session->userdata('role_id');

    if ($user_check == 1) {
        redirect('admin');
    } elseif ($user_check == 3) {
        redirect('dokter');
    }
}


function check_dokter()
{
    $ci = get_instance();
    $user_check = $ci->session->userdata('role_id');

    if ($user_check == 1) {
        redirect('admin');
    } elseif ($user_check == 2) {
        redirect('member');
    }
}
