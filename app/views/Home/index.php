<div class="wraper-home mt-3">

  <div class="container ">
    <div class="row">
      <div class="col d-flex justify-content-start gap-3 ">

        <?php foreach ($data['card_data'] as $card) :

          $getArrayName = array_key_first($card);
          $getCardAttachment = $card[$getArrayName]['card_attachment'];
        ?>

          <div class="card w-25 d-flex bg-<?= $getCardAttachment['color'] ?> text-white">
            <div class="d-flex align-items-center">
              <div class="card-body">
                <h5 class="card-title fs-2"><?= empty($card[$getArrayName]['data']) ? 0 : count($card[$getArrayName]['data']) ?></h5>
                <p class="card-text fs-4 text-capitalize"><?= $getArrayName; ?></p>
              </div>
              <div class="card-body">
                <i class="bi bi-<?= $getCardAttachment['icon'] ?> fs-1"></i>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
    </div>
  </div>

</div>