@extends('layouts.default')

@section('content')
<div class="main-card mb-3 card">
<div class="card-header">Add New User</div>    
    <div class="card-body">
    
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{session()->get('message')}}
            </div>
        @endif    
        <form class="" method="POST" action="{{url()->to('user')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">

                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="name" class="">{{_('Name')}}</label>
                        <input name="name" id="name" placeholder="Name" type="text" class="form-control  @error('name') is-invalid @enderror">
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
                        <input name="email" id="email" placeholder="name@example.com" type="text" class="form-control @error('email') is-invalid @enderror">
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
                        <label for="examplePassword11" class="">{{_('Password')}}</label>
                        <input name="password" id="password11" placeholder="password placeholder" type="password" class="form-control  @error('password') is-invalid @enderror">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="confirm_password" class="">{{_('Confirm Password')}}</label>
                        <input name="confirm_password" id="confirm_password" type="password" class="form-control @error('confirm_password') is-invalid @enderror">
                        @error('confirm_password')
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
                        <label for="phone" class="">{{_('Phone')}}</label>
                        <input name="phone" id="phone" placeholder="01xxxxxxxxx" type="" class="form-control @error('phone') is-invalid @enderror">
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
                        <input name="nid" id="nid" placeholder="01xxxxxxxxx" type="" class="form-control @error('nid') is-invalid @enderror">
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
                        <input name="birth_date" id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror">
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
                <textarea name="address" id="address" type="text" row=3 autore class="form-control autosize-input @error('address') is-invalid @enderror"> </textarea>
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror    
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="image" class="">{{_('Image')}}</label>
                        <input name="image" id="image" type="file" class="form-control-file">
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
                                <input type="radio" id="on" name="status" value="On" checked>
                                <label for="on">ON</label><br>
                                <input type="radio" id="off" name="status" value="Off">
                                <label for="off">OFF</label><br>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <center> <button class="mb-2 mr-2 btn btn-lg btn-hover-shine btn-primary" type="submit">{{_('ADD')}}</button></center>
        </form>
    </div>
</div>

@endsection 