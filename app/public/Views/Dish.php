<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <title>Dishes</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">RU</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="/">Dashboard</a>
        <a class="nav-item nav-link active" href="/dish">Dishes</a>
        <a class="nav-item nav-link" href="/dish">Meals</a>
        <form method="POST" action="/login">
          <input type="hidden" name="logout" value="true">
          <button class="btn btn-link" type="submit">Logout</button>
        </form>
      </div>
    </div>
  </nav>

  <?php $isEditing = isset($_SESSION["dish-edit-context"]) && is_a($_SESSION["dish-edit-context"], 'Dish'); ?>

  <form method="POST" class="p-2">
    <?php if ($isEditing) $dishEditContext = $_SESSION["dish-edit-context"] ?? null; ?>

    <?php if ($_SESSION["update-dish-error"] ?? null) : ?>
      <div style="background: #fafae1; padding: 15px; margin-bottom: 24px;">
        📢 <?= $_SESSION["update-dish-error"] ?>
      </div>
    <?php endif; ?>

    <?php if ($_SESSION["update-dish-success"] ?? null) : ?>
      <div style="background: #e3fae1; padding: 15px; margin-bottom: 24px;">
        📢 <?= $_SESSION["update-dish-success"] ?>
      </div>
    <?php endif; ?>

    <div class="form-group">
      <label for="id" class="col-form-label">Id:</label>
      <input type="text" class="form-control" id="id" name="id" readonly value="<?= $isEditing ? $dishEditContext->getId() : '' ?>">
    </div>
    <div class="form-group">
      <label for="name" class="col-form-label">Name:</label>
      <input type="text" class="form-control" id="name" name="name" value="<?= $isEditing ? $dishEditContext->getName() : '' ?>">
    </div>
    <div class="form-group">
      <label for="description" class="col-form-label">Description:</label>
      <input type="text" class="form-control" id="description" name="description" value="<?= $isEditing ? $dishEditContext->getDescription() : '' ?>">
    </div>
    <div class="form-group">
      <label for="url" class="col-form-label">URL:</label>
      <input type="text" class="form-control" id="url" name="url" value="<?= $isEditing ? $dishEditContext->getUrl() : '' ?>">
    </div>

    <input type="hidden" class="form-control" name="type" value="<?= $isEditing ? 'edit' : 'create' ?>">

    <button type="submit" class="btn btn-primary"><?= $isEditing ? 'Save' : 'Add' ?></button>
  </form>


  <div class="p-2">
    <h5>Dishes</h5>
    <table class="table px-2">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach (DishRepository::getDishes() as $dish) : ?>
          <tr>
            <td><?= $dish->getId() ?></td>
            <td><?= $dish->getName() ?></td>
            <td>
              <button class="btn btn-outline-warning" onclick="location.href = 'dish?id=<?= $dish->getId() ?>';">

                ✏️
              </button>
              <form method="POST" class="d-inline">
                <input type="hidden" name='id' value="<?= $dish->getId() ?>">
                <input type="hidden" name='type' value="delete">
                <button class="btn btn-outline-danger ml-2" type="submit">
                  ❌
                </button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>

      </tbody>
    </table>
  </div>

  <style>
    .navbar-nav .btn-link {
      padding: 0;
      color: rgba(0, 0, 0, .5)
    }
  </style>

</html>