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
							
							<form method="post" action="{{ url("admin/$uri/store") }}" id="add-form" class="form-horizontal" style="margin: 10px 0 0 0;" enctype="multipart/form-data">
								<fieldset>
									@foreach ($properties as $field => $prop)	
										@if ($prop['type'] == 'primary_key' && isset($target))
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
													<input type="{{ $prop['type'] }}" class="span4" id="{{ $field }}" value="{{ Input::old($field, (isset($target) ? $target->$field : null)) }}" name="{{ $field }}" placeholder="{{ (isset($prop['placeholder']) ? $prop['placeholder'] : '') }}">
												</div> <!-- /controls -->
											</div> <!-- /control-group -->
										@endif

										@if ($prop['type'] == 'file')
											<div class="control-group">
												<label class="control-label" for="{{ $field }}">{{ $prop['name'] }}</label>
												<div class="controls">
													<input type="file" name="{{ $field }}" id="{{ $field }}">
												</div> <!-- /controls -->
											</div> <!-- /control-group -->
										@endif

										@if ($prop['type'] == 'textarea')
											<div class="control-group">
												<label class="control-label" for="{{ $field }}">{{ $prop['name'] }}</label>
												<div class="controls">
													<textarea style="height: 100px;" type="{{ $prop['type'] }}" class="span4" id="{{ $field }}" name="{{ $field }}" placeholder="{{ (isset($prop['placeholder']) ? $prop['placeholder'] : '') }}">{{ Input::old($field, (isset($target) ? $target->$field : null)) }}</textarea>
												</div> <!-- /controls -->
											</div> <!-- /control-group -->
										@endif

										@if ($prop['type'] == 'password')
											<div class="control-group">
												<label class="control-label" for="{{ $field }}">{{ $prop['name'] }}</label>
												<div class="controls">
													<input type="{{ $prop['type'] }}" class="span4" id="{{ $field }}" name="{{ $field }}">
												</div> <!-- /controls -->
											</div> <!-- /control-group -->
										@endif

										@if ($prop['type'] == 'relationship')
											<div class="control-group">
												<label class="control-label" for="{{ $field }}">{{ $prop['name'] }}</label>
												<div class="controls">
													<select name="{{ $field }}" id="{{ $field }}">
														@foreach($models[$prop['model']] as $k => $v)															
															<option value="{{ $k }}"{{ (isset($target) && $target->$field == $k ? ' selected="selected"' : '') }}>{{ $v }}</option>
														@endforeach
													</select>
												</div> <!-- /controls -->
											</div> <!-- /control-group -->
										@endif

										@if ($prop['type'] == 'select')
											<div class="control-group">
												<label class="control-label" for="{{ $field }}">{{ $prop['name'] }}</label>
												<div class="controls">
													<select name="{{ $field }}" id="{{ $field }}">
														@foreach($prop['options'] as $k => $v)															
															<option value="{{ $k }}"{{ (isset($target) && $target->$field == $k ? ' selected="selected"' : '') }}>{{ $v }}</option>
														@endforeach
													</select>
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