<footer class="footer">
  <div class="footer-container">

    {{-- ── CONTACTO ── --}}
    <div class="footer-section">
      <h3><i class="fas fa-phone-alt"></i> Contacto</h3>
      <ul>
        <li><i class="fas fa-chevron-right footer-list-ico"></i> +57 312 775 9123</li>
        <li><i class="fas fa-chevron-right footer-list-ico"></i> +57 314 271 6135</li>
        <li><i class="fas fa-chevron-right footer-list-ico"></i> +57 316 099 3123</li>
        <li><i class="fas fa-chevron-right footer-list-ico"></i> +57 314 646 1709</li>
      </ul>
    </div>

    {{-- ── REDES + TÉRMINOS ── --}}
    <div class="footer-section">
      <h3><i class="fas fa-share-alt"></i> Redes Sociales</h3>

      <div class="social-icons">
        <a href="#" class="social-link" title="Facebook" aria-label="Facebook">
          <img src="https://www.freeiconspng.com/uploads/facebook-logo-3.png" alt="Facebook">
        </a>
        <a href="#" class="social-link" title="Instagram" aria-label="Instagram">
          <img src="https://upload.wikimedia.org/wikipedia/commons/9/95/Instagram_logo_2022.svg" alt="Instagram">
        </a>
        <a href="#" class="social-link" title="X / Twitter" aria-label="Twitter">
          <img src="https://img.freepik.com/vector-gratis/nuevo-diseno-icono-x-logotipo-twitter-2023_1017-45418.jpg?semt=ais_hybrid&w=740&q=80" alt="Twitter">
        </a>
        <a href="#" class="social-link" title="YouTube" aria-label="YouTube">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS12cuQlU2h6d0V-rLkxpSJSdBJ89ZO4uGTPA&s" alt="YouTube">
        </a>
      </div>

      <p class="terminos">
        <i class="fas fa-shield-halved" style="color:rgba(138,201,38,0.4);font-size:0.65rem"></i>
        © 2025 &nbsp;|&nbsp; <a href="{{ url('/terminos-condiciones') }}">Términos de uso</a>
      </p>

      {{-- Acceso admin oculto --}}
      <a href="{{ route('admin.login') }}" style="opacity:0.06;font-size:0.4rem;color:#333;text-decoration:none;margin-top:4px;">·</a>
    </div>

    {{-- ── CORREOS ── --}}
    <div class="footer-section">
      <h3><i class="fas fa-envelope"></i> Correos</h3>
      <ul>
        <li><i class="fas fa-at footer-list-ico"></i> forcemenrtartu@gmail.com</li>
        <li><i class="fas fa-at footer-list-ico"></i> luisestebannarvaez82@gmail.com</li>
        <li><i class="fas fa-at footer-list-ico"></i> chicanganad9@gmail.com</li>
        <li><i class="fas fa-at footer-list-ico"></i> elviracastrojuliandavid@gmail.com</li>
      </ul>
    </div>

  </div>

  {{-- ── BARRA INFERIOR ── --}}
  {{-- <div class="footer-bottom">
    <a href="{{ route('home') }}" class="footer-bottom-brand">
      <img src="/img/LogoAgrofinanzas.jpeg" alt="Logo AgroFinanzas">
      <span>AgroFinanzas</span>
    </a>
    <p class="footer-bottom-copy">
      Hecho con <i class="fas fa-leaf" style="color:rgba(138,201,38,0.5);font-size:0.7rem"></i> en Colombia &nbsp;·&nbsp; 2025
    </p>
  </div> --}}
</footer>