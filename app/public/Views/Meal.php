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

  <title>Meals</title>
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
        <a class="nav-item nav-link" href="/dish">Dishes</a>
        <a class="nav-item nav-link active" href="/dish">Meals</a>
        <form method="POST" action="/login">
          <input type="hidden" name="logout" value="true">
          <button class="btn btn-link" type="submit">Logout</button>
        </form>
      </div>
    </div>
  </nav>

  <?php $isEditing = isset($_SESSION["meal-edit-context"]) && is_a($_SESSION["meal-edit-context"], 'Meal'); ?>

  <form method="POST" class="p-4 container">
    <?php if ($isEditing) $mealEditContext = $_SESSION["meal-edit-context"] ?? null;?>

    <?php if ($_SESSION["update-meal-error"] ?? null) : ?>
      <div style="background: #fafae1; padding: 15px; margin-bottom: 24px;">
        📢 <?= $_SESSION["update-meal-error"] ?>
      </div>
    <?php endif; ?>

    <?php if ($_SESSION["update-meal-success"] ?? null) : ?>
      <div style="background: #e3fae1; padding: 15px; margin-bottom: 24px;">
        📢 <?= $_SESSION["update-meal-success"] ?>
      </div>
    <?php endif; ?>

    <div class="form-group">
      <label for="id" class="col-form-label">Id:</label>
      <input type="text" class="form-control" id="id" name="id" readonly value="<?= $isEditing ? $mealEditContext->getId() : '' ?>">
    </div>
    <div class="form-group">
      <label for="day" class="col-form-label">Type:</label>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="type" id="typeLunch" value="lunch" <?= ($isEditing && $mealEditContext->getType() === 'lunch') == 1 ? 'checked' : '' ?>>
        <label class="form-check-label" for="typeLunch">
          Lunch
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="type" id="typeDinner" value="dinner" <?= ($isEditing && $mealEditContext->getType() === 'dinner') == 1 ? 'checked' : '' ?>>
        <label class="form-check-label" for="typeDinner">
          Dinner
        </label>
      </div>
    </div>

    <div class="form-group">
      <label for="day" class="col-form-label">Day:</label>
      <input type="text" class="form-control" id="day" name="day" value="<?= $isEditing ? $mealEditContext->getDay() : '' ?>">
    </div>
    <div class="form-group">
      <label for="dish" class="col-form-label">Dish:</label>
      <select class="custom-select mb-3" name="dish">

        <?php foreach (DishRepository::getDishes() as $dish) : ?>
          <option value="<?= $dish->getId() ?>" <?= ($isEditing && $mealEditContext->getDish() == $dish) == 1 ? 'selected' : '' ?>><?= $dish->getName() ?></option>
        <?php endforeach; ?>

      </select>
    </div>




    <input type="hidden" class="form-control" name="action" value="<?= $isEditing ? 'edit' : 'create' ?>">

    <button type="submit" class="btn btn-primary"><?= $isEditing ? 'Save' : 'Add' ?></button>
  </form>


  <div class="p-4 container">
    <h5>Meals</h5>
    <table class="table px-2">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Type</th>
          <th scope="col">Day</th>
          <th scope="col">Dish</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach (MealRepository::getMeals() as $meal) : ?>
          <tr>
            <td><?= $meal->getId() ?></td>
            <td><?= $meal->getType() ?></td>
            <td><?= $meal->getDay() ?></td>
            <td><?= $meal->getDish()->getName() ?></td>
            <td>
              <button class="btn btn-outline-warning" onclick="location.href = 'meal?id=<?= $meal->getId() ?>';">

                ✏️
              </button>
              <form method="POST" class="d-inline">
                <input type="hidden" name='id' value="<?= $meal->getId() ?>">
                <input type="hidden" name='action' value="delete">
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