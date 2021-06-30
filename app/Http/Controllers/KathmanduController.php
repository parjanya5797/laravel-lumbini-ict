<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KathmanduController extends Controller
{
    public $data;

    public function __construct(){
       $this->middleware('terminateCheck')->except('index','create');
    }

    public function index() //run
    {
        echo "In index";
        dd($this->data);
    }

    public function create() //run
    {   
        echo "In Create";
        dd($this->data);
    }

    public function delete() 
    {   
        echo "In Create";
        dd($this->data);
    }


    public function view()
    {   
        echo "In Create";
        dd($this->data);
    }

    public function viewOne()
    {   
        echo "In Create";
        dd($this->data);
    }
}
