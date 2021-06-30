<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body>
  <form action="{{url('/resource')}}" method="POST"> 
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name">
    <br>
    <label for="age">Age</label>
    <input type="number" name="age"> 
    <br>
    <label for="gender">Gender</label>
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="female">Female
    <br>
    <label for="Hobbies">Hobbies</label>
    <input type="checkbox" name="hobbies[]" multiple value="movies">Movies
    <input type="checkbox" name="hobbies[]" multiple value="hiking">Hiking   
    <input type="checkbox" name="hobbies[]" multiple value="Basketball">Basketball
    <br>
    <br>
    <input type="submit" value="Submit">

    </form>  
</body>
</html>