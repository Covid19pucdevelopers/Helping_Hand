@extends('layouts.default')

@section('content')
<div class="main-card mb-3 card">
    <div class="card-body"><h5 class="card-title">Grid Rows</h5>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form method="POST" action="{{route('user.update',$data->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row">
            
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="name" class="">{{_('Name')}}</label>
                        <input name="name" id="name" placeholder="Name" type="text" class="form-control  @error('name') is-invalid @enderror" value="{{$data->name}}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>                        
                </div>

                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="email" class="">{{_('Email')}}</label>
                        <input name="email" id="email" placeholder="name@example.com" type="text" class="form-control @error('email') is-invalid @enderror" value="{{$data->email}}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>                    
            
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="phone" class="">{{_('phone')}}</label>
                        <input name="phone" id="phone" placeholder="01xxxxxxxxx" value="{{$data->phone}}" type="" class="form-control @error('phone') is-invalid @enderror">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror    
                    </div>
                </div>

               <div class="col-md-6">
               <div class="position-relative form-group">
                        <label for="type" class="">{{_('Type')}}</label>
                            <select name="type" id="type" type="" class="form-control @error('type') is-invalid @enderror">
                                <option value="">--Select Type--</option>
                                @foreach($types as $type)
                                    <option value='{{$type->id}}'>{{$type->name}}</option>
                                @endforeach                                
                            </select>
                        @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror    
                    </div>
               </div>
            </div>

            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="nid" class="">{{_('NID No')}}</label>
                        <input name="nid" id="nid" value="{{$data->nid}}" placeholder="01xxxxxxxxx" type="" class="form-control @error('nid') is-invalid @enderror">
                        @error('nid')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror    
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="birth_date" class="">{{_('Birth Date')}}</label>
                        <input name="birth_date" id="birth_date" value="{{$data->birth_date}}" type="date" class="form-control @error('birth_date') is-invalid @enderror">
                        @error('birth_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror    
                    </div>
                </div>
            </div>

            <div class="position-relative form-group">
                <label for="address" class="">{{_('Address')}}</label>
                <textarea name="address" id="address" type="text" row=3 autore class="form-control autosize-input @error('address') is-invalid @enderror">{{$data->address}} </textarea>
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror    
            </div>

            <div class="form-row">               
                <div class="col-md-2">
                    <img src="{{asset('storage/'.$data->image)}}" height="100px" width="100px"/>                    
                </div>
                <div class="col-md-4">                    
                    <div class="position-relative form-group">
                        <label for="avater" class="">{{_('Image')}}</label>
                        <input name="image" id="image" type="text" class="form-control" style="display: none" value="{{$data->image}}">
                        <input name="avater" id="avater" type="file" class="form-control-file">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="position-relative ">
                        <label for="status" class="">{{_('Status')}}</label>
                        @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>    
                    <div class="container">
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                            @if($data->status == 'On')
                                    <input type="radio" id="on" name="status" value="On" checked>
                                    <label for="on">ON</label><br>
                                    <input type="radio" id="off" name="status" value="Off">
                                    <label for="off">OFF</label><br>
                                @elseif($data->status == 'Off')
                                    <input type="radio" id="on" name="status" value="On">
                                    <label for="on">ON</label><br>
                                    <input type="radio" id="off" name="status" value="Off" checked>
                                    <label for="off">OFF</label><br>
                                @else
                                    <input type="radio" id="on" name="status" value="On">
                                    <label for="on">ON</label><br>
                                    <input type="radio" id="off" name="status" value="Off">
                                    <label for="off">OFF</label><br>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <center style="margin-top: 10px"> <button class="mt-2 btn btn-primary" type="submit">{{_('Update')}}</button></center>
        </form>
    </div>
</div>

<script>
    $(document).ready(function(){
        
        document.getElementById("type").value = '{{$data->tbl_user_types_id}}';

    });
</script>
@endsection