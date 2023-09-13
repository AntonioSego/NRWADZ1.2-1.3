<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body class="bg-dark-subtle">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="mt-1">
                            <h4>Ispis svih proizvoda</h4>
                        </div>
                        <div class="mt-1">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Prijelaz
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('product.create')}}" class="dropdown-item">Unesi proizvod</a></li>
                                  <li><a class="dropdown-item" href="{{route('brand.index')}}">Brendovi</a></li>
                                  <li><a class="dropdown-item" href="{{route('category.index')}}">Kategorije</a></li>
                                  <li><a class="dropdown-item" href="{{route('order.index')}}">Narudbe</a></li>
                                </ul>
                              </div>
                        </div>
                        <br>
                       
                    <div class="card-body">
                    <table class="table">
                            <thead>
                                <th>ID</th>
                                <th>Naziv proizvoda</th>
                                <th>Količina</th>
                                <th>Cijena</th>
                                <th>Aktivan</th>
                                <th>Status</th>
                                <th>ID brenda</th>
                                <th>ID kategorije</th>
                                <th>Uredi</th>
                                <th>Obrisi</th>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>{{$product->rate}}</td>
                                    @if($product->active == 1)
                                    <td class="bg-success text-light text-center">{{$product->active}}</td>
                                    @else
                                    <td class="bg-danger text-light text-center">{{$product->active}}</td>
                                    @endif
                                    @if($product->status == 1)
                                    <td class="bg-success text-light text-center">{{$product->status}}</td>
                                    @else
                                    <td class="bg-danger text-light text-center">{{$product->status}}</td>
                                    @endif
                                    <td>{{$product->brand_id}}</td>
                                    <td>{{$product->category_id}}</td>
                                    <td><a href="{{route('product.edit',['product' =>$product])}}" class="btn btn-warning">Uredi</a></td>
                                   <td>
                                    <form action ="{{route('product.destroy',['product' => $product ])}}" method="POST">
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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>