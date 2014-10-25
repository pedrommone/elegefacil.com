@extends('admin.template.master')

@section('content')
	<div class="main-inner">
		<div class="container">

			<div class="row">
				<div class="span12">
					<div class="widget">
						<div class="widget-header">
							<i class="icon-bookmark"></i>
							<h3>Atalhos</h3>
						</div>

						<div class="widget-content">
							<div class="shortcuts">
								<a href="{{ url('admin/candidate-type/new') }}" class="shortcut">
									<i class="shortcut-icon icon-list-alt"></i>
									<span class="shortcut-label">Novo cargo</span>
								</a>

								<a href="{{ url('admin/candidates/new') }}" class="shortcut">
									<i class="shortcut-icon icon-list-alt"></i>
									<span class="shortcut-label">Novo candidato</span>
								</a>

								<a href="{{ url('admin/parties/new') }}" class="shortcut">
									<i class="shortcut-icon icon-list-alt"></i>
									<span class="shortcut-label">Novo partido</span>
								</a>

								<a href="{{ url('admin/voters/new') }}" class="shortcut">
									<i class="shortcut-icon icon-list-alt"></i>
									<span class="shortcut-label">Novo eleitor</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">

				<div class="span12">
					<div class="widget widget-nopad">

						<div class="widget-header">
							<i class="icon-list-alt"></i>
							<h3>Contadores</h3>
						</div>

						<div class="widget-content">
							<div class="widget big-stats-container">
								<div class="widget-content">

									<div id="big_stats" class="cf">
										<div class="stat">
											<i>Cargos</i>
											<span class="value">{{ $count_candidate_types }}</span>
										</div>

										<div class="stat">
											<i>Candidatos</i>
											<span class="value">{{ $count_candidates }}</span>
										</div>

										<div class="stat">
											<i>Partidos</i>
											<span class="value">{{ $count_parties }}</span>
										</div>

										<div class="stat">
											<i>Seções</i>
											<span class="value">{{ $count_sections }}</span>
										</div>

										<div class="stat">
											<i>Eleitores</i>
											<span class="value">{{ $count_voters }}</span>
										</div>

										<div class="stat">
											<i>Zonas</i>
											<span class="value">{{ $count_zones }}</span>
										</div>
									</div>
								</div>
								<!-- /widget-content --> 

							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
@stop