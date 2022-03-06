<<style>
    #user_apps {
        border: 4px solid gray; 
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    table > tbody > tr:hover > td {
        background-color: lightblue;
        color: black;
    }

    table > thead > tr > th {
        background-color:#151A48; 
        color:white;
    }
    #btnAddUser {
        background-color: #151A48;
        color: white;
        font-weight: 600;
        border: 2px solid white;
    }
    #btnAddUser:hover {
        background-color: white;
        color: #151A48;
        font-weight: 700;
        border: 2px solid #151A48;
        outline: none;
    }
    #btnAddUser:focus:hover {
        background-color: white;
        color: #151A48;
        font-weight: 700;
        border: 2px solid #151A48;
        outline: none;
    }
    #btnAddRole {
        background-color: #151A48;
        color: white;
        font-weight: 600;
        border: 2px solid white;
    }
    #btnAddRole:hover {
        background-color: white;
        color: #151A48;
        font-weight: 700;
        border: 2px solid #151A48;
        outline: none;
    }
    #btnAddRole:focus:hover {
        background-color: white;
        color: #151A48;
        font-weight: 700;
        border: 2px solid #151A48;
        outline: none;
    }
    #btnAddPic {
        background-color: #151A48;
        color: white;
        font-weight: 600;
        border: 2px solid white;
    }
    #btnAddPic:hover {
        background-color: white;
        color: #151A48;
        font-weight: 700;
        border: 2px solid #151A48;
        outline: none;
    }
    #btnAddPic:focus:hover {
        background-color: white;
        color: #151A48;
        font-weight: 700;
        border: 2px solid #151A48;
        outline: none;
    }
    .modal-header {
        border-bottom:1px solid #eee;
        background-color: #151A48;
        color: white;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        margin-left: -1px;
        margin-top: -5px;
        width: auto;
    }
    .form-group > .form-control:focus {
        border: 2px solid #151A48;
    }
    .modal-footer > button {
        background-color: #151A48;
        color: white;
        font-weight: 600;
        border: 2px solid white;
        outline: none;
    }
    .modal-footer > button:hover {
        background-color: white;
        color: #151A48;
        font-weight: 600;
        border: 2px solid #151A48;
        outline: none;
    }
    .modal-footer > button:focus {
        background-color: #151A48;
        color: white;
        font-weight: 600;
        border: 2px solid white;
        outline: none;
    }
    .modal-footer > button:focus:hover {
        background-color: white;
        color: #151A48;
        font-weight: 700;
        border: 2px solid #151A48;
        outline: none;
    }
</style>
@extends('layout.master')

@section('content')
<div class="main-grid">
    <div class="agile-grids">
        <!--alert success -->
        @if (session('status'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>{{ session('status') }}</strong>
            </div> 
        @endif
        <!--alert success -->
        
        <!--validasi form-->
            @if (count($errors)>0)
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <ul>
                        <li><strong>Saved Data Failed !</strong></li>
                        @foreach ($errors->all() as $error)
                            <li><strong>{{ $error }}</strong></li>
                        @endforeach
                    </ul>
                </div>   
            @endif
        <!--end validasi form-->

        <div class="buttons-heading">
            <h2>Master Books</h2>
        </div>
        <!-- Button trigger modal-->
        <div class="bs-component mb20">
            <button type="button" class="btn btn-primary" data-toggle="modal" id="btnAddUser" data-target="#myModalUser">
                <i class="fa fa-plus" aria-hidden="true"></i>
                Add Books
            </button>
        </div>
        <!-- Button trigger modal-->

        <!-- table-->
            <table id="category" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Book Name</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Stock</th>
                        <th>Added Info</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $data)
                    <tr>
                        <td>{{ $data->book_name }}</td>
                        <td>{{ $data->author_name }}</td>
                        <td>{{ $data->book_category }}</td>
                        <td>{{ $data->stock }}</td>
                        <td>
                            {{ $data->created_by }} <br>
                            <i>{{ date('Y-m-d H:i:s', strtotime($data->created_at)) }}</i>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editBook{{ $data->id }}">
                                Edit
                            </button>
                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addStock{{ $data->id }}">
                                Add Stock
                            </button>
                            <a href="{{ url('/masters/books/delete/'.$data->id) }}" class="btn btn-danger btn-xs">Delete</a>
                        </td>
                    </tr>
                    <!-- Modal Edit-->
                    <div class="modal fade" id="editBook{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel"><b>Edit Book</b>
                                    <button type="button" class="close" data-dismiss="modal" id="closeModalUser" aria-label="Close" style=" margin-top : 1px;">
                                        <span aria-hidden="true" style="color:white"><i class="fa fa-times"></i></span>
                                    </button>
                                </h4>
                            </div>
                            <form action="{{url('/masters/books/update-book/'.$data->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label>Book Name</label>
                                            <input type="text" name="book_name" id="book_name" class="form-control" value="{{ $data->book_name }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Author</label>
                                            <select name="author" id="author" class="form-control">
                                                <option value="">--Select Author--</option>
                                                @foreach ($authors as $author)
                                                    <option value="{{ $author->author_name }}" {{ $data->author_name == $author->author_name ? 'selected' : '' }}>{{ $author->author_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select name="ctg" id="ctg" class="form-control">
                                                <option value="">--Select Category--</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->category_name }}" {{ $data->book_category == $category->category_name ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Stock</label>
                                            <input type="number" name="stock" id="stock" class="form-control" value="{{ $data->stock }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="btnResetModalUser"><i class="fa fa-refresh"></i> Reset</button>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <!-- Modal Stock-->
                    <div class="modal fade" id="addStock{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel"><b>Add Stock</b>
                                    <button type="button" class="close" data-dismiss="modal" id="closeModalUser" aria-label="Close" style=" margin-top : 1px;">
                                        <span aria-hidden="true" style="color:white"><i class="fa fa-times"></i></span>
                                    </button>
                                </h4>
                            </div>
                            <form action="{{url('/masters/books/stock/'.$data->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label>Current Stock: {{ $data->stock }}</label>
                                        </div>
                                        <div class="form-group">
                                            <label>Stock</label>
                                            <input type="number" name="stock" id="stock" class="form-control" value="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="btnResetModalUser"><i class="fa fa-refresh"></i> Reset</button>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    @endforeach
                </tbody>
            </table>
        <!-- table-->
    </div>
</div>

<!-- Modal Add-->
<div class="modal fade" id="myModalUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel"><b>Add Book</b>
                <button type="button" class="close" data-dismiss="modal" id="closeModalUser" aria-label="Close" style=" margin-top : 1px;">
                    <span aria-hidden="true" style="color:white"><i class="fa fa-times"></i></span>
                </button>
            </h4>
        </div>
        <form action="{{url('/masters/books')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-body">
                    <div class="form-group">
                        <label>Book Name</label>
                        <input type="text" name="book_name" id="book_name" class="form-control" value="{{ old('book_name') }}">
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <select name="author" id="author" class="form-control">
                            <option value="">--Select Author--</option>
                            @foreach ($authors as $author)
                                <option value="{{ $author->author_name }}">{{ $author->author_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category" id="category" class="form-control">
                            <option value="">--Select Category--</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        <input type="number" name="stock" id="stock" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnResetModalUser"><i class="fa fa-refresh"></i> Reset</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- Modal -->



<script>
    $(document).ready(function() {
        var table = $('#category').DataTable( {
            "order": [],
            responsive: true
        });
    
    } );
</script>
@endsection