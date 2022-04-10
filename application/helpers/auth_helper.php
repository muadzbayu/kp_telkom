<?php
defined('BASEPATH') OR die('No direct script access allowed!');

function is_login($is_true = false)
{
    $CI =& get_instance();
    if (!@$CI->session->is_login && !$is_true) {
        redirect('auth/');
    } elseif ($CI->session->is_login && $is_true) {
        redirect('dashboard');
    }

    return;
}

function is_stts($stts)
{
    $CI =& get_instance();
    if ($CI->session->stts == $stts) {
        return true;
    }

    return false;
}

function redirect_if_status_not($stts)
{
    $CI =& get_instance();
    $is_match = false;
    if (is_array($stts)) {
        if (in_array($CI->session->stts, $stts)) {
            $is_match = true;
        }
    } else {
        $is_match = is_stts($stts);
    }

    if (!$is_match) {
        return redirect('dashboard/');
    }

    return;
}
