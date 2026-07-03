@extends('layout')
@section('contenido')

<div class="container py-5">
    <div class="text-center mb-5 fade-up">
        <p class="coffee-text text-uppercase">
            SlowBar
        </p>

        <h1 class="display-4 fw-bold">
            Aviso de Privacidad
        </h1>

        <p class="text-light">
            Protección de datos personales.
        </p>

    </div>

    <div class="glass-card p-5">
        <h3 class="coffee-text mb-4">
            ¿Qué información recopilamos?
        </h3>

        <p>
            SlowBar recopila únicamente la información necesaria para brindar
            un mejor servicio a sus clientes, como nombre, correo electrónico,
            teléfono y datos relacionados con los pedidos realizados.
        </p>

        <hr>
        <h3 class="coffee-text mb-4">
            Uso de la información
        </h3>

        <p>
            La información proporcionada será utilizada exclusivamente para:
        </p>

        <ul>
            <li>Gestionar pedidos.</li>
            <li>Administrar cuentas de usuarios.</li>
            <li>Mejorar la atención al cliente.</li>
            <li>Enviar promociones cuando el usuario lo autorice.</li>
        </ul>

        <hr>
        <h3 class="coffee-text mb-4">
            Protección de datos
        </h3>

        <p>
            SlowBar implementa medidas de seguridad para proteger la información
            de los usuarios contra accesos no autorizados, pérdida o alteración
            de los datos.
        </p>

        <hr>

        <h3 class="coffee-text mb-4">
            Contacto
        </h3>

        <p>
            Para cualquier duda relacionada con este aviso de privacidad,
            puedes comunicarte con el administrador de SlowBar.
        </p>

         <div class="alert alert-warning rounded-4 mt-4">
            Última actualización:
            Julio 2026
        </div>
    </div>
</div>

@endsection