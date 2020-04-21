@extends('layouts.default')

@section('content')     

<div class="app-main__inner">
<div class="main-card mb-3 card">
    <div class="card-header">Category List</div>
    <div class="card-body">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{session()->get('message')}}
            </div>
        @endif
        
        <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <th>SL.</th>
                    <th>Name</th>
                    <th>Is NID</th>                    
                    <th>Is Phone</th>                    
                    <th>Status</th>
                    <th >Action</th>
                    
                </tr>
            </thead>
            <tbody>
                @php ($i = 1)
                @foreach ($datas as $data)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $data->name }}</td>
                            @if($data->is_nid == 'required|')
                                <td><center>Yes</center></td>
                            @elseif($data->is_nid == '')
                                <td><center>No</center></td>
                            @endif
                            @if($data->is_phone == 'required|')
                                <td><center>Yes</center></td>
                            @elseif($data->is_phone == '')
                                <td><center>No</center></td>
                            @endif
                            <td><center>{{ $data->status }}</center></td>
                            <td align="center">
                                <form action="{{ route('category.destroy',$data->id) }}" method="POST">
                
                                    <!-- <a class="btn btn-hover-shine btn-sm btn-pill btn-info" href="#">Show Products</a> -->

                                    <a class="btn btn-hover-shine btn-sm btn-pill btn-primary" style="margin-left: 5px"  href="{{ route('category.edit',$data->id) }}">Edit</a>
                
                                    @csrf
                                    @method('DELETE')
                    
                                    <button style="margin-left: 5px" type="submit" class="btn btn-pill btn-sm btn-hover-shine btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection