<?php

// change the language of the website
if (!function_exists('lang')) {
    function lang()
    {
        if (session()->has('lang')) {
            return session('lang');
        } else {
            return 'en';
        }
    }
}

if (!function_exists('getDir')) {
    function getDir()
    {
        if (session()->has('lang')) {
            if (session('lang') == 'ar') {
                return 'rtl';
            } else {
                return 'ltr';
            }
        } else {
            return 'ltr';
        }
    }
}

// get user name
if (!function_exists('username')) {
    function username()
    {
        return auth()->user()->name;
    }
}
// store image

if (!function_exists('storeMyImage')) {
    function storeMyImage($image, $role_id)
    {
        $path = $role_id == 1 ? 'admins' : 'doctors';
        $file = $image;
        $name = $path . '/' . $file->hashName();
        $file->storePubliclyAs('public', $name);
        return $name;
    }
}


// delete image from file system
if (!function_exists('deleteImg')) {
    function deleteImg($image)
    {
        if (!$image == null)
            unlink('storage/' . $image);
    }
}
// admin role
if (!function_exists('isAdmin')) {
    function isAdmin()
    {
        return auth()->user()->role->name == "admin";
    }
}
// doctor role
if (!function_exists('isDoctor')) {
    function isDoctor()
    {
        return auth()->user()->role->name == "doctor";
    }
}

// patient role
if (!function_exists('isPatient')) {
    function isPatient()
    {
        return auth()->user()->role->name == "patient";
    }
}

// change the string date to data
if (!function_exists('myDateFormatter')) {
    function myDateFormatter($stringDate)
    {
        // October, 9, 2020
        return date('Y-m-d', strtotime(implode('', explode(',', $stringDate))));
    }
}



