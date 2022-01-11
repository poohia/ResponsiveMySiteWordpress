<div class="responsiveMySite--container">
    <h3 class="responsiveMySite--container--title">Télécharger l'application mobile</h3>
    <div class="responsiveMySite--container--content">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum est iure provident tempore aliquam, eveniet vel porro deleniti unde, animi vero sunt sapiente nostrum quo veritatis architecto ut eum blanditiis ea voluptates ad non. Aliquid accusamus eos delectus suscipit assumenda perspiciatis provident ullam animi facilis doloribus earum sint laudantium cupiditate repellat fuga quia labore atque vel ab dignissimos, aspernatur quis nam repudiandae! Amet ab atque quis tempore explicabo, dicta laboriosam ut corrupti expedita consequuntur, eveniet, illo repellat harum et repudiandae ratione soluta tenetur! Debitis sit impedit perferendis tempore vero! Accusantium nesciunt voluptatum a corrupti at perspiciatis dolores quos sit veritatis.
    </div>
    <div>
      <b>  <?php echo $webApp->webAppCode ?></b>
    </div>
    <div>
      <form id="responsiveMySite--form-conf-app" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
      <p class="submit wp-core-ui">
      <input type="submit" name="sentMail" value="Mettre l'application sur les stores"
      class="button button-primary"
      <?php if($webApp->sentMail === "1") echo "disabled='disabled'" ?>
      />
      </p>
      </form>
    </div>
</div>