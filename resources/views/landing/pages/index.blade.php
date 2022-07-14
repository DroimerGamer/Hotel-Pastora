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
                <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="/assets/img/indexintro.jpg" alt="..." /></div>
                <div class="col-lg-5">
                    <h1  class="font-weight-light ">Bienvenido a Hotel Pastora.<br> <i>¡Siéntase en casa!</i></h1>
                    <p style="text-align: justify;"> El confort dejo se ser una opcion, es uno de nuestos compromisos con usted, disfrute de su estancia con suites de lujo. Buscamos ofrecer a nuestros huespedes la mejor relacion calidad, precio y servicio, mediante buenas instalaciones y atención.</p> 
                    <a class="btn btn-sm text-white" style="background-color:#993366;"href="{{ route('sitio.reserve') }}">¡Reserve ahora!</a>
                </div>
            </div>
            <!-- Call to Action-->
            <div class="card text-white my-5 py-4 text-center" style="background-color:#993366">
            <h2 class="card-title">Redes sociales
            </h2>
                <div class="card-body"><p class="text-white m-0">Vea nuestro contenido del hotel en nuestras redes sociales.</p></div>
                <div class="card-footer">
                     <a class="btn btn-light btn-sm" href="https://api.whatsapp.com/send?phone=522711055184&app=facebook&entry_point=page_cta&fbclid=IwAR1Woc5z4nSq4E-8luymoWal3-ZpzGRBd_XGYTV_Okt2wNSrBrt2-O9SM5c" target="_blank"><img src="/assets/img/wh.png" width="25" height="25"></img> &nbsp; WhatsApp</a>
                     <a class="btn btn-light btn-sm" href="https://www.facebook.com/hotelpastora/" target="_blank"><img src="/assets/img/fb.png" width="25" height="25"></img> &nbsp; Facebook</a>
                     <a class="btn btn-light btn-sm" href="https://www.instagram.com/hotel_pastora/" target="_blank"><img src="/assets/img/in.png" width="25" height="25"></img> &nbsp; Instagram</a>
                 </div>
                
            </div>
            <!-- Content Row-->
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title text-center">Suite tipo 1</h2>
                            <img class="img-fluid rounded" src="/assets/img/Tipo1index.jpg" width="500" height="100"></img>
                            <p class="card-text">Confortable y comoda suite: <br> -Cama King size(extragrande)<br> -Aire acondicionado mini Split <br> -Wifi inalambrico gratuito <br> -Y más...</p>
                        </div>
                        <div class="card-footer"><a class="btn btn-sm text-white" style="background-color:#993366;" href="{{ route('sitio.habitaciones') }}">Ver más...</a></div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title text-center">Suite tipo 2</h2>
                            <img class="img-fluid rounded mb-4 mb-lg-0" src="/assets/img/Tipo2index.jpeg" width="500" height="100"></img>
                            <p class="card-text">Confortable y comoda suite: <br> -Cama matrimonial y cama individual<br> -Aire acondicionado mini Split <br> -Tocador <br> -Y más...</p>
                        </div>
                        <div class="card-footer"><a class="btn btn-sm text-white" style="background-color:#993366;" href="{{ route('sitio.habitaciones') }}">Ver más...</a></div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title text-center">Suite tipo 3</h2>
                            <img class="img-fluid rounded mb-4 mb-lg-0" src="/assets/img/Tipo3/1.jpg" width="500" height="100"></img>
                            <p class="card-text">Confortable y comoda suite: <br> -Dos camas matrimoniales<br> -Aire acondicionado mini Split <br> -Area de trabajo <br> -Y más...</p>
                        </div>
                        <div class="card-footer"><a class="btn btn-sm text-white" style="background-color:#993366;" href="{{ route('sitio.habitaciones') }}">Ver más...</a></div>
                    </div>
                </div>
            </div>
        </div>

@endsection