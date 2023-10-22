<?php

namespace App\Filters;

use Illuminate\Http\Request;

// This is a base class for all the filters 
class StudentFilter extends ApiFilter{



    // This is the list of all the parameters that are safe to be filtered
    protected $safeParms =[
        'name' => ['eq', 'like', 'ne'],
        'email' => ['eq', 'like'],
        'course' => ['eq', 'like', 'ne'],
    ];

    // This is the list of all the operators that can be used by the database
    protected $operatorMap = [
        'eq' => '=',
        'ne' => '!=',
        'like' => 'LIKE',
    ];

  
};