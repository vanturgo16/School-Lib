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
            <h2>Master Users</h2>
        </div>
        <!-- Button trigger modal-->
        <div class="bs-component mb20">
            <button type="button" class="btn btn-primary" data-toggle="modal" id="btnAddUser" data-target="#myModalUser">
                <i class="fa fa-plus" aria-hidden="true"></i>
                Add User
            </button>
        </div>
        <!-- Button trigger modal-->

        <!-- table-->
            <table id="user_apps" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Last Login</th>
                        <th>Login Counter</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>
                            {{ $user->name }} <br>
                            @if ($user->is_active=='1')
                                <span class="badge" style="background-color: green"><b>Active</b></span>
                            @else
                                <span class="badge" style="background-color: red"><b>InActive</b></span>
                            @endif
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->is_admin == '1')
                                <b><i>Administrator</i></b>
                            @else
                                <b><i>Customer</i></b>
                            @endif
                        </td>
                        <td>
                            @if ($user->last_login == '')
                                <b><i>Null</i></b>
                            @else
                                <b><i>{{ date('Y-m-d H:i:s', strtotime($user->last_login)) }}</i></b>
                            @endif
                        </td>
                        <td>{{ $user->login_counter }}</td>
                        <td>
                            @if ($user->is_active == '1')
                                <a href="{{ url('/masters/users/revoke/'.$user->id) }}" class="btn btn-danger btn-xs">Revoke Access</a>
                            @else
                                <a href="{{ url('/masters/users/activate/'.$user->id) }}" class="btn btn-success btn-xs">Give Access</a>
                            @endif
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        <!-- table-->
    </div>
</div>

<!-- Modal User-->
<div class="modal fade" id="myModalUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel"><b>Add User</b>
                <button type="button" class="close" data-dismiss="modal" id="closeModalUser" aria-label="Close" style=" margin-top : 1px;">
                    <span aria-hidden="true" style="color:white"><i class="fa fa-times"></i></span>
                </button>
            </h4>
        </div>
        <form action="{{url('/masters/users')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-body">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label>password</label>
                        <input type="text" name="password" id="password" class="form-control" value="{{ old('password') }}">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" id="role" class="form-control">
                            <option value="">--Choose Role--</option>
                            <option value="1">Administrator</option>
                            <option value="0">Customer</option>
                        </select>
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
        var table = $('#user_apps').DataTable( {
            "order": [],
            responsive: true
        });

        $('#btnResetModalUser').off('click').on('click',resetModalUser);
        $('#closeModalUser').off('click').on('click',resetModalUser);
        
        function resetModalUser() 
        {
            $('#email1').val('');
        }

        $('#btnResetModalRole').off('click').on('click',resetModalRole);
        $('#closeModalRole').off('click').on('click',resetModalRole);
        
        function resetModalRole() 
        {
            $('#email').val('');
            $('#role').val('');
        }

        $('#btnResetModalPic').off('click').on('click',resetModalPic);
        $('#closeModalPic').off('click').on('click',resetModalPic);
        
        function resetModalPic() 
        {
            $('.email-pic').val('');
        }
    } );
</script>
@endsection