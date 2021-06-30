<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourceController extends Controller
{

    //CRUD Operation Create Read Update Delete
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //get path of the url after the root of our application
        // $path = $request->path();
        // echo $path;
        // echo '<br>';
        // //to get the full url 
        // $full = $request->fullUrl();
        // echo $full;
        // echo '<br>';
        // //to get the method of the route
        // $method = $request->method();
        // echo $method;
        // echo '<br>';
        // //to check if the method is correct or not
        // $isPOST = $request->isMethod('POST');
        // echo($isPOST);

        // dd($request);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($request);
        //To get all the query request key values
        // $allquery = $request->query();
        // dd($allquery);
        //TO get an individual query string
        // $queryname = $request->query('name');
        // dd($queryname);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        
        //to retrive all  the requests
        // $allrequests = $request->all();
        // dd($allrequests);

        //to retrive a single request 
        // $name = $request->except(['name','age']);
        $age = $request->age; //$request->input('age');
        $name = $request->name;
        $gender = $request->gender;
        $hobbies = $request->hobbies;
        // dd($age,$name,$gender);
        // $hasName = $request->has(['name','age']); // check if all the values are set or not 
        // $hasAny = $request->hasAny(['name','age']);// checks if any one of the values is set. 
        // $filled = $request->filled('name'); //checks if the input data field is filled or not 
        // $missing = $request->missing('name'); //checks if the given input filed is missing or not 
        // $notHas = !$request->has('name'); // similar to missing method
        // // dd($notHas);
        // echo "name:".$name;

        // echo "age:".$age;
        
        $people = [
            [
                'name' => 'Test 1',
                'age' => '50', 
                'sex' => 'm'
            ],
            [
                'name' => 'Test 2',
                'age' => '40', 
                'male' =>'f'
            ],
            [
                'name' => 'Test 3',
                'age' => '30', 
            ],
            [
                'name' => 'Test 4',
                'age' => '20', 
            ],

        ];
        return view('show_form_contents',compact('age','name','gender','hobbies','people')); 
        // return view('show_form_contents')->with([
        //     'name' => $name,
        //     'age' => $age,
        //     'gender' => $gender
        //     ]);
        // return view('show_form_contents',[
        //     'name' => $name,
        //     'age' => $age,
        //     'gender' => $gender
        //     ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
