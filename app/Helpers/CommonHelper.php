<?php

namespace App\Helpers;

class CommonHelper {

    public static function generateButtonShow($url)
    {
        return "<a href='$url' class='btn btn-circle btn-info d-inline'><i class='fas fa-eye'></i></a>";
    }

    public static function generateButtonEdit($url)
    {
        return "<a href='$url' class='btn btn-circle btn-info d-inline'><i class='fas fa-pencil-alt'></i></a>";
    }

    public static function generateButtonDelete($url)
    {
        $csrfToken = csrf_token();
        return "<form method='POST' action='$url' class='ml-1 d-inline'><input name='_method' type='hidden' value='DELETE'><input name='_token' type='hidden' value='$csrfToken'><a class='btn btn-circle btn-danger' onclick='confirmDelete(event, this)'><i class='fas fa-trash-alt'></i></a></form>";
    }

    public static function generateButtonChangeStatus($url)
    {
        $csrfToken = csrf_token();
        return "<form method='POST' action='$url' class='ml-1 text-center d-inline'>
                        <input name='_method' type='hidden' value='PATCH'>
                        <input name='_token' type='hidden' value='$csrfToken'>
                        <a class='btn btn-circle btn-danger' onclick='confirmUpdate(event, this)'>
                            <i class='fas fa-sync-alt'></i>
                        </a>
                </form>";
    }


}
