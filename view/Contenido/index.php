<?php 
require './view/header.php'; 
require_once "libs/BaseDatos.php";


?>

<!-- Incluye Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Incluye jQuery y Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script>
        /*Las variables  valoresErpPorBanda valoresErpPorBanda1 son arreglos globales las cuales se crean
        para poder obtener los resultados en la funcion calcularEIRPyERP
        */
        var valoresErpPorBanda = {};
        var valoresErpPorBanda1 = {};


        /*Las variables  valoresErpPorBanda valoresErpPorBanda1 son arreglos globales las cuales se crean
        para poder obtener los resultados en la funcion calcularEIRPyERP
        */
        var valoresErpPorBanda = {};
        var valoresErpPorBanda1 = {};

        function generarBandas() {
    var numeroDeBandas = parseInt(document.getElementById('numeroDeBandas').value);
    var contenedorDeBandas = document.getElementById('contenedorDeBandas');

    contenedorDeBandas.innerHTML = '';

    for (var i = 1; i <= numeroDeBandas; i++) {
        var divBanda = document.createElement('div');
        divBanda.classList.add('banda', 'mb-4'); // Añadir margen inferior
        divBanda.innerHTML = `
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Antena ${i}</h3>
                    <div class="form-group">
                        <label for="potenciaTransmisor${i}">Potencia del Transmisor (W):</label>
                        <input type="text" id="potenciaTransmisor${i}" name="potenciaTransmisor" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="gananciaAntena${i}">Ganancia de la Antena (dbi):</label>
                        <input type="text" id="gananciaAntena${i}" name="gananciaAntena" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="atenuacion${i}">Atenuación (dB):</label>
                        <input type="text" id="atenuacion${i}" name="atenuacion" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Amplificador${i}">Amplificador (dB):</label>
                        <input type="text" id="Amplificador${i}" name="Amplificador" class="form-control">
                    </div>
                    <button type="button" class="btn btn-success" onclick="calcularEIRPyERP(${i})">Calcular PIRE ♦ PER ${i}</button>
                    <div id="resultadosEIRP${i}" class="alert alert-primary" role="alert"></div>
                    <div id="resultadosERP${i}" class="alert alert-primary" role="alert"></div>
                    <div class="form-group">
                        <label for="frecuencia${i}">Frecuencia (MHz):</label>
                        <input type="text" id="frecuencia${i}" name="frecuencia" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="alturaRadiacion${i}">Ingrese la altura de la antena (m):</label>
                        <input type="text" id="alturaRadiacion${i}" name="alturaRadiacion" class="form-control">
                    </div>
                    <button type="button" class="btn btn-success" onclick="calcularRelacionExposicion(${i})">Evaluar Cumplimiento</button>
                    <div id="ResultadosTres${i}" class="resultado"></div>
                    <div id="Imagen1${i}" class="resultado"></div>
                    <div id="ResultadosCuatro${i}" class="resultado"></div>
                    <div id="Imagen2${i}" class="resultado"></div>
                    <div id="ResultadosCinco${i}" class="resultado"></div>
                    <div id="Imagen3${i}" class="resultado"></div>
                    <div id="ResultadosSeis${i}" class="resultado"></div>
                    <div id="Imagen4${i}" class="resultado"></div>
                    <div class="form-group">
                        <label for="Correo${i}" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="Correo${i}" placeholder="Correo@gmail.com">
                    </div>
                    <div class="form-group">
                        <label for="Comentario${i}" class="form-label">Comentarios</label>
                        <textarea class="form-control" id="Comentario${i}" rows="3"></textarea>
                    </div>
                    <button type="button" class="btn btn-success" onclick="RegistrarDatos(${i})">Registrar Datos</button>
                    <div id="ResultadosComentario${i}" class="resultado"></div><br>
                    <button type="button" class="btn btn-success" onclick="generarPDF(${i})">Generar PDF</button>


                </div>
            </div>
        `;
        contenedorDeBandas.appendChild(divBanda);
    }
}


            
            

        function calcularEIRPyERP(banda) {
            var potenciaTransmisorWatt = parseFloat(document.getElementById('potenciaTransmisor' + banda).value);
            var gananciaAntena = parseFloat(document.getElementById('gananciaAntena' + banda).value);
            var atenuacion = parseFloat(document.getElementById('atenuacion' + banda).value);
            var Amplificador = parseFloat(document.getElementById('Amplificador' + banda).value);

            if (isNaN(potenciaTransmisorWatt) || isNaN(gananciaAntena) || isNaN(atenuacion)) {
                document.getElementById('resultadosEIRP' + banda).innerHTML = 'Por favor, ingresa valores válidos.';
                document.getElementById('resultadosERP' + banda).innerHTML = '';
                return;
            }
            /*Calculo del PIRE*/
            var potenciaTransmisorDBW = 10 * Math.log10(potenciaTransmisorWatt);
            var eirpDBW = potenciaTransmisorDBW + gananciaAntena - atenuacion + Amplificador;
            var eirpWatt = Math.pow(10, eirpDBW / 10);
            var eirpDBm = eirpDBW + 30;
            
            // Aquí se calcula el ERP
            var perdbm=eirpDBm-2.15;
            var perdbw=perdbm-30;
            var perdbV= Math.pow(10,perdbw/10);
            var gananciaAntenaLineal = Math.pow(10, gananciaAntena / 10);
            var erpWatt = potenciaTransmisorWatt * gananciaAntenaLineal; // ERP en vatios
            var erpDBW = 10 * Math.log10(erpWatt); // ERP en dBW
            var erpDBm = erpDBW + 30; // ERP en dBm

            document.getElementById('resultadosEIRP' + banda).innerHTML = 
                '<strong>PIRE:</strong><br>' +'  '+
                 eirpDBm.toFixed(2)+ ' dBm  '+'   '+
                 eirpDBW.toFixed(2) + '  dBw ' +' '+
                eirpWatt.toFixed(2) + ' W ' ;

            document.getElementById('resultadosERP' + banda).innerHTML = 
                '<strong>PER :</strong><br>' +' '+
                  perdbm.toFixed(2)+' dBm '+'  '+
                  perdbw.toFixed(2) +' dBw'+ '  ' +
                perdbV.toFixed(2) + ' W ' ;
                valoresErpPorBanda[banda] = eirpWatt;
                valoresErpPorBanda1[banda]=perdbV;
        }
        var sumatoriasPorBanda = {};
        var sumaTotal = 0;
        function RegistrarDatos(banda){
            var Correo = document.getElementById('Correo'+banda).value;
            var Comentario=document.getElementById('Comentario'+banda).value;
            document.getElementById('ResultadosComentario' + banda).innerHTML =Correo+'<br>'+Comentario+'<br>';



        }
        function calcularRelacionExposicion (banda) {
            var frecuencia = parseFloat(document.getElementById('frecuencia'+banda).value);
            var alturaRadiacion= parseFloat(document.getElementById('alturaRadiacion'+banda).value);
            var eripWattActual = valoresErpPorBanda[banda];
            var erpWattActual = valoresErpPorBanda1[banda];
            var Si=true;
            var S1,r,r1;

            

      
          if (0.1 <= frecuencia && frecuencia < 30) {
            
            
            document.getElementById('ResultadosTres' + banda).innerHTML = `
                        <div class="alert alert-warning" role="alert">
                        <strong><h3>[Punto 3.2] Procesos para evaluación simplificada espacio público general para bandas no IMT</h3></strong><br>
                        El cálculo de estas distancias es aplicable para las estaciones que operen en frecuencias iguales o mayores a 30 MHz. Para las estaciones cuya frecuencia de operación sea inferior a 30 MHz el único procedimiento de evaluación aplicable es el de mediciones de campos electromagnéticos establecido en la sección 3.4.<br>
                        Puede Consultar la resolución 773, que se encuentra al final de la pagina.
                        <br>
                        </div>
                        `;
              
            } else if (30 <=frecuencia && frecuencia <= 400) {
                alturaporusuario=alturaRadiacion;
                alturaRadiacion=alturaRadiacion-2;
                /*Las variables minimaDistancia se usa para PIRE y minimaDistancia1 para PER y ambas 
                 son para  Ocupacional */
                minimaDistancia=0.143*(Math.sqrt(eripWattActual));
                minimaDistancia1=0.184*(Math.sqrt(erpWattActual));
                /*Las variables minimaDistanciaPublic se usa para PIRE y minimaDistanciaPublic1 para PER y ambas 
                 son para  Publico en General */
                minimaDistanciaPublic=0.319*(Math.sqrt(eripWattActual));
                minimaDistanciaPublic1=0.409*(Math.sqrt(erpWattActual));
                /*Estos document se hacen para limpiar las variables Resultados para que no tenga datos guardados en 
                cache para cuando se actualzia con otro dato de altura*/
                document.getElementById('ResultadosTres' + banda).innerHTML = '';
                document.getElementById('ResultadosCuatro' + banda).innerHTML = '';
                document.getElementById('ResultadosCinco' + banda).innerHTML = '';
                document.getElementById('ResultadosSeis' + banda).innerHTML = '';
                document.getElementById('Imagen1' + banda).innerHTML = '';
                document.getElementById('Imagen2' + banda).innerHTML = '';
                document.getElementById('Imagen3' + banda).innerHTML = '';
                document.getElementById('Imagen4' + banda).innerHTML = '';
                if(alturaRadiacion>minimaDistancia){
                    document.getElementById('ResultadosTres' + banda).innerHTML = `
                        <div class="alert alert-success" role="alert">
                        <strong>Ocupacional</strong><br>
                        Su Pire es: ${eripWattActual.toFixed(2)}' W '<br>
                        Dado que la altura de su antena es ${alturaporusuario.toFixed(2)} (m), para el cálculo de la altura de radiación sería: ${alturaRadiacion.toFixed(2)} (m) y 
                        comparado con el valor de r:  ${minimaDistancia.toFixed(2)} (m), 
                        el cual es mayor. Se concluye que la antena es inherentemente conforme.
                        <br>
                        </div>
                        `;
                        document.getElementById('ResultadosCuatro' + banda).innerHTML = `
                        <div class="alert alert-success" role="alert">
                        <strong>Ocupacional</strong><br>
                        Su Per en W es: ${erpWattActual.toFixed(2)}<br>
                        Dado que la altura de su antena es ${alturaporusuario.toFixed(2)} (m), para el cálculo de la altura de radiación sería: ${alturaRadiacion.toFixed(2)} (m) y 
                        comparado con el valor de r:  ${minimaDistancia1.toFixed(2)} (m), 
                        el cual es mayor. Se concluye que la antena es inherentemente conforme.
                        </div>`
                        ;

                        document.getElementById('ResultadosCinco' + banda).innerHTML = `
                        <div class="alert alert-success" role="alert">
                        <strong>Público en General</strong><br>
                        Su Pire es: ${eripWattActual.toFixed(2)}' W '<br>
                        Dado que la altura de su antena es ${alturaporusuario.toFixed(2)} (m), para el cálculo de la altura de radiación sería: ${alturaRadiacion.toFixed(2)} (m) y 
                        comparado con el valor de r:  ${minimaDistanciaPublic.toFixed(2)} (m), 
                        el cual es mayor. Se concluye que la antena es inherentemente conforme.

                        </div>
                        `;
                        document.getElementById('ResultadosSeis' + banda).innerHTML = `
                        <div class="alert alert-success" role="alert">
                        <strong>Público en General</strong><br>
                        Su Per en W es: ${erpWattActual.toFixed(2)}<br>
                        Dado que la altura de su antena es ${alturaporusuario.toFixed(2)} (m), para el cálculo de la altura de radiación sería: ${alturaRadiacion.toFixed(2)} (m) y 
                        comparado con el valor de r:  ${minimaDistanciaPublic1.toFixed(2)} (m), 
                        el cual es mayor. Se concluye que la antena es inherentemente conforme.
                        </div>
                        `;

                }else {  
                    /*MinimaDhorizontal evalua minimaDistancia para ocupacional, esto se hace para el pire */
                    MinimaDhorizontal= Math.sqrt((minimaDistancia**2)-(alturaRadiacion**2));
                    document.getElementById('ResultadosTres' + banda).innerHTML = `
                     <div class="alert alert-warning" role="alert">
                     <strong>Ocupacional</strong><br>
                    Su Pire en W es: ${eripWattActual.toFixed(2)}<br>
                    Dado que la altura de su antena es ${alturaporusuario.toFixed(2)} (m), para el cálculo de la altura de radiación sería: ${alturaRadiacion.toFixed(2)} (m); 
                    indicando que debera señalizar el perimetro a una distancia de: ${MinimaDhorizontal.toFixed(2)} (m)
                     </div>
                         `;
                    document.getElementById('Imagen1' + banda).innerHTML = `
                    <div class="alert alert-warning" role="alert">
                    <img src="view/public/img/rebasamiento1.jpeg" alt="Descripción de la imagen">
                     </div>
                         `;
                         
                         /*MinimaDhorizontal1 evalua minimaDistancia1 para ocupacional, esto se hace para el Per */
                    MinimaDhorizontal1= Math.sqrt((minimaDistancia1**2)-(alturaRadiacion**2));
                    document.getElementById('ResultadosCuatro' + banda).innerHTML = `
                     <div class="alert alert-warning" role="alert">
                     <strong>Ocupacional</strong><br>
                    Su Per en W es: ${erpWattActual.toFixed(2)}<br>
                    Dado que la altura de su antena es ${alturaporusuario.toFixed(2)} (m), para el cálculo de la altura de radiación sería: ${alturaRadiacion.toFixed(2)} (m);
                    indicando que debera señalizar el perimetro a una distancia de: ${MinimaDhorizontal1.toFixed(2)} (m).
                     </div>
                         `;
                         document.getElementById('Imagen2' + banda).innerHTML = `
                    <div class="alert alert-warning" role="alert">
                    <img src="view/public/img/rebasamiento1.jpeg" alt="Descripción de la imagen">
                     </div>
                         `;
 
                    
                    /*MinimaDhorizontal2 evalua minimaDistanciaPublic para Publico en general, esto se hace para el Pire */
                    MinimaDhorizontal2= Math.sqrt((minimaDistanciaPublic**2)-(alturaRadiacion**2));
                    document.getElementById('ResultadosCinco' + banda).innerHTML = `
                     <div class="alert alert-warning" role="alert">
                     <strong>Público en General</strong><br>
                    Su Pire en W es: ${eripWattActual.toFixed(2)}<br>
                     Dado que la altura de su antena es ${alturaporusuario.toFixed(2)} (m), para el cálculo de la altura de radiación sería: ${alturaRadiacion.toFixed(2)} (m);
                     indicando que debera señalizar el perimetro a una distancia de: ${MinimaDhorizontal2.toFixed(2)} (m).
                     </div>
                         `;
                         document.getElementById('Imagen3' + banda).innerHTML = `
                    <div class="alert alert-warning" role="alert">
                    <img src="view/public/img/Ocupacional1.jpeg" alt="Descripción de la imagen">
                     </div>
                         `;

                     /*MinimaDhorizontal3 evalua minimaDistanciaPublic1 para Publico en general, esto se hace para el PER */
                    MinimaDhorizontal3= Math.sqrt((minimaDistanciaPublic1**2)-(alturaRadiacion**2));
                    document.getElementById('ResultadosSeis' + banda).innerHTML = `
                     <div class="alert alert-warning" role="alert">
                     <strong>Público en General</strong><br>
                    Su Per en W es: ${erpWattActual.toFixed(2)}<br>
                    Dado que la altura de su antena es ${alturaporusuario.toFixed(2)} (m), para el cálculo de la altura de radiación sería: ${alturaRadiacion.toFixed(2)} (m);
                    indicando que debera señalizar el perimetro a una distancia de: ${MinimaDhorizontal3.toFixed(2)} (m).
                     </div>
                         `;
                         document.getElementById('Imagen4' + banda).innerHTML = `
                    <div class="alert alert-warning" role="alert">
                    <img src="view/public/img/Ocupacional1.jpeg" alt="Descripción de la imagen">
                     </div>
                         `;
                  
                }    
           } else if (400 < frecuencia && frecuencia <= 2000) {
                alturaporusuario=alturaRadiacion;
                alturaRadiacion=alturaRadiacion-2;
                minimaDistancia=2.92*(Math.sqrt(eripWattActual/frecuencia));
                minimaDistancia1=3.74*(Math.sqrt(erpWattActual/frecuencia));
                minimaDistanciaPublic=6.38*(Math.sqrt(eripWattActual/frecuencia));
                minimaDistanciaPublic1=8.16*(Math.sqrt(erpWattActual/frecuencia));
                document.getElementById('ResultadosTres' + banda).innerHTML = '';
                document.getElementById('ResultadosCuatro' + banda).innerHTML = '';
                document.getElementById('ResultadosCinco' + banda).innerHTML = '';
                document.getElementById('ResultadosSeis' + banda).innerHTML = '';
                document.getElementById('Imagen1' + banda).innerHTML = '';
                document.getElementById('Imagen2' + banda).innerHTML = '';
                document.getElementById('Imagen3' + banda).innerHTML = '';
                document.getElementById('Imagen4' + banda).innerHTML = '';
                if(alturaRadiacion>minimaDistancia ){
                        document.getElementById('ResultadosTres' + banda).innerHTML = `
                        <div class="alert alert-success" role="alert">
                        <strong>Ocupacional</strong><br>
                        Su Pire es: ${eripWattActual.toFixed(2)}' W '<br>
                        Dado que la altura de su antena es ${alturaporusuario.toFixed(2)} (m), para el cálculo de la altura de radiación sería: ${alturaRadiacion.toFixed(2)} (m) y 
                        comparado con el valor de r:  ${minimaDistancia.toFixed(2)} (m), 
                        el cual es mayor. Se concluye que la antena es inherentemente conforme.
                        <br>
                        </div>
                        `;
                        document.getElementById('ResultadosCuatro' + banda).innerHTML = `
                        <div class="alert alert-success" role="alert">
                        <strong>Ocupacional</strong><br>
                        Su Per en W es: ${erpWattActual.toFixed(2)}<br>
                        Dado que la altura de su antena es ${alturaporusuario.toFixed(2)} (m), para el cálculo de la altura de radiación sería: ${alturaRadiacion.toFixed(2)} (m) y 
                        comparado con el valor de r:  ${minimaDistancia1.toFixed(2)} (m), 
                        el cual es mayor. Se concluye que la antena es inherentemente conforme.
                        </div>`
                        ;
                        document.getElementById('ResultadosCinco' + banda).innerHTML = `
                        <div class="alert alert-success" role="alert">
                        <strong>Público en General</strong><br>
                        Su Pire es: ${eripWattActual.toFixed(2)}' W '<br>
                        Dado que la altura de su antena es ${alturaporusuario.toFixed(2)} (m), para el cálculo de la altura de radiación sería: ${alturaRadiacion.toFixed(2)} (m) y 
                        comparado con el valor de r:  ${minimaDistanciaPublic.toFixed(2)} (m), 
                        el cual es mayor. Se concluye que la antena es inherentemente conforme.
                        </div>
                        `;

                        document.getElementById('ResultadosSeis' + banda).innerHTML = `
                        <div class="alert alert-success" role="alert">
                        <strong>Público en General</strong><br>
                        Su Per en W es: ${erpWattActual.toFixed(2)}<br>
                        Dado que la altura de su antena es ${alturaporusuario.toFixed(2)} (m), para el cálculo de la altura de radiación sería: ${alturaRadiacion.toFixed(2)} (m) y 
                        comparado con el valor de r:  ${minimaDistanciaPublic1.toFixed(2)} (m), 
                        el cual es mayor. Se concluye que la antena es inherentemente conforme.
                        </div>
                        `;

                }else {  
                    MinimaDhorizontal= Math.sqrt((minimaDistancia**2)-(alturaRadiacion**2));
                    document.getElementById('ResultadosTres' + banda).innerHTML = `
                     <div class="alert alert-warning" role="alert">
                     <strong>Ocupacional</strong><br>
                    Su Pire en W es: ${eripWattActual.toFixed(2)}<br>
                    Dado que la altura de su antena es ${alturaporusuario.toFixed(2)} (m), para el cálculo de la altura de radiación sería: ${alturaRadiacion.toFixed(2)} (m); 
                    indicando que debera señalizar el perimetro a una distancia de: ${MinimaDhorizontal.toFixed(2)} (m)
                     </div>
                         `;
                    document.getElementById('Imagen1' + banda).innerHTML = `
                    <div class="alert alert-warning" role="alert">
                    <img src="view/public/img/rebasamiento1.jpeg" alt="Descripción de la imagen">
                     </div>
                         `;



                    MinimaDhorizontal1= Math.sqrt((minimaDistancia1**2)-(alturaRadiacion**2));
                     document.getElementById('ResultadosCuatro' + banda).innerHTML = `
                     <div class="alert alert-warning" role="alert">
                     <strong>Ocupacional</strong><br>
                    Su Per en W es: ${erpWattActual.toFixed(2)}<br>
                    Dado que la altura de su antena es ${alturaporusuario.toFixed(2)} (m), para el cálculo de la altura de radiación sería: ${alturaRadiacion.toFixed(2)} (m);
                    indicando que debera señalizar el perimetro a una distancia de: ${MinimaDhorizontal1.toFixed(2)} (m).
                     </div>
                         `;
                         document.getElementById('Imagen2' + banda).innerHTML = `
                    <div class="alert alert-warning" role="alert">
                    <img src="view/public/img/rebasamiento1.jpeg" alt="Descripción de la imagen">
                     </div>
                         `;

                    MinimaDhorizontal2= Math.sqrt((minimaDistanciaPublic**2)-(alturaRadiacion**2));
                    document.getElementById('ResultadosCinco' + banda).innerHTML = `
                     <div class="alert alert-warning" role="alert">
                     <strong>Público en General</strong><br>
                    Su Pire en W es: ${eripWattActual.toFixed(2)}<br>
                     Dado que la altura de su antena es ${alturaporusuario.toFixed(2)} (m), para el cálculo de la altura de radiación sería: ${alturaRadiacion.toFixed(2)} (m);
                     indicando que debera señalizar el perimetro a una distancia de: ${MinimaDhorizontal2.toFixed(2)} (m).
                     </div>
                         `;
                         document.getElementById('Imagen3' + banda).innerHTML = `
                    <div class="alert alert-warning" role="alert">
                    <img src="view/public/img/Ocupacional1.jpeg" alt="Descripción de la imagen">
                     </div>
                         `;



                    MinimaDhorizontal3= Math.sqrt((minimaDistanciaPublic1**2)-(alturaRadiacion**2));
                    document.getElementById('ResultadosSeis' + banda).innerHTML = `
                     <div class="alert alert-warning" role="alert">
                     <strong>Público en General</strong><br>
                    Su Per en W es: ${erpWattActual.toFixed(2)}<br>
                    Dado que la altura de su antena es ${alturaporusuario.toFixed(2)} (m), para el cálculo de la altura de radiación sería: ${alturaRadiacion.toFixed(2)} (m);
                    indicando que debera señalizar el perimetro a una distancia de: ${MinimaDhorizontal3.toFixed(2)} (m).
                     </div>
                         `;
                         document.getElementById('Imagen4' + banda).innerHTML = `
                    <div class="alert alert-warning" role="alert">
                    <img src="view/public/img/Ocupacional1.jpeg" alt="Descripción de la imagen">
                     </div>
                         `;
                  
                } 

           } else if (2000 < frecuencia && frecuencia <= 300000) {
                alturaporusuario=alturaRadiacion;
               alturaRadiacion=alturaRadiacion-2;
                minimaDistancia=0.0638*(Math.sqrt(eripWattActual));
                minimaDistancia1=0.0819*(Math.sqrt(erpWattActual));
                minimaDistanciaPublic=0.143*(Math.sqrt(eripWattActual));
                minimaDistanciaPublic1=0.184*(Math.sqrt(erpWattActual));
                document.getElementById('ResultadosTres' + banda).innerHTML = '';
                document.getElementById('ResultadosCuatro' + banda).innerHTML = '';
                document.getElementById('ResultadosCinco' + banda).innerHTML = '';
                document.getElementById('ResultadosSeis' + banda).innerHTML = '';
                document.getElementById('Imagen1' + banda).innerHTML = '';
                document.getElementById('Imagen2' + banda).innerHTML = '';
                document.getElementById('Imagen3' + banda).innerHTML = '';
                document.getElementById('Imagen4' + banda).innerHTML = '';
                
                if(alturaRadiacion>minimaDistancia){
                    document.getElementById('ResultadosTres' + banda).innerHTML = `
                        <div class="alert alert-success" role="alert">
                        <strong>Ocupacional</strong><br>
                        Su Pire es: ${eripWattActual.toFixed(2)}' W '<br>
                        Dado que la altura de su antena es ${alturaporusuario.toFixed(2)} (m), para el cálculo de la altura de radiación sería: ${alturaRadiacion.toFixed(2)} (m) y 
                        comparado con el valor de r:  ${minimaDistancia.toFixed(2)} (m), 
                        el cual es mayor. Se concluye que la antena es inherentemente conforme.
                        <br>
                        </div>
                        `;
                        document.getElementById('ResultadosCuatro' + banda).innerHTML = `
                        <div class="alert alert-success" role="alert">
                        <strong>Ocupacional</strong><br>
                        Su Per en W es: ${erpWattActual.toFixed(2)}<br>
                        Dado que la altura de su antena es ${alturaporusuario.toFixed(2)} (m), para el cálculo de la altura de radiación sería: ${alturaRadiacion.toFixed(2)} (m) y 
                        comparado con el valor de r:  ${minimaDistancia1.toFixed(2)} (m), 
                        el cual es mayor. Se concluye que la antena es inherentemente conforme.
                        </div>`
                        ;
                        document.getElementById('ResultadosCinco' + banda).innerHTML = `
                        <div class="alert alert-success" role="alert">
                        <strong>Público en General</strong><br>
                        Su Pire es: ${eripWattActual.toFixed(2)}' W '<br>
                        Dado que la altura de su antena es ${alturaporusuario.toFixed(2)} (m), para el cálculo de la altura de radiación sería: ${alturaRadiacion.toFixed(2)} (m) y 
                        comparado con el valor de r:  ${minimaDistanciaPublic.toFixed(2)} (m), 
                        el cual es mayor. Se concluye que la antena es inherentemente conforme.
                        </div>
                        `;

                        document.getElementById('ResultadosSeis' + banda).innerHTML = `
                        <div class="alert alert-success" role="alert">
                        <strong>Público en General</strong><br>
                        Su Per en W es: ${erpWattActual.toFixed(2)}<br>
                        Dado que la altura de su antena es ${alturaporusuario.toFixed(2)} (m), para el cálculo de la altura de radiación sería: ${alturaRadiacion.toFixed(2)} (m) y 
                        comparado con el valor de r:  ${minimaDistanciaPublic1.toFixed(2)} (m), 
                        el cual es mayor. Se concluye que la antena es inherentemente conforme.
                        </div>
                        `;

                }else {  
                    MinimaDhorizontal= Math.sqrt((minimaDistancia**2)-(alturaRadiacion**2));
                    document.getElementById('ResultadosTres' + banda).innerHTML = `
                     <div class="alert alert-warning" role="alert">
                     <strong>Ocupacional</strong><br>
                    Su Pire en W es: ${eripWattActual.toFixed(2)}<br>
                    Dado que la altura de su antena es ${alturaporusuario.toFixed(2)} (m), para el cálculo de la altura de radiación sería: ${alturaRadiacion.toFixed(2)} (m); 
                    indicando que debera señalizar el perimetro a una distancia de: ${MinimaDhorizontal.toFixed(2)} (m)
                     </div>
                         `;
                    document.getElementById('Imagen1' + banda).innerHTML = `
                    <div class="alert alert-warning" role="alert">
                    <img src="view/public/img/rebasamiento1.jpeg" alt="Descripción de la imagen">
                     </div>
                         `;


                         
                    MinimaDhorizontal1= Math.sqrt((minimaDistancia1**2)-(alturaRadiacion**2));
                    document.getElementById('ResultadosCuatro' + banda).innerHTML = `
                     <div class="alert alert-warning" role="alert">
                     <strong>Ocupacional</strong><br>
                    Su Per en W es: ${erpWattActual.toFixed(2)}<br>
                    Dado que la altura de su antena es ${alturaporusuario.toFixed(2)} (m), para el cálculo de la altura de radiación sería: ${alturaRadiacion.toFixed(2)} (m);
                    indicando que debera señalizar el perimetro a una distancia de: ${MinimaDhorizontal1.toFixed(2)} (m).
                     </div>
                         `;
                     document.getElementById('Imagen2' + banda).innerHTML = `
                    <div class="alert alert-warning" role="alert">
                    <img src="view/public/img/rebasamiento1.jpeg" alt="Descripción de la imagen">
                     </div>
                         `;

                    MinimaDhorizontal2= Math.sqrt((minimaDistanciaPublic**2)-(alturaRadiacion**2));
                    document.getElementById('ResultadosCinco' + banda).innerHTML = `
                     <div class="alert alert-warning" role="alert">
                     <strong>Público en General</strong><br>
                    Su Pire en W es: ${eripWattActual.toFixed(2)}<br>
                     Dado que la altura de su antena es ${alturaporusuario.toFixed(2)} (m), para el cálculo de la altura de radiación sería: ${alturaRadiacion.toFixed(2)} (m);
                     indicando que debera señalizar el perimetro a una distancia de: ${MinimaDhorizontal2.toFixed(2)} (m).
                     </div>
                         `;
                         document.getElementById('Imagen3' + banda).innerHTML = `
                    <div class="alert alert-warning" role="alert">
                    <img src="view/public/img/Ocupacional1.jpeg" alt="Descripción de la imagen">
                     </div>
                         `;





                    MinimaDhorizontal3= Math.sqrt((minimaDistanciaPublic1**2)-(alturaRadiacion**2));
                    document.getElementById('ResultadosSeis' + banda).innerHTML = `
                     <div class="alert alert-warning" role="alert">
                     <strong>Público en General</strong><br>
                    Su Per en W es: ${erpWattActual.toFixed(2)}<br>
                    Dado que la altura de su antena es ${alturaporusuario.toFixed(2)} (m), para el cálculo de la altura de radiación sería: ${alturaRadiacion.toFixed(2)} (m);
                    indicando que debera señalizar el perimetro a una distancia de: ${MinimaDhorizontal3.toFixed(2)} (m).
                     </div>
                         `;
                         document.getElementById('Imagen4' + banda).innerHTML = `
                    <div class="alert alert-warning" role="alert">
                    <img src="view/public/img/Ocupacional1.jpeg" alt="Descripción de la imagen">
                     </div>
                         `;
                  
                } 
           }
          else {
           return "Escenario no válido";
            }
      } 


      async function generarPDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    const addSection = (doc, text, y) => {
        doc.setFont('helvetica', 'normal');
        const splitText = doc.splitTextToSize(text, 180); // Asegúrate de no superar el ancho de la página
        doc.text(splitText, 10, y);
        return y + splitText.length * 10; // Ajusta el espaciado según sea necesario
    };

    let y = 10; // Iniciar en la parte superior del documento

    // Iterar a través de cada banda para recoger y añadir los resultados
    const numeroDeBandas = parseInt(document.getElementById('numeroDeBandas').value);
    for (let i = 1; i <= numeroDeBandas; i++) {
        const ResultadosComentario=document.getElementById(`ResultadosComentario${i}`).innerText;
        const resultadosEIRP = document.getElementById(`resultadosEIRP${i}`).innerText;
        const resultadosERP = document.getElementById(`resultadosERP${i}`).innerText;
        const resultadosTres = document.getElementById(`ResultadosTres${i}`).innerText;
        const resultadosCuatro = document.getElementById(`ResultadosCuatro${i}`).innerText;
        const resultadosCinco = document.getElementById(`ResultadosCinco${i}`).innerText;
        const resultadosSeis = document.getElementById(`ResultadosSeis${i}`).innerText;

        // Añadir los textos al PDF
        y = addSection(doc, `Antena ${i}:`, y);
        y =addSection(doc,ResultadosComentario,y);
        y = addSection(doc, resultadosEIRP, y);
        y = addSection(doc, resultadosERP, y);
        y = addSection(doc, resultadosTres, y);
        y = addSection(doc, resultadosCuatro, y);
        y = addSection(doc, resultadosCinco, y);
        y = addSection(doc, resultadosSeis, y);
        
     
       

        y += 10; // Espacio antes de la próxima banda
    }

    // Guardar el documento PDF
    doc.save('resultados.pdf');
}
    









    </script>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form>
                <div class="mb-3">
                    <label for="numeroDeBandas" class="form-label">Número de Antenas:</label>
                    <input type="number" class="form-control" id="numeroDeBandas" name="numeroDeBandas" min="1" value="1">
                </div>
                <div class="text-center">
                    <button type="button" class="btn btn-primary" onclick="generarBandas()">Generar Antenas</button>
                </div>
            </form>
            <div id="contenedorDeBandas" class="mt-3">
                <!-- Aquí se insertarán las bandas como tarjetas -->
            </div>
            
        </div>
    </div>
</div>

    



<?php require 'view/footer.php'; ?>
