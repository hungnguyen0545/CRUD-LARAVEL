@extends('main_template')

@push('styles')
<link href="{{ asset('asset/fullcalendar/packages/core/main.css')}}" rel='stylesheet' />
<link href="{{ asset('asset/fullcalendar/packages/daygrid/main.css')}}" rel='stylesheet' />
<link href="{{ asset('asset/fullcalendar/packages/timegrid/main.css')}}" rel='stylesheet' />
<link href="{{ asset('asset/fullcalendar/packages/list/main.css')}}" rel='stylesheet' />
<link href="{{ asset('css/calendar.css')}}" rel='stylesheet'>
@endpush

@section('title', 'Managament Calendar')

@section('content')

@include('calendar.modal')
<div id='wrap'>

    <!-- <div id='external-events'>
      <h4>Draggable Events</h4>

      <div id='external-events-list'>
        <div class='fc-event'>My Event 1</div>
        <div class='fc-event'>My Event 2</div>
        <div class='fc-event'>My Event 3</div>
        <div class='fc-event'>My Event 4</div>
        <div class='fc-event'>My Event 5</div>
      </div>

      <p>
        <input type='checkbox' id='drop-remove' />
        <label for='drop-remove'>remove after drop</label>
      </p>
    </div> -->

    <div id='calendar'
    data-route-load-events = "{{ route('routeLoadEvents')}}"
    data-route-update-events = "{{ route('routeUpdateEvents')}}"
    data-route-store-events = "{{ route('routeStoreEvents') }} "
    data-route-delete-events = "{{ route('routeDeleteEvents') }} "></div>

    <div style='clear:both'></div>

  </div>
@endsection

@section('script')  
<script src="{{ asset('asset/fullcalendar/packages/core/main.js')}}"></script>
<script src="{{ asset('asset/fullcalendar/packages/interaction/main.js')}}"></script>
<script src="{{ asset('asset/fullcalendar/packages/daygrid/main.js')}}"></script>
<script src="{{ asset('asset/fullcalendar/packages/timegrid/main.js')}}"></script>
<script src="{{ asset('asset/fullcalendar/packages/list/main.js')}}"></script>
<script src="{{ asset('asset/fullcalendar/packages/core/locales-all.js')}}"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="{{ asset('js/scripts_for_calendar.js')}}"></script>
<script src="{{ asset('js/calendar.js')}}"></script>
@endsection


