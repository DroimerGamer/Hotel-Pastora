<!--
 * Created by VSCODE.
 * User: Jesus R.
 * Date: 22/07/2022
-->
@extends('landing.layout.principal')
@section('content')
<div class="container px-4 px-lg-5">
            <!-- Heading Row-->
            <div class="row gx-4 gx-lg-5 align-items-center my-5">
                <div class=" align-items-center my-5">
                    <h1 class="font-weight-light">Nosotros</h1>
                    <p style="text-align: justify;">Nuestro objetivo es que usted se sienta en casa, disfrutando la estancia en su viaje de negocios o de vacaciones.</p>
                </div>
            </div>
            <!-- Content Row-->
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title card-footer text-white" style="background-color:#993366;">Valores</h2>
                            <p class="card-text"></p>
                                <b>SERVICIO:</b> <p style="text-align: justify;">Dedicación esmerada a satisfacer y exceder constantemente las expectativas de nuestros clientes.</p> <br>
                                <b>RESPETO:</b>  <p style="text-align: justify;">Constituye la base de nuestras relaciones humanas e implica la tolerancia a la diversidad, así como la apertura para la comprensión mutua.</p><br>
                                <b>CONSTANCIA:</b>  <p style="text-align: justify;">Día tras día demostramos pasión por nuestro trabajo y buscamos la excelencia a través de cada una de nuestras acciones.</p><br>
                                <b>CRECIMIENTO:</b> <p style="text-align: justify;"> Perseguimos el crecimiento sostenido tanto económico como humano, garantizando la prosperidad de nuestra empresa.</p><br>
                                <b>INTEGRIDAD:</b> <p style="text-align: justify;">Fortaleza del carácter para vencer obstaculos demostrando rectitud, honestidad y alto sentido de compromiso.</p>
                        </div>
                    </div>
                </div> <div class="col-md-4 mb-5">
                    <div class="card h-45">
                        <div class="card-body">
                            <h2 class="card-title card-footer text-white" style="background-color:#993366;">Visión</h2>
                            <p class="card-text"  style="text-align: justify;" >Ser un buen hotel de Córdoba reconocido en toda la región por la atención personalizada y profesional hacia nuestro personal y clientes, con estandares de calidad, etica e integridad aunados a una infraestructura moderna en constante innovación para satisfacer a los clientes mas exigentes y lograr su fidelidad.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-45">
                        <div class="card-body">
                            <h2 class="card-title card-footer text-white" style="background-color:#993366;">Misión</h2>
                            <p class="card-text"  style="text-align: justify;">Brindarle una estancia segura, confortable, tranquila y placentera, en modernas instalaciones con la hospitalidad, atención y servicio de nuestro personal.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection