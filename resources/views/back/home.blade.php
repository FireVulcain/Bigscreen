@extends('layouts.back')

@section('content')
    <section id="chartsElements" class="row"></section>
@endsection


@section('scripts')
<script src="{{asset('js/charts.js')}}"></script>
<script src="{{asset('js/radarcharts.js')}}"></script>
<script src="{{asset('js/piecharts.js')}}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let pieDatas = [@json($datas_q6), @json($datas_q7), @json($datas_q8)];
        generatePieCharts(pieDatas);

        let radarDatas = @json($datas_radar);
        generateRadarCharts(radarDatas);
    });
</script>
        
@endsection