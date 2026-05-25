<?php $img = get_template_directory_uri() . '/assets/images/'; ?>

<footer class="site-footer">
  <div class="wrap">
    <div class="grid">

      <!-- Brand column -->
      <div>
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:18px">
          <img src="<?php echo esc_url( $img . 'logo.webp' ); ?>" alt="" width="72" height="72" style="object-fit:contain">
          <div>
            <div style="font-family:'Playfair Display',serif;font-size:24px">Sjokoladerommet</div>
            <div style="font-size:12px;letter-spacing:.2em;text-transform:uppercase;opacity:.7;margin-top:4px">Made in Lofoten</div>
          </div>
        </div>
        <p style="max-width:360px">
          Vi lager sjokolade med hjerte, serverer kaffe med glede, og ønsker alle
          velkommen — akkurat som de er. Kom innom for en prat, en kake og en bit Lofoten.
        </p>
        <p class="handwrite" style="margin-top:18px;font-size:20px;color:var(--krem)">— Janett</p>
      </div>

      <!-- Opening hours -->
      <div>
        <h4>Åpningstider</h4>
        <ul>
          <li><span>Mandag</span><b>Stengt</b></li>
          <li><span>Tirsdag</span><b>Stengt</b></li>
          <li><span>Onsdag</span><b>Stengt</b></li>
          <li><span>Torsdag</span><b>11–16</b></li>
          <li><span>Fredag</span><b>11–16</b></li>
          <li><span>Lørdag</span><b>11–16</b></li>
          <li><span>Søndag</span><b>11–16</b></li>
        </ul>
      </div>

      <!-- Location + map -->
      <div>
        <h4>Finn oss</h4>
        <p>
          Gravdalsgata 15<br>
          8372 Gravdal<br>
          Lofoten, Norge
        </p>
        <?php get_template_part( 'template-parts/mini-map' ); ?>
      </div>

    </div>

    <div class="legal">
      <span>© <?php echo date( 'Y' ); ?> Sjokoladerommet AS · Org.nr 921 458 102</span>
      <span>Laget med kjærlighet i Gravdal</span>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
