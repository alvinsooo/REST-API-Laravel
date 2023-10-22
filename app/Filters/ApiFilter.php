<?php

namespace App\Filters;

use Illuminate\Http\Request;

// This is a base class for all the filters 
class ApiFilter{

    // This is the list of all the parameters that are safe to be filtered
    protected $safeParms =[];

    // This is the list of all the operators that can be used by the database
    protected $operatorMap = [];

    // This is the function that will transform the request into a query
    public function transform(Request $request){
    
        $finalQueryrOutput = [];

        // Loop through all the safe parameters
        foreach( $this -> safeParms as $pram => $operators){
            // Get the query from the request
            $query =  $request -> query($pram);

            // Check if the query is empty
            if(! isset($query)){
                continue;
            };
            
            // Loop through all the operators that can be use for this column
            foreach($operators as $operator){

                // Check if the operator is valid for this column
                if( isset($query[$operator])){
                    //[column, operator, value]
                    $finalQueryrOutput[] = [$pram, $this -> operatorMap[$operator], $query[$operator]];
                };
            };
        };
        return $finalQueryrOutput;   
    }
};