<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Liste categories</title>
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
                    data-bs-target="#exampleModal">Add categorie</button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add categorie</h5><button class="btn p-1"
                                    type="button" data-bs-dismiss="modal" aria-label="Close"><span
                                        class="fas fa-times fs--1"></span></button>
                            </div>
                            <form action="/admin/AddCategory" method="post">
                                @csrf
                                <div class="m-3">
                                    <label class="form-label" for="exampleFormControlInput1">Name</label>
                                    <input class="form-control" name="categoryName" id="exampleFormControlInput1"
                                        type="text" placeholder="Category name">
                                    @error('categoryName')
                                        <div class="alert alert-danger p-2 m-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="m-3">
                                    <label class="form-label" for="exampleTextarea">Description </label>
                                    <textarea class="form-control" name="categoryDescrp" id="exampleTextarea" rows="3"> </textarea>
                                    @error('categoryDescrp')
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
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $index => $category)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>
                                    <a href="/admin/modifiyCategory" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $category->id }}">Modifier </a>
                                    <a href="/admin/supprimerCategory/{{ $category->id }}/delete"
                                        class="btn btn-danger">Supprimer</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @foreach ($categories as $index => $category)
                    <div class="modal fade" id="editModal{{ $category->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modifier Category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/admin/modifyCategory" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $category->id }}" name="id">
                                        <div class="form-group mt-1">
                                            <input type="text" name="nom" class="form-control"
                                                placeholder="{{ $category->name }}">
                                        </div>
                                        <div class="form-group mt-1">
                                            <textarea name="longdesc" class="form-control" placeholder="{{ $category->description }}"></textarea>
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
                @include('inc.admin.footer')
            </div>
        </div>
    </main>
</body>
<script src="{{ asset('dashassets/js/phoenix.js') }}"></script>
<script src="{{ asset('dashassets/js/ecommerce-dashboard.js') }}"></script>


</html>
