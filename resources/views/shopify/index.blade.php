@extends('layouts.app')
@section('content')
<div class="container">
@if (session('success'))
  <div class="alert">{{ session('success') }}</div>
@endif
<h3 class="mt-3">Shopify</h3>
<div class="row">
  <div class="col-lg-10">
<nav class="navbar navbar-expand navbar-white navbar-light">
    Filter By
</nav>
</div>
<div class="col-lg-2">
  <a class="btn btn-primary" style="width:193px;" href="{{route('shopify.create')}}">CREATE</a>
</div>
</div>
<div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th style="width: 10px">#</th>
          <th>Store URL</th>
          {{-- <th>API Key</th>
          <th>API Password</th> --}}
          <th>Shopname</th>
          <th>Domainname</th>
          <th>Status</th>
          <th colspan="3">Last Updated</th>
        </tr>
      </thead>
      <tbody>
        @if($getShopifyData)
        @forelse ($getShopifyData as $key => $row)
        <tr>
          <td>{{ ++$key }}.</td>
          <td>{{ $row['storeurl'] }}</td>
          {{-- <td>{{ $row['shopifyapikey'] }}</td>
          <td>{{ $row['shopifyapipassword'] }}</td> --}}
          <td>{{ $row['shopifyshopname'] }}</td>
          <td>{{ $row['shopifydomainname'] }}</td>
          <td>
            @if ($row['status'] == 1)
            <span class="text-secondary"><strong>Active</strong></span>
            @elseif($row['status'] == 0)
            <span class="text-secondary"><strong>Deactive</strong></span>
            @endif
          </td>
          <td>{{ $row['updated_at'] }}</td>
          <td>
            <div id="container">
            <div id="menu-wrap">
                <input type="checkbox" class="toggler" />
                <div class="dots">
                  <div></div>
                </div>
                <div class="menu">
                  <div>
                    <ul>
                      <li><a href="#" class="link" data-id="{{ $row['id'] }}">View</a></li>
                      <li><a href="{{ route('shopify.edit', $row['id']) }}" class="link" data-id="{{ $row['id'] }}">Edit</a></li>
                      @if ($row['status'] == 1)
                      <li><a href="{{ route('shopify.status', [$row['id'], 0]) }}" class="link" data-id="{{ $row['id'] }}">Deactive</a></li>  
                      @elseif($row['status'] == 0)
                      <li><a href="{{ route('shopify.status', [$row['id'], 1]) }}" class="link" data-id="{{ $row['id'] }}">Active</a></li>
                      @endif
                      <li>
                        <form method="POST" action="{{ route('shopify.destroy', $row['id']) }}">
                          @csrf
                          <input name="_method" type="hidden" value="DELETE">
                          <button type="submit" class="delete" title='Delete' style="border:none;background:none">Delete</button>
                        </form>
                        {{-- <a href="#" class="link" data-id="{{ $row['id'] }}">Delete</a> --}}
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>
        @empty
        <tr>
            <td colspan="7">No data found</td>
        </tr>
        @endforelse
        @endif
      </tbody>
    </table>
  </div>
</div>
@push('script_src')
<script type="text/javascript">
  $(document).ready(function() {
      $('.delete').click(function(e) {
          if(!confirm('Are you sure you want to delete this post?')) {
              e.preventDefault();
          }
      });
  });
</script>
@endpush
@endsection