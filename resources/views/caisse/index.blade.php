@extends('base')
<div class="burval-container">
 <div><h2 class="heading">Caisse</h2></div>
    <br/>
	
	
	<form class="form-horizontal" method="post" action="">
	
		 <!-- INFORMATIONS GENERALE -->
        <p>INFORMATIONS GENERALES</p>
        <hr class="title-separator"/>
        <br/>
		<div class="row">
		 <div class="form-group row">
                    <label for="caisse_date" class="col-sm-5">Date de saisie</label>
                    <input type="date" name="caisse_date" id="caisse_date" class="editbox col-sm-7" required/>
                    <div>
                        <ul id="list-clients"></ul>
                    </div>
                </div>
		</div>
        <div class="row">
            <div class="col">
               
               
                <div class="form-group row">
                    <label for="caisse_op" class="col-sm-5">Operatrice de saise</label>
                    <input type="text" name="caisse_op" id="caisse_op" class="editbox col-sm-7"/>
                </div>
                <div class="form-group row">
                    <label for="caisse_heure" class="col-sm-6">Heure de prise de Box</label>
                    <input type="time" name="caisse_heure" id="caisse_heure" class="editbox col-sm-6"/>
                </div>
            </div>
            <div class="col">
                <div class="form-group row">
                   
                </div>
             
                <div class="form-group row">
                    <label for="caisse_numbox" class="col-sm-5">Numero de Box</label>
                    <input type="text" name="caisse_numbox" id="caisse_numbox" class="editbox col-sm-7"/>
                </div>
               <div class="form-group row">
                    <label for="caisse_fheure" class="col-sm-5">Heure de fin de Box</label>
                    <input type="time" name="caisse_fheure" id="caisse_fheure" class="editbox col-sm-7"/>
                </div>
            </div>
            <div class="col">
                <div>
                    <button class="btn btn-primary button" type="submit">Valider</button>
                </div>
                <br/>
                <div>
                    <button class="btn btn-danger button" type="reset">Annuler</button>
                </div>
                <br/>
                <br/>
                
            </div>
        </div>
		 <h6>Bordereau</h6>
		
		<div class="row">
		<div class="col">
				<div class="form-group row">
                    <label for="caisse_numtour" class="col-sm-5">Numero de tournée</label>
                    <input type="text" name="caisse_numtour" id="caisse_numtour" class="editbox col-sm-7"/>
                </div>
               <div class="form-group row">
                    <label for="caisse_bord" class="col-sm-5">Numero de bordereau</label>
                    <input type="time" name="caisse_bord" id="caisse_bord" class="editbox col-sm-7"/>
                </div>
		</div>
		<div class="col">
				<div class="row">
				<div class="col-4">
				
				<h6>Convoyeur garde</h6>
				</div>
				<div class="col-1">
				<hr style="border:none;border-left:2px solid hsla(200, 10%, 50%,100);height:20vh;width:1px;">
				</div>
				<div class="col">
				<div class="form-group row">
                    <label for="caisse_nom" class="col-sm-5">Nom</label>
                    <input type="text" name="caisse_nom" id="caisse_numtour" class="editbox col-sm-7"/>
                </div>
               <div class="form-group row">
                    <label for="caisse_prenom" class="col-sm-5">Prenom(s)</label>
                    <input type="text" name="caisse_prenom" id="caisse_prenoms" class="editbox col-sm-7"/>
                </div>
				<div class="form-group row">
                    <label for="caisse_mat" class="col-sm-5">Matricule</label>
                    <input type="text" name="caisse_mat" id="caisse_mat" class="editbox col-sm-7"/>
                </div>
				</div>
				</div>
		</div>
		<div class="col">
						<div class="row">
				<div class="col-4">
				
				<h6>Régulatrice</h6>
				</div>
				<div class="col-1">
				<hr style="border:none;border-left:2px solid hsla(200, 10%, 50%,100);height:20vh;width:1px;">
				</div>
				<div class="col">
				<div class="form-group row">
                    <label for="caisse_nomre" class="col-sm-5">Nom</label>
                    <input type="text" name="caisse_nomre" id="caisse_nomre" class="editbox col-sm-7"/>
                </div>
               <div class="form-group row">
                    <label for="caisse_prenomre" class="col-sm-5">Prenom(s)</label>
                    <input type="text" name="caisse_prenomre" id="caisse_prenomre" class="editbox col-sm-7"/>
                </div>
				<div class="form-group row">
                    <label for="caisse_matre" class="col-sm-5">Matricule</label>
                    <input type="text" name="caisse_matre" id="caisse_matre" class="editbox col-sm-7"/>
                </div>
				</div>
				</div>
		</div>
		</div>
		<h6>Colis</h6>
	<div class="row">
		<div class="col">
			<div class="form-group row">
                    <label for="caisse_securi" class="col-sm-5">Securipack</label>
                    
					<select class="form-control col-sm-7" id="securi">
					<option>Extra grand</option>
					<option>Grand</option>
					<option>Moyen</option>
					<option>Petit</option>
					</select>
                </div>
               	<div class="form-group row">
                    <label for="caisse_sacju" class="col-sm-5">Sac jute</label>
                    
					<select class="form-control col-sm-7" id="sacju">
					<option>Extra grand</option>
					<option>Grand</option>
					<option>Moyen</option>
					<option>Petit</option>
					</select>
                </div>
		</div>
		<div class="col">
		<div class="form-group row">
                    <label for="caisse_nombre" class="col-sm-5">Nombre</label>
                    <input type="number" name="caisse_nombre" id="caisse_nombre" class="editbox col-sm-7"/>
                </div>
		</div>
		<div class="col">
		<div class="form-group row">
                    <label for="caisse_numsce" class="col-sm-5">Numero de scellé</label>
                    <input type="number" name="caisse_numsce" id="caisse_numsce" class="editbox col-sm-7"/>
                </div>
		</div>
		<div class="col">
		<div class="form-group row">
                    <label for="caisse_mnta" class="col-sm-5">Montant annoncé</label>
                    <input type="number" name="caisse_mnta" id="caisse_mnta" class="editbox col-sm-7"/>
                </div>
		</div>
		
		
		</div>
		
		
		<div class="row">
		<div class="col">
				 <div class="form-group row">
                    <label for="caisse_client" class="col-sm-5">Client</label>
                    
					<select class="form-control col-sm-7" id="caisse_client">
					<option>SonDO</option>
					<option>GrandAme</option>
					<option>MoyenGA Ismael</option>
					<option>Emmanuel Petit</option>
					</select>
                </div>
				<div class="form-group row">
                    <label for="caisse_site" class="col-sm-5">Site</label>
                    <input type="number" name="caisse_site" id="caisse_site" class="editbox col-sm-7"/>
                </div>
				<div class="form-group row">
                    <label for="caisse_expe" class="col-sm-5">Expediteur</label>
                    <input type="number" name="caisse_expe" id="caisse_expe" class="editbox col-sm-7"/>
                </div>
				<div class="form-group row">
                    <label for="caisse_desti" class="col-sm-5">Destinataire</label>
                    <input type="number" name="caisse_desti" id="caisse_desti" class="editbox col-sm-7"/>
                </div>
		</div>
		<div class="col">
		<button type="button" class="btn btn-primary btn-xs">Billetage annoncé</button>
			<table class="table table-condensedr">
			<thead>
			  <tr>
				<th>Nombre</th>
				<th>Billetage</th>
				<th>Francs CFA</th>
			  </tr>
			</thead>
			<tbody>
			  <tr>
				<td></td>
				<td>10000</td>
				<td></td>
			  </tr>
			  <tr>
				<td></td>
				<td>5000</td>
				<td></td>
			  </tr>
			  <tr>
				<td></td>
				<td>2000</td>
				<td></td>
			  </tr>
			   <tr>
				<td></td>
				<td>1000</td>
				<td></td>
			  </tr>
			   <tr>
				<td></td>
				<td>500</td>
				<td></td>
			  </tr>
			   <tr>
				<td></td>
				<td>250</td>
				<td></td>
			  </tr>
			   <tr>
				<td></td>
				<td>200</td>
				<td></td>
			  </tr>
			   <tr>
				<td></td>
				<td>100</td>
				<td></td>
			  </tr>
			   <tr>
				<td></td>
				<td>50</td>
				<td></td>
			  </tr>
			   <tr>
				<td></td>
				<td>25</td>
				<td></td>
			  </tr>
			   <tr>
				<td></td>
				<td>10</td>
				<td></td>
			  </tr>
			   <tr>
				<td></td>
				<td>5</td>
				<td></td>
			  </tr>
			   <tr>
				<td></td>
				<td>1</td>
				<td></td>
			  </tr>
			</tbody>
		  </table>
		</div>
		<div class="col">
		<button type="button" class="btn btn-primary btn-xs">Billetage reconnu</button>
				<table class="table table-condensed">
			<thead>
			  <tr>
				<th>Nombre</th>
				<th>Billetage</th>
				<th>Francs CFA</th>
			  </tr>
			</thead>
			<tbody>
			  <tr>
				<td></td>
				<td>10000</td>
				<td></td>
			  </tr>
			  <tr>
				<td></td>
				<td>5000</td>
				<td></td>
			  </tr>
			  <tr>
				<td></td>
				<td>2000</td>
				<td></td>
			  </tr>
			   <tr>
				<td></td>
				<td>1000</td>
				<td></td>
			  </tr>
			   <tr>
				<td></td>
				<td>500</td>
				<td></td>
			  </tr>
			   <tr>
				<td></td>
				<td>250</td>
				<td></td>
			  </tr>
			   <tr>
				<td></td>
				<td>200</td>
				<td></td>
			  </tr>
			   <tr>
				<td></td>
				<td>100</td>
				<td></td>
			  </tr>
			   <tr>
				<td></td>
				<td>50</td>
				<td></td>
			  </tr>
			   <tr>
				<td></td>
				<td>25</td>
				<td></td>
			  </tr>
			   <tr>
				<td></td>
				<td>10</td>
				<td></td>
			  </tr>
			   <tr>
				<td></td>
				<td>5</td>
				<td></td>
			  </tr>
			   <tr>
				<td></td>
				<td>1</td>
				<td></td>
			  </tr>
			</tbody>
		  </table>
		</div>
		</div>
		
		
		
		
		<div class="row">
		<div class="col">
		<div class="form-group row">
                    <label for="caisse_monreco" class="col-sm-5">Montant reconnu</label>
                    <input type="number" name="caisse_monreco" id="caisse_monreco" class="editbox col-sm-7"/>
                </div>
				<div class="form-group row">
                    <label for="caisse_eccon" class="col-sm-5">Ecart constaté</label>
                    <input type="number" name="caisse_eccon" id="caisse_eccon" class="editbox col-sm-7"/>
                </div>
				<div class="form-group row">
                    <label for="caisse_monfi" class="col-sm-5">Montant final</label>
                    <input type="number" name="caisse_monfi" id="caisse_monfi" class="editbox col-sm-7"/>
                </div>
		</div>
		</div>
		<div class="row">
		<div class="col">
			<div class="row">
				<div class="col-4">
				
				<h6>Observation</h6>
				</div>
				<div class="col-1">
				<hr style="border:none;border-left:2px solid hsla(200, 10%, 50%,100);height:20vh;width:1px;">
				</div>
				<div class="col">
				<div class="form-group row">
                    <label for="caisse_bc" class="col-sm-5">Billets calculés</label>
					<label><input type="checkbox" value="">Oui</label>
					<label><input type="checkbox" value="">Non</label>
                    <input type="text" name="caisse_bc" id="caisse_bc" class="editbox col-sm-4"/>
                </div>
               <div class="form-group row">
                    <label for="caisse_bsav" class="col-sm-5">Billets sans valeurs</label>
					<label><input type="checkbox" value="">Oui</label>
					<label><input type="checkbox" value="">Non</label>
                    <input type="text" name="caisse_bsav" id="caisse_bsav" class="editbox col-sm-4"/>
                </div>
				<div class="form-group row">
                    <label for="caisse_busa" class="col-sm-5">Billets usagés</label>
					<label><input type="checkbox" value="">Oui</label>
					<label><input type="checkbox" value="">Non</label>
                    <input type="text" name="caisse_busa" id="caisse_busa" class="editbox col-sm-4"/>
                </div>
				<div class="form-group row">
                    <label for="caisse_fau" class="col-sm-5">Faux billets</label>
					<label><input type="checkbox" value="">Oui</label>
					<label><input type="checkbox" value="">Non</label>
                    <input type="text" name="caisse_fau" id="caisse_fau" class="editbox col-sm-4"/>
                </div>
				
				
				<div class="form-group row">
                    <label for="caisse_bide" class="col-sm-5">Billets déparaillés</label>
					<label><input type="checkbox" value="">Oui</label>
					<label><input type="checkbox" value="">Non</label>
                    <input type="text" name="caisse_bide" id="caisse_bide" class="editbox col-sm-4"/>
                </div>
				</div>
				</div>
		</div>
		</div>
	</form>
</div>