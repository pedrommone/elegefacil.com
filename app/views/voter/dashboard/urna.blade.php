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
										<img src="">
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
									<button type="button" class="branco">BRANCO</button>
									<button type="button" class="corr">CORRIGE</button>
									<button type="button" class="conf">CONFIRMA</button>
								</footer>
							</fieldset>

						</form>
					</section>

				</div>

			</div>

		</div>
	</div>
@stop