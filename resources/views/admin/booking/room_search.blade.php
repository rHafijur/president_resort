@extends('voyager::master')
@section('head')
<link rel="stylesheet" href="{{asset('assets/css/zebra-datepicker/default.css')}}">
@endsection
@section('content')
    <div class="page-content browse container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <form method="get" id="searchForm" class="form-search">
                            <div id="search-input">
                                <div class="col-2">
                                    <input name="check_in" id="check_in" value="{{$check_in}}" placeholder="Arival Date" type="text" class="form-control datepicker-example8" required>
                                </div>
                                <div class="col-2">
                                    <input type="text" id="check_out" value="{{$check_out}}" name="check_out" placeholder="Departure Date" class="form-control datepicker-example8" required>
                                </div>
                                <div class="col-2">
                                    <select name="adults" class="select-menu form-control" required>
                                        <option value="">Adults</option>
                                        <option @if($adults==1) selected @endif value="1">1</option>
                                        <option @if($adults==2) selected @endif value="2">2</option>
                                        <option @if($adults==3) selected @endif value="3">3</option>
                                        <option @if($adults==4) selected @endif value="4">4</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <select name="children" class="select-menu form-control">
                                        <option value="0">Children</option>
                                        <option @if($children==1) selected @endif value="1">1</option>
                                        <option @if($children==2) selected @endif value="2">2</option>
                                        <option @if($children==3) selected @endif value="3">3</option>
                                        <option @if($children==4) selected @endif value="4">4</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <button type="submit">
                                        <a href="javascript::void(0)"  class="btn btn-success btn-add-new">
                                            <span>Search</span>
                                        </a>
                                    </button>
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
                                        <th>QTY</th>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Rent/Night</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rooms as $room)
                                        @php
                                            // $bnor= $room->booking_rooms->sum("number_of_rooms");
                                            $bnor=0;
                                            foreach($room->booking_rooms as $br){
                                                if($br->booking){
                                                $bnor+=$br->number_of_rooms;
                                                }
                                            }
                                            if($bnor >= $room->number_of_rooms){
                                            continue;
                                            }
                                            $hnor=$room->room_holds->sum("number_of_rooms");
                                            $anor=$room->number_of_rooms - ($bnor + $hnor);
                                            // dd($bnor,$hnor,$room->number_of_rooms );
                                        @endphp
                                        <tr>
                                            <td>
                                                @if ($anor>0)
                                                {{-- <input onchange="inpChanged()" type="checkbox" class="inp_ids" name="room_id" value="{{$room->id}}"> --}}
                                                <select onchange="addRoom(this,{{$room->id}})"  class="form-control">
                                                    @for($i=0;$i<=$anor;$i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                  </select>
                                                @endif
                                            </td>
                                            <td>{{$room->id}}</td>
                                            <td>{{$room->title}}</td>
                                            <td>
                                                <img style="width:40px;height:30px" src="{{asset("storage/".$room->image)}}" >
                                            </td>
                                            <td>{{$room->rent}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <form action="{{route("admin.booking.proceed")}}" method="GET" id="submitForm">
                        <input type="hidden" value="{{$check_in}}" name="check_in">
                        <input type="hidden" value="{{$check_out}}" name="check_out">
                        <input type="hidden" value="{{$adults}}" name="adults">
                        <input type="hidden" value="{{$children}}" name="children">
                        <input type="hidden" value="" name="rooms" id="inp_rooms" required>
                        <button type="submit">
                            <a href="javascript::void(0)"  class="btn btn-success btn-add-new">
                                <span>Proceed</span>
                            </a>
                        </button>
                      </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('javascript')
    <script src="{{asset('assets/js/zebra_datepicker.js')}}"></script>
    <script>
        var rooms=[];
        // function inpChanged(){
        //     var ids=[];
        //     for(el of $(".inp_ids")){
        //         if(el.checked){
        //             ids.push(el.value);
        //         }
        //     }
        //     $("#inp_rooms").val(JSON.stringify(ids));
        // }
        function addRoom(el,id){
            if(el.value<1){
            removeRoom(id);
            return;
            }
            removeRoom(id);
            rooms.push({id:id,quantity:el.value});
            $("#inp_rooms").val(JSON.stringify(rooms));
            
        }
        function removeRoom(id){
            var rs=[];
            for(room of rooms){
            if(id!=room.id){
                rs.push(room);
            }
            }
            rooms=rs;
        }
    </script>
    <script>
        function dateToYMD(date) {
          var strArray=['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
          var d = date.getDate();
          var m = strArray[date.getMonth()];
          var y = date.getFullYear();
          return m + ' ' + (d <= 9 ? '0' + d : d) + ', ' + y;
      }
        $('#check_in').Zebra_DatePicker({
          format: 'M d, Y',
          onClose: function() {
            var date=new Date(Date.parse($("#check_in").val()) + 1 * 24 * 60 * 60 * 1000);
            $('#check_out').Zebra_DatePicker({
                format: 'M d, Y',
                direction: [dateToYMD(date), false]
            });
          }
        });
        $('#check_out').Zebra_DatePicker({
                format: 'M d, Y',
        });
      </script>
@endpush