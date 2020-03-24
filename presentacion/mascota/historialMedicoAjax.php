<?php
$especialidad = new Especialidad();
$especialidades = $especialidad ->consultarTodos();
?>
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label">Especialidad</label>
						</div>
						<div class="field-body">
							<div class="field is-narrow">
								<div class="control">
									<div class="select is-fullwidth">
										<select name="veterinario"">
											<option>------------</option>
										<?php foreach($especialidades as $e){
										    if($e ->getNombre() !="General"){
										    echo "<option>".$e -> getNombre()."</option>";
										    }
										    
										}?>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>