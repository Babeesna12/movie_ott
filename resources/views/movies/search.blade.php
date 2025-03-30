<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Movies</title>
</head>
<style>
    /* General Styles */
body {
    font-family: Arial, sans-serif;
    background: url('https://source.unsplash.com/1600x900/?cinema,movie') no-repeat center center/cover;
    
    color: white;
    text-align: center;
    padding: 20px;
    
}

/* Header */
h1 {
    font-size: 2.5rem;
    margin-bottom: 20px;
    text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.8);
}

/* Search Form */
form {
    display: flex;
    justify-content: center;
    margin-bottom: 30px;
}

input[type="text"] {
    width: 40%;
    padding: 12px;
    border: none;
    border-radius: 25px;
    outline: none;
    font-size: 1rem;
}

button {
    background-color: #ff4b2b;
    border: none;
    color: white;
    padding: 12px 20px;
    font-size: 1rem;
    border-radius: 25px;
    margin-left: 10px;
    cursor: pointer;
    transition: background 0.3s ease;
}

button:hover {
    background-color: #ff1c00;
}

/* Movie Results */
ul {
    list-style: none;
    padding: 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

li {
    background: rgba(0, 0, 0, 0.8);
    padding: 15px;
    margin: 10px;
    border-radius: 10px;
    width: 250px;
    text-align: center;
    box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.2);
    transition: transform 0.3s ease;
}

li:hover {
    transform: scale(1.05);
}

img {
    border-radius: 10px;
    width: 100%;
    height: auto;
}

strong {
    display: block;
    margin: 10px 0;
    font-size: 1.2rem;
}

/* Add to Favorites Button */
form button {
    display: block;
    width: 100%;
    padding: 10px;
    background: #1db954;
    font-size: 1rem;
    transition: background 0.3s ease;
}

form button:hover {
    background: #1aa34a;
}

    </style>
<body>
    <h1>Movie Search</h1>
    <form method="GET" action="{{ route('movies.search') }}">
        <input type="text" name="query" placeholder="Enter movie title" required>
        <button type="submit">Search</button>
    </form>

    @if(isset($movies) && count($movies) > 0)
        <h2>Results:</h2>
        <ul>
            @foreach($movies as $movie)
                <li>
                    <img src="{{ $movie['Poster'] }}" alt="{{ $movie['Title'] }}" width="100">
                    <strong>{{ $movie['Title'] }} ({{ $movie['Year'] }})</strong>
                    <form method="POST" action="{{ route('movies.addToFavorites', $movie['imdbID']) }}">
                        @csrf
                        <input type="hidden" name="title" value="{{ $movie['Title'] }}">
                        <input type="hidden" name="year" value="{{ $movie['Year'] }}">
                        <input type="hidden" name="poster" value="{{ $movie['Poster'] }}">
                        <button type="submit">Add to Favorites</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>No movies found.</p>
    @endif
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Movies</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #2c3e50, #34495e); /* Dark gradient background */
            color: #ecf0f1; /* Light text color */
            text-align: center;
            padding: 40px;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 30px;
            color: #e74c3c; /* Accent color for heading */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        form {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
        }

        input[type="text"] {
            width: 50%;
            padding: 15px 20px;
            border: none;
            border-radius: 30px;
            outline: none;
            font-size: 1.1rem;
            background-color: rgba(255, 255, 255, 0.1); /* Slightly transparent input background */
            color: #ecf0f1;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        button {
            background-color: #e74c3c; /* Accent color for button */
            border: none;
            color: white;
            padding: 15px 30px;
            font-size: 1.1rem;
            border-radius: 30px;
            margin-left: 20px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #c0392b;
            transform: scale(1.05);
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
            background: rgba(255, 255, 255, 0.08); /* Slightly transparent movie card background */
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
            color: #f39c12; /* Another accent color for movie title */
        }

        form button[type="submit"] {
            display: block;
            width: 25%;
            padding: 12px;
            background:rgb(25, 123, 159); /* Green for add to favorites */
            font-size: 1rem;
            transition: background 0.3s ease;
            margin-top: 15px;
        }

       
        form {
    display: flex;
    flex-direction: column; /* Changed to column */
    align-items: center; /* Center items horizontally */
    margin-bottom: 40px;
}
    </style>
</head>
<body>
    <h1>Movie Search</h1>
    <form method="GET" action="{{ route('movies.search') }}">
        <input type="text" name="query" placeholder="Enter movie title" required>
        <button type="submit">Search</button>
    </form>

    @if(isset($movies) && count($movies) > 0)
        <h2>Results:</h2>
        <ul>
            @foreach($movies as $movie)
                <li>
                    <img src="{{ $movie['Poster'] }}" alt="{{ $movie['Title'] }}" width="100">
                    <strong>{{ $movie['Title'] }} ({{ $movie['Year'] }})</strong>
                    <form method="POST" action="{{ route('movies.addToFavorites', $movie['imdbID']) }}">
                        @csrf
                        <input type="hidden" name="title" value="{{ $movie['Title'] }}">
                        <input type="hidden" name="year" value="{{ $movie['Year'] }}">
                        <input type="hidden" name="poster" value="{{ $movie['Poster'] }}">
                        <button type="submit">Add to Favorites</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>No movies found.</p>
    @endif
</body>
</html>
