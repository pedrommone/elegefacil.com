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
							<div class="span4">
								<div class="stats-box-title">Total de votos</div>
								<div class="stats-box-all-info">
									<i class="icon-user" style="color:#3366cc;"></i>
									{{ $total_votes }}
								</div>
							</div>

							<div class="span4">
								<div class="stats-box-title">Total de votos nulos</div>
								<div class="stats-box-all-info"><i class="icon-thumbs-up"  style="color:#F30"></i>
									66.66
								</div>
							</div>

							<div class="span4">
								<div class="stats-box-title">Porcentagem de eleitores que votaram</div>
								<div class="stats-box-all-info">
									<i class="icon-shopping-cart" style="color:#3C3"></i>
									15.55
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

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
									<canvas class="chart-{{ $graph['id'] }} chart-holder" height="250" width="538"></canvas>
								</div> <!-- /widget-content -->

							</div> <!-- /widget -->
						</div> <!-- /span6 -->

						<script>
							$(document).ready(function()
							{	

								var pieData = [
									@foreach ($graph['candidates'] as $candidate)
										{
											label: "{{ $candidate['nickname'] }}",
											value: {{ $candidate['total_votes'] }}
										},
									@endforeach
								];

								var myPie = new Chart(document.getElementsByClassName("chart-{{ $graph['id'] }}")[0].getContext("2d")).Pie(pieData);

							});
						</script>
					@endforeach

				</div> <!-- /row -->
			@endforeach

		</div> <!-- /container -->

	</div> <!-- /main-inner -->
@stop