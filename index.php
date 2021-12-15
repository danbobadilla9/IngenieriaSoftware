<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h2 class="main--titulo">Simplifica tu día a día y haz crecer tu vida</h1>
        <p class="main--info">¿Inasistencia de citas? ¿Quiénes son mis clientes que vienen más? ¿Seguimiento de actividades?</p>
        <div class="iconos--index">
            <div class="servicios__info ">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list-check" width="80" height="80" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00bfd8" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M3.5 5.5l1.5 1.5l2.5 -2.5" />
                    <path d="M3.5 11.5l1.5 1.5l2.5 -2.5" />
                    <path d="M3.5 17.5l1.5 1.5l2.5 -2.5" />
                    <line x1="11" y1="6" x2="20" y2="6" />
                    <line x1="11" y1="12" x2="20" y2="12" />
                    <line x1="11" y1="18" x2="20" y2="18" />
                </svg>
                <h3>Mantén el orden de tu agenda</h3>
                <p>Ordena tu día con nuestro control de citas y tareas online</p>
            </div><!--servicios__info-->

            <div class="servicios__info">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-time" width="80" height="80" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00bfd8" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4" />
                    <circle cx="18" cy="18" r="4" />
                    <path d="M15 3v4" />
                    <path d="M7 3v4" />
                    <path d="M3 11h16" />
                    <path d="M18 16.496v1.504l1 1" />
                </svg>
                <h3>Evita las inasistencias</h3>
                <p>Envía recordatorios automáticos a través de WhatsApp y correo electrónico</p>
            </div><!--servicios__info-->

            <div class="servicios__info">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock" width="80" height="80" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00bfd8" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <circle cx="12" cy="12" r="9" />
                    <polyline points="12 7 12 12 15 15" />
                </svg>
                <h3>Consigue más tiempo</h3>
                <p>Optimiza tu dia con nuestro sistema de administración de tareas</p>
            </div><!--servicios__info-->

            <div class="servicios__info">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-template" width="80" height="80" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00bfd8" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <rect x="4" y="4" width="16" height="4" rx="1" />
                    <rect x="4" y="12" width="6" height="8" rx="1" />
                    <line x1="14" y1="12" x2="20" y2="12" />
                    <line x1="14" y1="16" x2="20" y2="16" />
                    <line x1="14" y1="20" x2="20" y2="20" />
                </svg>
                <h3>Crea un estilo unico</h3>
                <p>Utiliza templates para agilizar tu agenda</p>
            </div><!--servicios__info-->
        </div>

    </main>

    <section class="beneficios contenedor">
        
        <div>
            <h3 class="main__titulo">¿Por qué utilizar un sistema para agendar horas?</h3>
            <p class="main__info">Un software con agenda online funciona como un CRM + ERP para pymes.
                Es versátil, puede funcionar cómo agenda en tu peluquería o como
                herramienta para guardar la ficha clínica de los pacientes de un
                centro médico. El sistema te da la opción de crear tus propias
                aplicaciones para celular (aplicaciones móviles) como google
                app y tener el control de gestión de tu negocio.
                
                Además de poseer control de inventarios y ayudar a tu marketing.
                Todo en el mismo software administrativo para negocios.
                Agenda una demo y descubre cómo podemos ayudarte.</p>
        </div>
        <img src="build/img/agenda.jpg" alt="Imagen agenda">
    </section>

<?php         
        incluirTemplate('footer');
?>