@extends('app')
 
@section('content')

<div class="container">

   @columnchart('MilkProduction', 'perf_div')


<div id="perf_div"></div>
    
</div>
@endsection
          