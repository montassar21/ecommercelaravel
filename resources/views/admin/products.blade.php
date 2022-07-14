<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet">
    <link href="{{ asset('dashassets/css/phoenix.min.css') }}" rel="stylesheet" id="style-default">
    <link href="{{ asset('dashassets/css/user.min.css') }}" rel="stylesheet" id="user-style-default">
    <style>
        body {
            opacity: 0;
        }
    </style>
</head>

<body>
    <main class="main" id="top">
        <div class="container-fluid px-0">
            @include('inc.admin.sidebar')
            @include('inc.admin.navbar')
            <div class="content">
                <button class="btn btn-primary mb-5" type="button" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">Add Product</button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5><button class="btn p-1"
                                    type="button" data-bs-dismiss="modal" aria-label="Close"><span
                                        class="fas fa-times fs--1"></span></button>
                            </div>
                            <form action="/admin/AddProduct" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="m-3">
                                    <label class="form-label" for="exampleFormControlInput1">Category product</label>
                                    <select class="form-control" name="category">
                                        @foreach ($categories as $c)
                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <div class="alert alert-danger p-2 m-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="m-3">
                                    <label class="form-label" for="exampleFormControlInput1">Name</label>
                                    <input class="form-control" name="productName" id="exampleFormControlInput1"
                                        type="text" placeholder="product name">
                                    @error('productName')
                                        <div class="alert alert-danger p-2 m-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="m-3">
                                    <label class="form-label" for="exampleTextarea">Description </label>
                                    <textarea class="form-control" name="productDescrp" id="exampleTextarea" rows="3"> </textarea>
                                    @error('productDescrp')
                                        <div class="alert alert-danger p-2 m-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="m-3">
                                    <label class="form-label" for="exampleFormControlInput1">Prix</label>
                                    <input class="form-control" name="productPrix" id="exampleFormControlInput1"
                                        type="text" placeholder="product prix">
                                    @error('productPrix')
                                        <div class="alert alert-danger p-2 m-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="m-3">
                                    <label class="form-label" for="exampleFormControlInput1">Qte</label>
                                    <input class="form-control" name="productQte" id="exampleFormControlInput1"
                                        type="text" placeholder="product Qte">
                                    @error('productQte')
                                        <div class="alert alert-danger p-2 m-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="m-3">
                                    <label class="form-label" for="customFile">Image</label>
                                    <input class="form-control" id="customFile" name="photo" type="file">
                                    @error('photo')
                                        <div class="alert alert-danger p-2 m-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="modal-footer"><button class="btn btn-primary"
                                        type="submit">Save</button><button class="btn btn-outline-primary"
                                        type="button" data-bs-dismiss="modal">Cancel</button></div>
                        </div>
                        </form>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nom de produit</th>
                            <th scope="col">Description</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Qte</th>
                            <th scope="col">image</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $index => $product)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $product->ProdName }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->prix }}</td>
                                <td>{{ $product->qte }}</td>
                                <td><img src="{{ asset('uploads') }}/{{ $product->img }}" width="150"></td>
                                <td>
                                    <a href="/admin/modifiyProduct" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $product->id }}">Modifier </a>
                                    <a href="/admin/supprimerProduct/{{ $product->id }}/delete"
                                        class="btn btn-danger">Supprimer</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @foreach ($products as $index => $product)
                    <div class="modal fade" id="editModal{{ $product->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modifier product</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/admin/modifyProduct" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $product->id }}" name="id">
                                        <div class="form-group mt-1">
                                            <input type="text" name="nom" class="form-control"
                                                value="{{ $product->ProdName }}">
                                        </div>
                                        <div class="form-group mt-1">
                                            <textarea name="longdesc" class="form-control">{{ $product->description }}</textarea>
                                        </div>
                                        <div class="form-group mt-1">
                                            <input type="text" name="prix" class="form-control"
                                                value="{{ $product->prix }}">
                                        </div>
                                        <div class="form-group mt-1">
                                            <input type="text" name="qte" class="form-control"
                                                value="{{ $product->qte }}">
                                        </div>
                                        <div class="form-group mt-1">
                                            <input class="form-control" id="customFile" name="photo"
                                                type="file">
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
    @include('inc.admin.footer')

</body>
<script src="{{ asset('dashassets/js/phoenix.js') }}"></script>
<script src="{{ asset('dashassets/js/ecommerce-dashboard.js') }}"></script>

</html>
