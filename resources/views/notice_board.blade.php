@extends('layouts.app')

@section('content')
    <style>
        /* styles.css */
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 100px auto;
            padding: 20px;
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        .board {
            margin: 20px 0;
        }

        .story {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            margin: 10px 0;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 20px;
            margin: 0;
            padding: 0;
        }

        p {
            font-size: 16px;
            margin: 10px 0;
        }
        .menu{
            display: flex;
            justify-content: space-between;
        }
        .menu_div{
            display: flex;
            justify-content: space-evenly;
        }
        .menu_button{
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            transition-duration: 0.4s;
            cursor: pointer;
            background-color: white;
            color: black;
            border: 2px solid #000000;
        }
        .menu_button:hover {
            background-color: #000000;
            color: white;
        }
    </style>
    <div class="container">
        <div class="menu">
            <div class="menu_div">
                <a href="{{ route('story.create') }}" class="logout-link menu_button">Create Story</a>
            </div>
            <div class="menu_div">
                <a href="{{ route('logOutAdmin') }}" class="logout-link menu_button">Log Out</a>
            </div>
        </div>
        <h1>Notice Board</h1>

        <div id="board" class="board">

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        const refreshBoard = (stories)  => {
            $('#board').empty();
            for(let story of stories){
                $('#board').append(`<div class="story"><h2>${story.title}</h2><p>${story.description}</p></div>`);
            }
        }
        setInterval(()=>{
            fetch('http://127.0.0.1:8000/getApprovedStories').then(res=>res.json()).then(res=>{
                refreshBoard(res);
            })
        }, 2000)

    </script>
@endsection
