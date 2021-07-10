@include('main.layouts.header')
@include('main.layouts.nav')
@yield('content')
@if (session('message'))
    
<div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
    <div class="toast" style="position: absolute; top: 0; left: 0;">
      <div class="toast-header">
        <strong class="mr-auto">Message</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="toast-body">
        {{session('message')}}
      </div>
    </div>
  </div>
  @endif
@include('main.layouts.footer')