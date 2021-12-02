<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div>
        <div style="text-align: center">
            <h2>Dashboard</h2>
            <p class="text-subtitle text-muted">Bienvenido, elija lo que desea realizar </p>
        </div>

     
         
        <section >
        <div style="width: 350px; margin: 0 auto">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="background-color: rgb(248, 251, 235)">
            <div class="carousel-inner">
              <div class="carousel-item active" >
            <a href="{{ route('createsale') }}">
                <div class="card card-statistic" >
                    <div>
                        <div>
                            <div style="text-align: center">
                                <h3 class='card-title'>Facturacion</h3>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="canvas1" style="height:100px !important"></canvas>
                            </div>
                        </div>
                    </div>
                </div>    
            </a>          
            </div>

              <div class="carousel-item">
                <a href="{{ route('createquote')}}">
                    <div class="card card-statistic" >
                        <div>
                            <div>
                                <div style="text-align: center">
                                    <h3 class='card-title'>Cotizaciones</h3>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="canvas1" style="height:100px !important"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>    
                </a>          
              </div>
              <div class="carousel-item">
                <a href="#">
                    <div class="card card-statistic" >
                        <div>
                            <div>
                                <div style="text-align: center">
                                    <h3 class='card-title'>Recibos</h3>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="canvas1" style="height:100px !important"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>    
                </a>          
              </div>
              <div class="carousel-item">
                <a href="{{ route('createcliente') }}">
                    <div class="card card-statistic" >
                        <div>
                            <div>
                                <div style="text-align: center">
                                    <h3 class='card-title'>Crear cliente</h3>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="canvas1" style="height:100px !important"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>    
                </a>          
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Proximo</span>
            </a>
          </div>
        </div>
    </section>


    </div>
</x-app-layout>