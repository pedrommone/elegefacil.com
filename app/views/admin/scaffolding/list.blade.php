@extends('admin.template.master')

@section('content')
	<div class="main-inner">
		<div class="container">

			<div class="row button-actions-holder">
				<div class="span12 text-right">
					<a class="text-right btn" href="{{ url("admin/$uri/new") }}">Adicionar novo</a>
				</div>
			</div>

			<div class="row">
				<div class="span12">					

					<div class="widget widget-table action-table">
						<div class="widget-header">
							<i class="icon-th-list"></i>
							<h3>{{ ucfirst($title) }}</h3>
						</div>

						<div class="widget-content">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										@foreach($properties as $column)
											@if($column['show_list'] === true)
												<th>{{ $column['name'] }}</th>
											@endif
										@endforeach

										<th class="td-actions"></th>
									</tr>
								</thead>

								<tbody>
									@if (count($data) > 0)
										@foreach ($data as $row)
											<tr>
												@foreach ($properties as $column => $value)
													@if ($value['show_list'] === true)
														<td>
															@if ($value['type'] == 'select')
																{{ $value['options'][$row->$column] }}
															@elseif ($value['type'] == 'file')
																<img src="{{ asset('uploads/' . $target->$prop) }}">
															@elseif ($value['type'] == 'relationship')
																{{ (new $value['model'])->find($row->$column)->$value['model_desc'] }}
															@else
																{{ $row->$column }}
															@endif
														</td>
													@endif
												@endforeach

												<td class="td-actions">
													<a href="{{ url("admin/$uri/view/$row->id") }}" class="btn btn-small btn-success" title="Ver">
														<i class="btn-icon-only icon-share-alt"></i>
													</a>

													<a href="{{ url("admin/$uri/edit/$row->id") }}" class="btn btn-small btn-warning" title="Editar">
														<i class="btn-icon-only icon-edit"></i>
													</a>

													<a href="{{ url("admin/$uri/delete/$row->id") }}" class="btn btn-danger btn-small" title="Remover">
														<i class="btn-icon-only icon-trash"></i>
													</a>
												</td>
											</tr>
										@endforeach
									@else
										<tr>
											<td colspan="{{ count($properties)+1 }}">Não existem dados para exibir.</td>
										</tr>
									@endif
								</tbody>
							</table>
						</div>
					</div>

				</div>
			</div>

			<div class="row">
				<div class="span12 text-right">
					<a class="text-right btn" href="{{ url("admin/$uri/new") }}">Adicionar novo</a>
				</div>
			</div>

		</div>
	</div>
@stop