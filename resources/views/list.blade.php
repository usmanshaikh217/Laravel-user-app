@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Summary') }}</div>

                <div class="card-body">

                    <div class="x_panel">
                        <div class="x_title">
                          
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
      
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Position</th>
                                <th>Role</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                              <tr>
                                <td>
                                    <div class="showPhoto">
                                        <div id="imagePreview" style="@if ($item->photo != '') background-image:url('{{ url('/') }}/uploads/{{ $item->photo }}')@else background-image: url('{{ url('/assets/images/img.jpg') }}') @endif;width:80px;height:80px">
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->position }}</td>
                                @if($item->role_as == '1')
                                <td>Admin</td>
                                @elseif($item->role_as == '2')
                                <td>HR</td>
                                @else
                                <td>User</td>
                                @endif
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
      
                        </div>
                      </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
