@extends('voter.template.master')

@section('content')
	<div class="main-inner">
		<div class="container">

			<div class="row start-screen">

				<div class="span6 info-block">
					<p>
						Olá, {{ $voter->name }}. Bem vindo ao sistema de votação online.
					</p>

					<p>
						Este são os seus dados no nosso sistema.

						<ul>
							<li><b>Seção eleitoral:</b> {{ $voter->section->id }}</li>
							<li><b>Zona eleitoral:</b> {{ $voter->section->zone->id }}</li>
							<li><b>Endereço para voto fisico:</b> {{ $voter->section->address }}, {{ $voter->section->zone->city }}, {{ $voter->section->zone->state }}</li>
						</ul>
					</p>
				</div>

				<div class="span6 start-voting text-center">
					@if ($voter->voted_at == '0000-00-00 00:00:00')
						<a id="start-voting" href="{{ url('voter/dashboard/urna') }}" class="btn btn-warning">Iniciar votação</a>
					@else
						<a href="#" class="btn btn-warning" disabled>Obrigado pelo seu voto!</a>
					@endif
				</div>

			</div>

		</div>
	</div>
@stop
