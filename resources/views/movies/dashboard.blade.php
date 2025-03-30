<!-- <!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Favorite Movies</title>
</head>
<body>
    <h1>Welcome, {{ auth()->user()->name }}</h1>
    <h2>Your Favorite Movies</h2>

    @if($favorites->isEmpty())
        <p>No favorite movies added yet.</p>
    @else
        <ul>
            @foreach($favorites as $movie)
                <li>
                    <img src="{{ $movie->poster }}" alt="{{ $movie->title }}" width="100">
                    <strong>{{ $movie->title }} ({{ $movie->year }})</strong>
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('logout') }}">Logout</a>
</body>
</html> -->

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Favorite Movies</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background:  linear-gradient(135deg, #2c3e50, #34495e);/* Deep purple to red gradient */
            color: #ecf0f1;
            text-align: center;
            padding: 40px;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            color: #ffca28; /* Golden accent for welcome */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 30px;
            color: #ff8a80; /* Light red accent for favorites title */
        }

        ul {
            list-style: none;
            padding: 0;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            justify-content: center;
        }

        li {
            background: rgba(255, 255, 255, 0.08);
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        li:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
        }

        img {
            border-radius: 10px;
            width: 100%;
            height: auto;
            margin-bottom: 15px;
        }

        strong {
            display: block;
            margin-bottom: 10px;
            font-size: 1.2rem;
            color: #f39c12; /* Yellow for movie title */
        }

        p {
            font-size: 1.1rem;
            margin-bottom: 30px;
        }

        a {
            display: inline-block;
            padding: 12px 25px;
            background:rgb(94, 143, 229); /* Pink logout button */
            color: white;
            text-decoration: none;
            border-radius: 30px;
            font-size: 1rem;
            transition: background 0.3s ease, transform 0.2s ease;
        }

     
    </style>
</head>
<body>
    <h1>Welcome, {{ auth()->user()->name }}</h1>
    <h2>Your Favorite Movies</h2>

    @if($favorites->isEmpty())
        <p>No favorite movies added yet.</p>
    @else
        <ul>
            @foreach($favorites as $movie)
                <li>
                    <img src="{{ $movie->poster }}" alt="{{ $movie->title }}" width="100">
                    <strong>{{ $movie->title }} ({{ $movie->year }})</strong>
                </li>
            @endforeach
        </ul>
    @endif

    @foreach ($favorites as $favorite)
    <div class="movie">
        <img src="{{ $favorite->poster }}" alt="{{ $favorite->title }}">
        <h3>{{ $favorite->title }} ({{ $favorite->year }})</h3>
        
        <form action="{{ route('favorites.remove', $favorite->movie_id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Remove from Favorites</button>
        </form>
    </div>
@endforeach


    <a href="{{ route('logout') }}">Logout</a>
</body>
</html> --> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Favorite Movies</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #2c3e50, #34495e);
            color: #ecf0f1;
            text-align: center;
            padding: 40px;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            color: #ffca28;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 30px;
            color: #ff8a80;
        }

        .movies-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            justify-content: center;
            padding: 0;
        }

        .movie {
            background: rgba(255, 255, 255, 0.08);
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .movie:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
        }

        .movie img {
            border-radius: 10px;
            width: 100%;
            height: auto;
            margin-bottom: 15px;
        }

        .movie h3 {
            font-size: 1.2rem;
            color: #f39c12;
            margin-bottom: 10px;
        }

        .btn-remove {
            display: inline-block;
            padding: 10px 20px;
            background: #e74c3c;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1rem;
            transition: background 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-remove:hover {
            background: #c0392b;
        }

        .logout {
            display: inline-block;
            padding: 12px 25px;
            background: rgb(94, 143, 229);
            color: white;
            text-decoration: none;
            border-radius: 30px;
            font-size: 1rem;
            transition: background 0.3s ease;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <h1>Welcome, {{ auth()->user()->name }}</h1>
    <h2>Your Favorite Movies</h2>

    @if($favorites->isEmpty())
        <p>No favorite movies added yet.</p>
    @else
        <div class="movies-container">
            @foreach ($favorites as $favorite)
                <div class="movie">
                    <img src="{{ $favorite->poster }}" alt="{{ $favorite->title }}">
                    <h3>{{ $favorite->title }} ({{ $favorite->year }})</h3>
                    
                    <form action="{{ route('favorites.remove', $favorite->movie_id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-remove">Remove from Favorites</button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif

    <a href="{{ route('logout') }}" class="logout">Logout</a>
</body>
</html>
