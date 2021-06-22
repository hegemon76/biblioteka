<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Biblioteka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>

    <!-- nav -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="text-primary navbar-brand" href="#">Aplikacja Biblioteka</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-md-center" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a  class="p-3 mb-2 bg-dark text-white nav-item nav-link active" href="#">Panel administratora <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="#">Panel edycji</a>
                <a class="nav-item nav-link" href="#">Dodaj nową</a>
                <a class="nav-item nav-link" href="#">Logowanie</a>
            </div>
        </div>
    </nav>
    <!-- end nav -->

    <!-- Dodawanie-->
    <div class="container">
        <form action="Baza/dodawanie.php" method="POST">
            <div class="form-group mb-3 col-4 offset-4">
                <label class="col-form-label">Tytuł książki</label>
                <input type="text" class="form-control" name="artTitle" placeholder="Tytuł książki">

            </div>
            <div class="form-group mb-3 col-4 offset-4">
                <label class="col-form-label">Link do grafiki</label>
                <input type="text" class="form-control" name="artImg" placeholder="Link do grafiki">
            </div>
            <div class="form-group mb-3 col-4 offset-4">
                <label class="col-form-label">Tresc</label>
                <textarea class="form-control" name="artContent" placeholder="Treść" rows="3"></textarea>
            </div>
            <div class="mb-5">
                <button type="submit" class="btn btn-primary col-2 offset-5">Wyslij</button>
            </div>
        </form>
    </div>
    <!-- koniec forma dodawania -->
    <div class="container mt-5 mb-5 col-6 offset-5">
            <?php include 'Baza/wyswietlanie2.php'; ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>