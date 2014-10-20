@extends('admin.template.master')

@section('content')
	<div class="main-inner">
		<div class="container">

			<div class="row button-actions-holder">
				<div class="span12 text-right">
					<a class="text-right btn btn-warning" href="{{ url("admin/$uri") }}">Voltar</a>
				</div>
			</div>

			<div class="row">
				<div class="span12">					

					<div class="widget widget-table action-table">
						<div class="widget-header">
							<i class="icon-th-list"></i>
							<h3>Ver {{ $title }}</h3>
						</div>

						<div class="widget-content">
							<dl class="dl-horizontal">
								@foreach($properties as $prop => $value)
									@if(! isset($value['hide_view']))
										<dt>{{ $value['name'] }}</dt>
										<dd>{{ $target->$prop }}</dd>
									@endif
								@endforeach
							</dl>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>
@stop