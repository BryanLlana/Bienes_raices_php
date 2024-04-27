<?php
  require './includes/helpers/index.php';
  renderTemplate('header')
?>
  <main class="container section">
    <h2>Conoce sobre nosotros</h2>

    <div class="content-us">
      <div class="imagen">
        <picture>
          <source srcset="./build/img/nosotros.webp" type="image/webp">
          <source srcset="./build/img/nosotros.jpg" type="image/jpeg">
          <img loading="lazy" src="./build/img/nosotros.jpg" alt="Image sobre nosotros">
        </picture>
      </div>

      <div class="text-us">
        <blockquote>25 años de experiencia</blockquote>
        <p>En Bienes Raíces, estamos comprometidos con la excelencia en el sector inmobiliario. Con una dedicación inquebrantable hacia la satisfacción del cliente y un enfoque centrado en la integridad y la transparencia, nos esforzamos por superar las expectativas en cada paso del camino. Nuestro equipo de expertos en bienes raíces está aquí para guiarlo a través del proceso de compra, venta o alquiler de propiedades con un servicio personalizado y profesional. En Bienes Raíces, no solo nos dedicamos a las transacciones inmobiliarias, sino que también construimos relaciones duraderas basadas en confianza, honestidad y resultados excepcionales. Descubra cómo podemos convertir sus sueños inmobiliarios en realidad hoy mismo.</p>
        <p>Nuestra pasión por el mercado inmobiliario se refleja en cada interacción que tenemos con nuestros clientes. Nos enorgullece ofrecer un enfoque personalizado y orientado a soluciones, donde cada necesidad es atendida con atención meticulosa y profesionalismo. En Bienes Raíces, no solo vendemos propiedades, sino que también creamos experiencias inolvidables al ayudar a nuestros clientes a encontrar el lugar perfecto al que puedan llamar hogar. Estamos comprometidos con la excelencia en cada transacción, brindando un servicio que va más allá de las expectativas y construyendo una reputación sólida como líderes en el mercado. Confíe en nosotros para hacer realidad sus objetivos inmobiliarios con un enfoque centrado en usted y su satisfacción.</p>
      </div>
    </div>
  </main>

  <section class="container section">
    <h2>Más sobre nosotros</h2>

    <div class="icons-us">
      <div class="icon">
        <img src="./build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
        <h3>Seguridad</h3>
        <p>La seguridad es nuestra principal prioridad. Nos comprometemos a garantizar que cada transacción se realice de manera segura y transparente, brindando la tranquilidad que nuestros clientes merecen al invertir en propiedades.</p>
      </div>
      <div class="icon">
        <img src="./build/img/icono2.svg" alt="Icono precio" loading="lazy">
        <h3>Precio</h3>
        <p>Ofrecemos un enfoque centrado en el valor para cada una de nuestras propiedades. Nuestro equipo se esfuerza por negociar precios justos y competitivos, asegurando que nuestros clientes obtengan la mejor oferta posible sin comprometer la calidad.</p>
      </div>
      <div class="icon">
        <img src="./build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
        <h3>Tiempo</h3>
        <p>Entendemos la importancia de cumplir con los plazos y compromisos acordados. En nuestra inmobiliaria, nos comprometemos a cumplir con los horarios establecidos, ya sea para mostrar una propiedad o completar cualquier trámite necesario.</p>
      </div>
    </div>
  </section>
<?php 
  renderTemplate('footer')
?>