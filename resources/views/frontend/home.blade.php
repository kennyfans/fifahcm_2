@extends('template.frontend')

@section('content')
        <div class="col-md-12">
            <div class="section">
                <h2 class="section-header">Các sự kiện đang diễn ra</h2>

                @if( !$events->isEmpty() )
                    @foreach( $events as $event )
                        <hr/>
                        <div class="section-content">
                            <h3><a href="{{ route('eventDetail', [$event->slug])  }}">{{ $event->name  }}</a></h3>
                            <a href="{{ route('eventDetail', [$event->slug])  }}"><img src="uploads/events/{{ $event->thumb  }}" alt="{{ $event->name  }}" class="img-responsive"/></a>
                        </div>
                        <hr/>
                    @endforeach
                @endif

            </div>
        </div>

@endsection