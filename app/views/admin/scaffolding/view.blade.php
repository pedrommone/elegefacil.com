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
										
										@if ($value['type'] == 'select')
											<dd>{{ $value['options'][$target->$prop] }}</dd>
										@elseif ($value['type'] == 'file')
											<dd><img src="{{ asset('uploads/' . $target->$prop) }}"></dd>
										@elseif ($value['type'] == 'relationship')
											<dd>{{ (new $value['model'])->find($target->$prop)->$value['model_desc'] }}</dd>
										@else
											<dd>{{ $target->$prop }}</dd>
										@endif
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