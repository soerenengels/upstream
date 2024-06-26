<?php $show = isset($reduced) ? false : true ?>
<footer data-theme="light" id="footer" class="<?= $show ? '' : 'footer__reduced' ?>">
  <div class="footer footer__container">
    <nav class="footer__navigation social">
      <?php /* <li><a href="" class="button__subscribe--light">Mitglied werden</a></li> */ ?>
      <?php snippet('components/navigation/social', ['theme' => 'light']) ?>
    </nav>
    <nav class="footer__navigation sitenav">
			<?= $site->navigation('footer') ?>

    </nav>
    <div class="toTop">
      <p><a href="#top"><span>Zum Seitenanfang</span><?= svg('assets/icons/arrow-up-circle-fill.svg') ?></a></p>
    </div>

    <?php if($show): ?>
    <section class="footer__explainer">

      <p>Upstream wurde 2020/21 im Rahmen eines interdisziplinären Seminars von <a href="https://www.medizin.uni-halle.de/einrichtungen/institute/medizinische-epidemiologie-biometrie-und-informatik?ref=upstream-newsletter.de">Medizin-</a> und Masterstudierenden des Studiengangs <a href="https://mmautor.net/">Multimedia und Autorschaft</a> an der <a href="https://uni-halle.de/?ref=upstream-newsletter.de">Universität Halle-Wittenberg</a> konzipiert.</p>
      <p><a href="/redaktion/maren-wilczek">Maren Wilczek</a> und <a href="/redaktion/soeren-engels">Sören Engels</a> sind freie Journalist*innen. Bei Upstream recherchieren sie, wie Ungleichheit krank macht.</p>
    </section>
    <?php endif ?>
  </div>
</footer>
