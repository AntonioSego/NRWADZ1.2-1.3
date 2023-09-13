<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body class="bg-dark-subtle">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Ispis svih kategorija</h4>
                        <div class="mt-1">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Prijelaz
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('category.create')}}" class="dropdown-item">Unesi kategoriju</a></li>
                                  <li><a class="dropdown-item" href="{{route('brand.index')}}">Brendovi</a></li>
                                  <li><a class="dropdown-item" href="{{route('product.index')}}">Proizvodi</a></li>
                                  <li><a class="dropdown-item" href="{{route('order.index')}}">Narudbe</a></li>
                                </ul>
                              </div>
                        </div>
                        <br>
    
                    </div>
                    <div class="card-body">
                    <table class="table">
                            <thead>
                                <th>ID</th>
                                <th>Ime kategorije</th>
                                <th>Kategorija aktivan</th>
                                <th>Kategorija status</th>
                                <th>Uredi</th>
                                <th>Obrisi</th>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->category_name}}</td>
                                    @if($category->category_active == 1)
                                    <td class="bg-success text-light text-center">{{$category->category_active}}</td>
                                    @else
                                    <td class="bg-danger text-light text-center">{{$category->category_active}}</td>
                                    @endif
                                    @if($category->category_status == 1)
                                    <td class="bg-success text-light text-center">{{$category->category_status}}</td>
                                    @else
                                    <td class="bg-danger text-light text-center">{{$category->category_status}}</td>
                                    @endif
                                    <td><a href="{{route('category.edit',['category' =>$category])}}" class="btn btn-warning">Uredi</a></td>
                                   <td>
                                    <form action ="{{route('category.destroy',['category' => $category ])}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">Izbrisi</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>