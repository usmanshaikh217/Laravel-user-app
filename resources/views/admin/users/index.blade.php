@extends('layouts.master')

@section('title', 'Users - Multiuser App')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Users</h3>
        </div>
        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
              <a href="/admin/user/create" class="btn btn-primary btn-block btn-lg"> + Add New User </a>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
    @if(session('message'))
        <div class="alert alert-success alert-dismissible fade in" role="alert">{{session('message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                {{-- <div class="x_title">
                    <h2>Referrals</h2>
                    <div class="clearfix"></div>
                </div> --}}
                <div class="x_content">  
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table data-table">
                            <thead>
                                <tr class="headings">
                                <th class="column-title">ID</th>
                                <th class="column-title">Name </th>
                                <th class="column-title">Email </th>
                                <th class="column-title">Photo </th>
                                <th class="column-title">Role </th>
                                <th class="column-title">Created By </th>
                                {{-- <th class="column-title">Status </th> --}}
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($users as $index => $row)
                                <tr class="even pointer">
                                    <td class=" ">{{ $index + 1 }}.</td>
                                    <td class=" ">{{$row->name}}</td>
                                    <td class=" ">{{$row->email}}</td>
                                    <td>
                                        <div class="showPhoto">
                                            <div id="imagePreview" style="@if ($row->photo != '') background-image:url('{{ url('/') }}/uploads/{{ $row->photo }}')@else background-image: url('{{ url('/assets/images/img.jpg') }}') @endif;">
                                            </div>
                                        </div>
                                    </td>
                                    @if($row->role_as == '1')
                                        <td class=" "><span class="label label-success">Admin</span></td>
                                    @elseif($row->role_as == '2')
                                        <td class=" "><span class="label label-info">HR</span></td>
                                    @else
                                        <td class=" "><span class="label label-default">User</span></td>
                                    @endif
                                    <td class=" ">{{$row->created_at}}</td>
                                    {{-- @if($item->status == '1')
                                        <td class=" ">
                                            <a href="#" class="btn btn-round btn-success btn-xs">Enable</a>
                                        </td>
                                    @elseif($item->status == '0')
                                        <td class=" ">
                                            <a href="#" class="btn btn-round btn-danger btn-xs">Disable</a>
                                        </td>
                                    @endif --}}
                                    <td>
                                        <a href="{{url('admin/view-user/'.$row->id)}}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View </a>
                                        <a href="{{url('admin/edit/'.$row->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                        <form method="POST" action="{{ url('admin/delete', $row->id) }}" style="display: inline-table;">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-xs btn-danger show_confirm" data-toggle="tooltip" title='Delete'><i class="fa fa-trash-o"></i> Delete</button>
                                        </form>
                                        {{-- <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a> --}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $state->onEachSide(1)->render() }}
                        <p>
                            Displaying {{$state->count() }} of {{ $state->total() }} States.
                        </p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('specificPagesScript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this User?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
          });
      });
  
</script>

<style>
    .showPhoto {
        width: 60%;
        height: 50px;
        margin: auto;
    }
 
    .showPhoto>div {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>
@endsection