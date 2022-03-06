<?php
namespace App\MyService;

class Alert
{
    /**
     * Generates a custom alert with the specified message
     *
     * @param String $message
     * @return \Illuminate\Http\Response
     */
    public function wrongInput($message)
    {
        return view('alert.wrongInput', compact('message'));
    }

    /**
     * Generates a custom modal with the specified messages and route
     *
     * @param String $name
     * @param String $header
     * @param String $message
     * @param String $route
     * @return \Illuminate\Http\Response
     */
    public function modal($name, $header, $message, $route)
    {
        return view('alert.modal', compact('name', 'header', 'message', 'route'));
    }
}