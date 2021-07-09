@extends('main.layouts.master')
@section('content')
<section class="promo-wrapper clearfix">
    <div class="promo-outer">
    </div>
</section>
<style>
    .alt{
        padding-top: 30px;
        padding-bottom: 100px;
    }
</style>
<div>
    <section class="container clearfix alt">
        <div class="alert alert-success" role="alert">
            Congratulations! You've booked the room successfully.
          </div>
    </section>
</div>
@endsection
@push('script')
@endpush