@extends('admin.template.master')

@section('content')
	<script src="{{ asset('js/jquery-1.7.2.min.js') }}"></script>
	<script src="{{ asset('js/excanvas.min.js') }}"></script>
	<script src="{{ asset('js/chart.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.js') }}"></script>
	<script src="{{ asset('js/base.js') }}"></script>

	<div class="main-inner">

		<div class="container">

			<div class="row">
				<div class="span12">
					<div class="info-box">
						<div class="row-fluid stats-box">
							<div class="span6">
								<div class="stats-box-title">Total de votos</div>
								<div class="stats-box-all-info">
									<i class="icon-user" style="color:#3366cc;"></i>
									{{ $total_votes }}
								</div>
							</div>

							<div class="span6">
								<div class="stats-box-title">Porcentagem de eleitores que votaram</div>
								<div class="stats-box-all-info"><i class="icon-thumbs-up"  style="color:#F30"></i>
									{{ number_format(($total_regular_voters * 100) / $total_voters, 2, ',', '')  }}%
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<script type="text/javascript" src="https://www.google.com/jsapi"></script>
			<script>
				google.load("visualization", "1", {packages:["corechart"]});
			</script>

			<!-- /row -->

			@foreach (array_chunk($candidate_types, 2) as $sub_group)
				<div class="row">

					@foreach ($sub_group as $graph)
						<div class="span6">

							<div class="widget">

								<div class="widget-header">
									<i class="icon-star"></i>
									<h3>Gráfico para {{ $graph['type'] }}</h3>
								</div> <!-- /widget-header -->

								<div class="widget-content">
									<div id="chart-{{ $graph['id'] }}" class="chart-holder" height="250" width="538"></div>
								</div> <!-- /widget-content -->

							</div> <!-- /widget -->
						</div> <!-- /span6 -->

						<script>
							$(document).ready(function()
							{	

								var data = google.visualization.arrayToDataTable([
						          ['Candidato', 'Votos'],
						          @foreach ($graph['candidates'] as $candidate)
						          	["{{ $candidate['nickname'] }}", {{ $candidate['total_votes'] }}]{{ ($candidate['id'] == end($graph['candidates'])['id'] ? '' : ',') }}
						          @endforeach
						        ]);

						        var chart = new google.visualization.PieChart(document.getElementById("chart-{{ $graph['id'] }}"));

						        chart.draw(data);
							});
						</script>
					@endforeach

				</div> <!-- /row -->
			@endforeach

		</div> <!-- /container -->

	</div> <!-- /main-inner -->
@stop