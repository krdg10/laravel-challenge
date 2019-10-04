@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Events Happening In The Next Five Days</h1>
    <div class="card-group">
        <div class="col-lg-12">
            <div class="row">
                @forelse ($events as $event)
                    <div class="card text-center col-sm-6">
                        <div class="card-body">
                            <a href="{{ route('events.show', ['id'=>$event->id]) }}"><h5 class="card-title">{{$event->title}}</h5></a>
                            <p class="card-text">Begin: {{$event->start}}</p>
                            <p class="card-text">End: {{$event->end}}</p>
                            <div class="container d-flex justify-content-center">
                                <a href="{{ route('events.show', ['id'=>$event->id]) }}" class="badge badge-secondary">See More <i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <h3 class="text-center">There are events happening in the next five days.</h3>
                @endforelse
            </div>
        </div>
    </div>

    <div class="container d-flex justify-content-center display-inline">
        <div class="btn-group dropright">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Export
            </button>
            <div class="dropdown-menu">
                <form action="{{url('export', ['archive'=>'csv', 'type'=>'fiveDays'])}}" enctype="multipart/form-data">
                    <button class="dropdown-item" type="submit">in CSV</button>
                </form>
                <form action="{{url('export', ['archive'=>'xls', 'type'=>'fiveDays'])}}" enctype="multipart/form-data">
                    <button class="dropdown-item" type="submit">in XLS</button>
                </form>
                <form action="{{url('export', ['archive'=>'txt', 'type'=>'fiveDays'])}}" enctype="multipart/form-data">
                    <button class="dropdown-item" type="submit">in TXT</button>
                </form>
            </div>
        </div>
    </div>    
  
</div>
@endsection