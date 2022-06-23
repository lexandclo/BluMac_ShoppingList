<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Darrens Shopping List</title>

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>       

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        @if (Route::has('login'))
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse container" id="navbarNav">
              <ul class="navbar-nav">
                
                <li class="nav-item active">
                  <a class="nav-link" href="{{ url('/home') }}">Home </a>
                </li>
                    @auth
                        <li class="nav-item">
                        <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                        </li>
                    @else
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Log in</a>
                        </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                        <a class="nav-link " href="{{ route('register') }}">Register</a>
                        </li>
                    @endif
                @endauth
              </ul>
            </div>
          </nav>
          @endif
        <div class="container">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
             @endif
            <h1> Shopping  List </h1>

            <div class="row" style="margin-bottom: 20px;">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h3>Items</h3>
                    </div>
                    <div class="pull-right">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                
                        <form action="{{ route('shopping.store') }}" method="POST">
                            @csrf
                    
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Qty:</strong>
                                        <input type="text" name="qty" class="form-control">
                                    </div>
                                </div>
                               
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <button type="submit" class="btn btn-success">Add Item</button>
                                </div>
                               
                            </div>
                    
                        </form>
                    
                    </div>
                </div>
            </div>
        
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <th>Qty</th>
                    @auth
                      <th>Action</th>
                    @endauth
                </tr>
                @foreach ($shoppingitems  as $shopping_item)
                    <tr>
                        <td>{{ $shopping_item->name }}</td>
                        <td>{{ $shopping_item->qty }}</td>
                        @auth
                        <td>
                        <form action="{{ route('shoppingitem.destroy',['shoppingitem' => $shopping_item->id] ) }}" method="POST">    
                            @csrf
                            @method('DELETE')
    
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        </td>
    
                        @endauth
                        
                    </tr>
                @endforeach
            </table>
            
        </div>  
            
                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
