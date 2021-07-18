<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\TodosList;
class TodosListPolicy
{
    use HandlesAuthorization;
    
    /**
    * Create a new policy instance.
    *
    * @return void
    */
    public function __construct()
    {
        //
    }
    
    public function create($user)
    {
        return $user->canAddTodoList();
    }
    
    public function edit($user,TodosList $todo)
    {
        return $user['id'] === $todo['user_id']; 
    }
    
    public function delete($user,$todo)
    {
        return $user['id'] === $todo['user_id'];
    }
}
