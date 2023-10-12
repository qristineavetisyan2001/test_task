@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Notice Board</h1>

        <div id="board" class="board">

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>

        const refreshBoard = (stories)  => {
            $('#board').empty();
            for(let story of stories){
                $('#board').append(`<div><h2>${story.title}</h2><p>${story.description}</p></div>`);
            }
        }

        setInterval(()=>{
            fetch('http://127.0.0.1:8000/getApprovedStories').then(res=>res.json()).then(res=>{
                refreshBoard(res);
            })
        }, 2000)


    </script>
@endsection
