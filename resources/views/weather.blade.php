@extends('layout')
@section('contenido')

<div class="container py-5">
    <div class="text-center mb-5 fade-up">
        <p class="coffee-text text-uppercase">
            SlowBar Weather
        </p>

        <h1 class="display-4 fw-bold">
            Clima para tu café ☕
        </h1>

        <p class="text-light fs-5">
            Consulta el clima antes de visitar SlowBar.
        </p>

    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="glass-card p-4">
                <input id="city" class="form-control mb-3" placeholder="Escribe una ciudad">
                <button onclick="buscarClima()" class="btn btn-coffee w-100">
                    <i class="fa fa-cloud-sun"></i>
                    Buscar clima
                </button>

                <div id="loading" class="text-center mt-4" style="display:none;">
                    <div class="spinner-border coffee-text"></div>
                    <p class="mt-3 text-light">
                        Consultando clima...
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div id="resultado" class="mt-5"></div>
</div>

<script>
document.getElementById("city").addEventListener("keypress",function(e){
    if(e.key==="Enter"){
        buscarClima();
    }
});

async function buscarClima(){
    const ciudad=document.getElementById("city").value.trim();
    if(ciudad===""){
        alert("Escribe una ciudad");
        return;
    }

    const apiKey = "{{ $apiKey }}";
    const url=`https://api.openweathermap.org/data/2.5/weather?q=${ciudad}&appid=${apiKey}&units=metric&lang=es`;
    
    try{
        document.getElementById("loading").style.display = "block";
        const response=await fetch(url);
        const data=await response.json();

        if(data.cod!=200){
            document.getElementById("resultado").innerHTML=`
            <div class="glass-card p-4 text-center">
                <h4 class="text-danger">
                    <i class="fa fa-circle-exclamation"></i>
                    Ciudad no encontrada
                </h4>

                <p class="text-light">
                    Intenta escribir nuevamente.
                </p>
            </div>
            `;
            document.getElementById("loading").style.display = "none";
            return;  
        }
        document.getElementById("loading").style.display = "none";
        mostrarClima(data);
    }

    catch(error){
        console.log(error);
    }
    document.getElementById("loading").style.display = "none";
    
}

function mostrarClima(data){
    const iconoClima=data.weather[0].icon;
    let bebida="☕";
    let recomendacion="Ideal para disfrutar un café caliente.";
    if(data.main.temp>=28){
        bebida="🧋";
        recomendacion="Hace calor, un frappé sería perfecto.";
    }

    else if(data.main.temp>=20){
        bebida="🥤";
        recomendacion="Un café frío sería una buena elección.";
    }
    document.getElementById("resultado").innerHTML=`
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="glass-card p-5 text-center">
                <img src="https://openweathermap.org/img/wn/${iconoClima}@4x.png" width="120">
                <h2 class="fw-bold mt-3">
                    ${data.name}, ${data.sys.country}
                </h2>

                <h1 class="coffee-text display-4">
                    ${Math.round(data.main.temp)}°C
                </h1>

                <h5 class="mb-4 text-capitalize">
                    ${data.weather[0].description}
                </h5>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <h6>Sensación</h6>
                        <strong>${Math.round(data.main.feels_like)}°C</strong>
                    </div>

                    <div class="col-md-4">
                        <h6>Humedad</h6>
                        <strong>${data.main.humidity}%</strong>
                    </div>

                    <div class="col-md-4">
                        <h6>Viento</h6>
                        <strong>${data.wind.speed} m/s</strong>
                    </div>
                </div>
                <hr>
                <h2 class="mt-4">
                    ${bebida}
                </h2>

                <h5 class="coffee-text">
                    ${recomendacion}
                </h5>
            </div>
        </div>
    </div>
    `;
}
</script>

@endsection