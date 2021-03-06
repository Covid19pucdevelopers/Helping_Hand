@extends('layouts.default')

@section('content')
<div class="main-card mb-3 card">
<div class="card-header">Add New Recipient Category</div>    
<div class="card-body">
    
    @if(session()->has('message'))
            <div class="alert alert-success">
                {{session()->get('message')}}
            </div>
        @endif    
    <form class="" method="POST" action="{{url()->to('category')}}">
            @csrf   
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="name" class="">{{_('Name')}}</label>
                        <input name="name" id="name" placeholder="Ex: Food and Drinks...." type="text" class="form-control  @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-1"></div>

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
                                <input type="radio" id="Off" name="status" value="Off">
                                <label for="Off">OFF</label><br>
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

            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative ">
                        <label for="is_nid" class="">{{_('NID Needed?')}}</label>
                        @error('is_nid')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>    
                    
                    <div class="container">
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <input type="radio" id="Yes" name="is_nid" value="required|" checked>
                                <label for="Yes">Yes</label><br>
                                <input type="radio" id="No" name="is_nid" value="">
                                <label for="No">No</label><br>
                                @error('is_nid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-1"></div>

                <div class="col-md-4">
                    <div class="position-relative">
                        <label for="is_phone" class="">{{_('Phone Needed?')}}</label>
                        @error('is_phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>    
                    
                    <div class="container">
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <input type="radio" id="Yes" name="is_phone" value="required|" checked>
                                <label for="Yes">Yes</label><br>
                                <input type="radio" id="No" name="is_phone" value="">
                                <label for="No">No</label><br>
                                @error('is_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <center> <button class="mb-2 mr-2 btn btn-lg btn-hover-shine btn btn-primary" type="submit">{{_('ADD')}}</button></center>
        </form>
    </div>
</div>

@endsection