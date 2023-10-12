@extends('layouts.app')

@section('content')
    <style>
        .content{
            margin-top: 200px;
        }
        .container {
            max-width: 400px;
            margin: 60px auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .logout-link {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }

        .logout-link:hover {
            text-decoration: underline;
        }
        .menu{
            display: flex;
            justify-content: center;
            gap: 40px;
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
            border: 2px solid #007bff;
        }
        .menu_button:hover {
            background-color: #007bff;
            color: white;
        }
    </style>
    <div class="content">
        <div class="menu">
            <div class="menu_div">
                <a href="{{ route('notice-board.index') }}" class="logout-link menu_button">Notice Board</a>
            </div>
            <div class="menu_div">
                <a href="{{ route('logOutAdmin') }}" class="logout-link menu_button">Log Out</a>
            </div>
        </div>
        <div class="container">
            <h1>Create a New Story</h1>

            <form method="POST" action="{{ route('story.store') }}">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit Story</button>
            </form>
        </div>
    </div>
@endsection
