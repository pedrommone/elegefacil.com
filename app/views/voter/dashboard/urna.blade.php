@extends('voter.template.master')

@section('content')
	<div class="main-inner">
		<div class="container">

			<div class="row start-screen">

				<div id="urna" class="span8 offset2">

					<section>

						<form class="urna">

							<fieldset class="display">
								<legend class="legenda"></legend>

								<header>
									<figure class="foto">
										<img width="90px" height="100px" src="">
									</figure>
									<h2 class="cargo"></h2>
								</header>

								<label class="numero"></label>
								<label class="nome"></label>
								<label class="partido"></label>
								<label class="branco"></label>

								<footer class="instrucoes-voto">    
									<span>Aperte a tecla:</span>
									<p>VERDE para CONFIRMAR este voto.</p>
									<p>LARANJA para REINICIAR este voto.</p>
								</footer>
							</fieldset>

							<fieldset class="painel">
								<menu class="nos">
									<button type="button" class="digitar" data-val="1">1</button>
									<button type="button" class="digitar" data-val="2">2</button>
									<button type="button" class="digitar" data-val="3">3</button>
									<button type="button" class="digitar" data-val="4">4</button>
									<button type="button" class="digitar" data-val="5">5</button>
									<button type="button" class="digitar" data-val="6">6</button>
									<button type="button" class="digitar" data-val="7">7</button>
									<button type="button" class="digitar" data-val="8">8</button>
									<button type="button" class="digitar" data-val="9">9</button>
									<button type="button" class="digitar" data-val="0">0</button>
								</menu>

								<footer class="foot">
									<button type="button" class="anula">BRANCO</button>
									<button type="button" class="corr">CORRIGE</button>
									<button type="button" class="conf">CONFIRMA</button>
								</footer>
							</fieldset>

						</form>
					</section>
				</div>

			</div>

			<div id="obrigado" class="hero-unit">
				<h1>Obrigado!</h1>

				<p>O seu voto é muito importante para o Brasil.</p>
			</div>

		</div>
	</div>

	<script>
		$(document).ready(function()
		{
			var votes = [],
				 currentType = 0,
				 candidates = null,
				 validNumber = false;

			$('.digitar').on('click', function()
			{

				if ($('.numero').text().length < 5)
				{

					$('.numero').append($(this).data('val'));
					toggleConfirm('disabled');
				}

				if ($('.numero').text().length == 5)
				{

					toggleNumbers('disabled');
					toggleConfirm('');
					drawScreen($('.numero').html());
				}
			});

			$('.corr').on('click', function()
			{

				clearScreen();
				toggleNumbers('');
				toggleConfirm('disabled');
			});

			$('.branco').on('click', function()
			{

				vote();
			});

			$('.conf').on('click', function()
			{

				if (validNumber)
				{

					vote(parseInt($('.numero').html()) % 1000);
				}
				else
				{

					vote();
				}
			});

			var clearScreen = function()
			{

				$('.nome, .partido, .branco, .numero').html("");
				$('img').attr('src', "");
			}

			var showType = function()
			{
				clearScreen();

				$('.legenda').html('Voto para ' + candidates[currentType].type);
				$('.numero').html('');

				toggleNumbers('');
				toggleConfirm('disabled');
			}

			var drawScreen = function(id)
			{

				for (var i = 0; i < candidates[currentType].candidates.length; i++)
				{

					var candidate = candidates[currentType].candidates[i];

					if (candidate.vote_number == id)
					{

						$('.nome').html(candidate.nickname);
						$('.partido').html(candidate.party.name);
						$('img').attr('src', "{{ url('uploads') }}/" + candidate.picture);

						validNumber = true;
					}
					else
					{
						$('.branco').html('Voto nulo');

						validNumber = false;
					}
				}
			}

			var vote = function(candidate)
			{

				if (candidate)
					votes.push(candidate);

				currentType++;

				if (typeof candidates[currentType] == 'undefined')
				{

					finishVote();
				}
				else
				{

					showType();
				}
			}

			var finishVote = function()
			{

				clearScreen();

				toggleNumbers('disabled');
				toggleActions('disabled');

				$.ajax({
					url: '{{ url('voter/dashboard/vote') }}',
					type: 'POST',
					dataType: 'json',
					data: {
						votes: votes
					}
				})
				.done(function(response)
				{

					$('#urna').hide();
					$('#obrigado').fadeIn(300);
				});
			}

			var toggleNumbers = function(status)
			{

				$('.digitar').prop('disabled', status);
			}

			var toggleActions = function(status)
			{

				$('.foot > button').prop('disabled', status);
			}

			var toggleConfirm = function(status)
			{

				$('.conf').prop('disabled', status);
			}

			toggleNumbers('disabled');
			toggleActions('disabled');

			$.ajax({
				url: '{{ url('voter/dashboard/candidates') }}',
				dataType: 'json'
			})
			.done(function(response)
			{

				candidates = response;
				showType();

				toggleNumbers('');
				toggleActions('');
				toggleConfirm('disabled');
			});
		});
	</script>
@stop