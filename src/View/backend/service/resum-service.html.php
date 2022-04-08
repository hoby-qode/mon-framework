<div class="col-md-12 col-lg-6 col-xl-4">
  <div class="card mb-2 bg-gradient-dark">
    <img class="card-img-top" src="https://picsum.photos/200/300" alt="Dist Photo 1" height="350px">
    <div class="card-img-overlay d-flex flex-column justify-content-end">
      <h2 class=" text-primary text-white"><?= $service->name; ?></h2>
      <p class="card-text text-white pb-2 pt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor.</p>
      <div class="d-flex">
        <a href="/admin/services/delete/<?= $service->id?>" class="text-white mr-4">DELETE</a>
        <a href="/admin/services/edit/<?= $service->id?>" class="text-white">EDIT</a>
      </div>
    </div>
  </div>
</div>