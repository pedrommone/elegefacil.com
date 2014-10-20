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
							<h3>{{ isset($target) ? 'Editar' : 'Adicionar novo' }} {{ $title }}</h3>
						</div>

						<div class="widget-content">
							
							<form method="post" action="{{ url("admin/$uri/store") }}" id="add-form" class="form-horizontal" style="margin: 10px 0 0 0;">
								<fieldset>
									@foreach ($properties as $field => $prop)	
										@if ($prop['type'] == 'primary_key')
											<div class="control-group">											
												<label class="control-label" for="{{ $field }}">{{ $prop['name'] }}</label>
												<div class="controls">
													<input type="{{ $prop['type'] }}" class="span4" id="{{ $field }}" value="{{ Input::old($field, (isset($target) ? $target->$field : null)) }}" name="{{ $field }}" disabled="true">
													<input type="hidden" class="span4" id="{{ $field }}" value="{{ Input::old($field, (isset($target) ? $target->$field : null)) }}" name="{{ $field }}">
												</div> <!-- /controls -->
											</div> <!-- /control-group -->
										@endif

										@if ($prop['type'] == 'text')							
											<div class="control-group">											
												<label class="control-label" for="{{ $field }}">{{ $prop['name'] }}</label>
												<div class="controls">
													<input type="{{ $prop['type'] }}" class="span4" id="{{ $field }}" value="{{ Input::old($field, (isset($target) ? $target->$field : null)) }}" name="{{ $field }}">
												</div> <!-- /controls -->
											</div> <!-- /control-group -->
										@endif
									@endforeach

									<div class="form-actions" style="margin-bottom: 0;">
										<button type="submit" class="btn btn-success">Salvar</button> 
										<a class="btn" href="{{ url("admin/$uri") }}">Cancelar</a>
									</div> <!-- /form-actions -->
								</fieldset>
							</form>

						</div>
					</div>

				</div>
			</div>

		</div>
	</div>
@stop