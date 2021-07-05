@extends('layouts.panel')
@section('content')
    <div class="header-project">
        <span class="h2 project-name"><a href="">News-Generator</a> </span>
        <span>Generator video news for YOUTUBE</span>
    </div>
    <ul class="nav nav-tabs nav-custom">
        <li class="nav-item">
            <a class="nav-link {{ (Request::is('/') ? 'active' : '') }}" id="nav-home-tab" href="" role="tab" aria-controls="dashboard" aria-selected="true">
                Home
            </a>
        </li>
    </ul>
    <div class="tab-content" id="project-tab">
            <div class="tab-pane fade active show" id="tasks" role="tabpanel" aria-labelledby="tasks-tab">
                <input type="text" name="textSpeech" id="textSpeech" class="form-control">
                <button style="border: 0.5px solid black" class="btn"  id="test_api">Test API</button>
            </div>
{{--        @yield('tab')--}}

    </div>
@endsection
@push('scripts_page')
    <script>
        $('#test_api').on('click',function (){
           if($("#textSpeech").val()!= ''){
               let speech = $('#textSpeech').val();
               $.ajax({
                  url:'{{route('test-api')}}',
                  method:'POST',
                  data: {speech},
                   headers: {
                       'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                   },
                   success:function (response){
                      alert('success');
                   }
               });
           }
        });
    </script>
@endpush
