@extends('template.frontend')

@section('content')
        @if( !empty($events) )
        <div class="col-md-12">
            <div class="section">
                <h3 class="section-header">Các sự kiện đang diễn ra</h2>
                    @foreach( $events as $event )
                        <hr/>
                        <div class="section-content">
                            <h3><a href="{{ route('eventDetail', [$event->slug])  }}">{{ $event->name  }}</a></h3>
                            <a href="{{ route('eventDetail', [$event->slug])  }}"><img src="uploads/events/{{ $event->thumb  }}" alt="{{ $event->name  }}" class="img-responsive"/></a>
                        </div>
                        <hr/>
                    @endforeach

            </div>
        </div>
        @endif

        @if( !empty($oldEvents) )
        <div class="col-md-12">
            <div class="section">
                <h3 class="section-header">Các sự kiện đã diễn ra</h2>
                    @foreach( $oldEvents as $event )
                        <hr/>
                        <div class="section-content">
                            <h3><a href="{{ route('resultPage', [$event->slug])  }}">{{ $event->name  }}</a></h3>
                            <a href="{{ route('resultPage', [$event->slug])  }}"><img src="uploads/events/{{ $event->thumb  }}" alt="{{ $event->name  }}" class="img-responsive"/></a>
                        </div>
                        <hr/>
                    @endforeach

            </div>
        </div>
        @endif

@endsection