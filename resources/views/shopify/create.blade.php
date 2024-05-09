@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Shopify Create</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('shopify.store') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Store URL <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error ('storeurl') is-invalid @enderror" id="storeurl" name="storeurl" placeholder="Store URL" value="{{ old('storeurl') }}">
                    @error('storeurl')
                    <p class="error">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">API Key <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error ('shopifyapikey') is-invalid @enderror" id="shopifyapikey" name="shopifyapikey" placeholder="API Key" value="{{ old('shopifyapikey') }}">
                    @error('shopifyapikey')
                    <p class="error">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">API Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control @error ('shopifyapipassword') is-invalid @enderror" id="shopifyapipassword" name="shopifyapipassword" placeholder="API Password" value="{{ old('shopifyapipassword') }}">
                    @error('shopifyapipassword')
                    <p class="error">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Shop Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error ('shopifyshopname') is-invalid @enderror" id="shopifyshopname" name="shopifyshopname" placeholder="Shop Name" value="{{ old('shopifyshopname') }}">
                    @error('shopifyshopname')
                    <p class="error">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Domain Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error ('shopifydomainname') is-invalid @enderror" id="shopifydomainname" name="shopifydomainname" placeholder="Domain Name" value="{{ old('shopifydomainname') }}">
                    @error('shopifydomainname')
                    <p class="error">{{ $message }}</p>
                    @enderror
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection