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
                <div class="col-lg-5">
                    <h1 class="font-weight-light">Contáctanos</h1>
                    <p style="text-align: justify;">Utilice la herramienta del mapa para poder visualizar la ubicación del <b>Hotel Pastora</b>. Estamos a su disposición de ayudarle en todas sus dudas y proceso de reserva.   </p>
                </div>
                
                <div class="col-lg-7"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12605.784202004452!2d-96.93559932324386!3d18.892422704120207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c4e5427a5747ff%3A0xdd9e049b23f19641!2sHotel%20Pastora!5e0!3m2!1ses!2smx!4v1655741646550!5m2!1ses!2smx" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
            </div>
            <!-- Call to Action-->
            <div class="card text-white my-5 py-4 text-center" style="background-color:#993366">
            <h2 class="card-title">Ver ruta desde mi ubicación</h2>
            <div class="card-footer"><a class="btn btn-light btn-sm" href="https://www.google.com/maps/dir/?api=1&origin=&destination=Hotel+Pastora&travelmode=driving" target="_blank">Ir a ver ruta...</a></div>
            </div>
            <div class="row gx-4 gx-lg-9">
                <div class="col-md-14 mb-5">
                    <div class="card h-11">
                        <div class="card-body">
                            <h2 class="card-title text-center card-footer ">Información</h2>
                            <p class="card-text"><h6>Dirección:</h6>Hotel Pastora, Calle 5 entre Av. 5 y 7 #517, Centro, CP. 94500 Córdoba, Ver. <br> <h6>WhatsApp:</h6>+52 (271) 105-5184<br><h6>Teléfono:</h6><a href="tel:2717128882">+52 (271) 712-8882</a><br><h6>E-Mail:</h6><a href="mailto:marketing_hotelpastora@hotmail.com">marketing_hotelpastora@hotmail.com </a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



@endsection