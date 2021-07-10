@extends('voyager::master')
@section('content')
    <div class="page-content browse container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <form method="get" class="form-search">
                            <div id="search-input">
                                {{-- <div class="col-2">
                                    <select id="search_key" name="key">
                                        @foreach($searchNames as $key => $name)
                                            <option value="{{ $key }}" @if($search->key == $key || (empty($search->key) && $key == $defaultSearchKey)) selected @endif>{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-2">
                                    <select id="filter" name="filter">
                                        <option value="contains" @if($search->filter == "contains") selected @endif>contains</option>
                                        <option value="equals" @if($search->filter == "equals") selected @endif>=</option>
                                    </select>
                                </div> --}}
                                <div class="input-group col-md-12">
                                    <input type="text" class="form-control" placeholder="ID / Name / Phone / Email" name="s" value="{{ request()->s }}">
                                    <span class="input-group-btn">
                                        <button class="btn btn-info btn-lg" type="submit">
                                            <i class="voyager-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                            {{-- @if (Request::has('sort_order') && Request::has('order_by'))
                                <input type="hidden" name="sort_order" value="{{ Request::get('sort_order') }}">
                                <input type="hidden" name="order_by" value="{{ Request::get('order_by') }}">
                            @endif --}}
                        </form>

                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>NID</th>
                                        <th>Rooms</th>
                                        <th>Paid</th>
                                        <th>PM</th>
                                        <th>Boocked At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                        <tr>
                                            <td>{{$booking->id}}</td>
                                            <td>{{$booking->name}}</td>
                                            <td>{{$booking->phone}}</td>
                                            <td>{{$booking->email}}</td>
                                            <td>{{$booking->address}}, {{$booking->city}}, {{$booking->post_code}}, {{$booking->country}}</td>
                                            <td>{{$booking->nid}}</td>
                                            <td>
                                                @foreach ($booking->booking_rooms as $b_room)
                                                    <b>{{$b_room->room->title}}</b> - <strong>{{$b_room->checkInDate()}}</strong> -> <strong>{{$b_room->checkOutDate()}}</strong> <br>
                                                @endforeach
                                            </td>
                                            <td>{{$booking->payment->amount}}</td>
                                            <td>{{$booking->payment->method_name}}</td>
                                            <td>{{$booking->created_at}}</td>
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
@endsection