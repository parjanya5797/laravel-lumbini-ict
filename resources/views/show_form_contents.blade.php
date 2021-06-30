<html>
<head>
    <title>Form Contents</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    {{-- <style>
        .color-red{
            color: brown;
            background: red;
        }
    </style> --}}
</head>
<body>
    <div class="container">
        <div class="row">
                <div class="color-red">
                    {{-- Name:{{$name}} --}}
                    <br>
                    Age:{{$age}}
                    @if($age <= 25)
                        <p>You are a teenager </p>
                        @if($age >= 10)
                            You are above 10
                        @else
                            You are below 10
                        @endif
                    @elseif($age <= 50)
                        <p>You are a man</p>
                    @elseif($age <= 50)
                        <p>You are a man</p>
                    @else
                        <p>You are a old</p>
                    @endif
                    <br>
                    Gender:
                    {{-- @if($gender == 'male')
                        <p style="color:blue">Male</p>
                    @else
                        <p style="color:red">Female</p>  
                    @endif --}}

                    @switch($gender)
                        @case('male')
                            <p style="color:blue">Male</p>
                            @break
                        @case('female')
                            <p style="color:red">Female</p>
                            @break
                        @default
                            <p>Others</p>
                    @endswitch

                   <div>
                       <hr>
                        @if($gender == 'male')
                           Male 
                        @elseif($gender == 'female')
                            Female
                        @else
                            Others
                   @endif
                   </div>
                    <br>
                    Hobbies:
                                        {{-- 0           1           2 --}}
                    {{-- $hobbies = ['basketball','hiking','cycling']; --}}
{{-- Foreach --}}
                    @foreach($hobbies as $hobby)
                        {{$hobby}}
                    @endforeach
                    <br>
                    {{-- //For Loop --}}
                    @for($i =0;$i<=10;$i++)
                       
                        @continue($i == 6)
                        {{$i}} 
                    @endfor

                    <br>
                    {{-- //While Loop --}}
                    <?php $i = 0; ?>
                    @while($i < 10)
                        {{$i}}
                        <?php $i++; ?>
                    @endwhile
                    
                   
                </div>

        </div>
<hr>
        <div class="row">
            {{-- @foreach($people as $person)
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
            @endforeach --}}
            <table class="table table-striped">
                <thead>
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Age</th>
                </thead>
                <tbody>
                    @foreach($people as $person)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$person['name']}}</td>
                        <td>{{$person['age']}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>