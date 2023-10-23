<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            .selectType{
                margin-bottom: 2%;
                padding: 1rem 2rem;
                font-size: 1rem;
                text-transform: uppercase;
                align-items: center;
                border: 1px solid #ccc; 
                border-radius: 0.5rem;
                           
            }
            .title{
                text-align: center;
                font-weight: 800;
            }
            .container{
                margin-top: 20%;
                align-items: center;
            }
            input{
                padding: 1rem 1rem;
                border: 1px solid #ccc;
                border-radius: 0.5rem;
                margin-bottom: 1rem;
                font-size: 1.5rem;
                gap: 1rem;

            }
            form{
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            .btn{
                
                background-color: #ED7D31;
                color: #F6F1EE;
                padding: 1rem 2rem;
                border: none;
                font-weight: bold;
                cursor: pointer;
                border-radius: 0.5rem;
                font-size: 1rem;
                text-transform: uppercase;
                transition: 0ms 0.1s ease-in-out;
                box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
            }

        </style>
    </head>
    <body class="antialiased">
        <div class="container">
        <form action="{{ route('update') }}" method="POST" enctype="multipart/form-data" >
            <div class="title">
            Update Students
            </div>
            <br>
            @csrf
            <input type="file" name="file" class="btn">
            <br>
            <button class="btn">Import User Data</button>
        </form>

        </div>
       


    </body>
</html>
