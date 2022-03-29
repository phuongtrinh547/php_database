<nav class="nav">
   <?php foreach ($passedData['navLinks'] as $link) { ?>
      <a href="<?= $link['link'] ?>"><?= $link['name'] ?></a>
   <?php } ?>
</nav>