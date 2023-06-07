<?php
include 'fungsi.php';
$jumlah = new Jumlah();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ikantin wikrama</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <style>
html{
    scroll-behavior:smooth;
}

.card {
  /* Add shadows to create the "card" effect */
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  height:300px;
  width:1150px;
  margin-left:450px;
  background: transparent;
  border-style: solid;
  border-width: 4px 4px 4px 4px;
  border-color: black;
  border-radius: 0.3rem;
}

.card img{
    width: 200px;
    height: 200px;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

/* Add some padding inside the card container */
.container {
  padding: 2px 16px;
}

.judul1{
    font-size:100px;
    margin-top:-200px;
    margin-left:400px;
}

.dsc1{
font-size:55px;
margin-left:400px;
}

.card button{
    width:1152px;
    margin-top:55px;
    margin-left:-17px;
    font-size:10px;
}

.psh{
    margin-bottom:50px;
}
    </style>
</head>

<body>
    <nav class="navbar-inverse" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><i class="fa fa-shopping-cart"></i> ikantin Wikrama</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php"><i class="fa fa-home"></i> Beranda</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#buy"><i class="fa fa-shopping-cart"></i> Beli</a></li>
                    <li><a href="#menu">Menu</a></li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"></a></li>
                </ul>
            </div><!--/.navbar-collapse -->
        </div><!--/.container-fluid -->
    </nav>

    <div class="container" style="margin-top: 50px;">
        <div class="panel panel-success">
            <div class="panel-body bg-primary">
                <div class="container">
                    <h1><i class="fa fa-shopping-cart"></i> Selamat datang di ikantin wikrama</h1>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="container">
                    <div class="col-md-10">
                        <h4>Klik disini untuk pembelian
                            <button type="button" class="btn btn-success" name="button" data-toggle="modal" data-target="#buy">
                                <i class="fa fa-shopping-cart"></i> Beli
                            </button>
                        </h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="container">
                    <?php
                    if (isset($_POST['check'])) {
                        $jmlbakso = $_POST['bakso'];
                        $jmlbakwan = $_POST['bakwan'];

                        if ($jmlbakso == null) {
                            $jumlah->getJumlah(0, $jmlbakwan);
                        } elseif ($jmlbakwan == null) {
                            $jumlah->getJumlah($jmlbakso, 0);
                        } else {
                            $jumlah->getJumlah($jmlbakso, $jmlbakwan);
                        }

                        $jumlah->setHarga();
                        $jumlah->cetakstruk();
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

    <!-- [Modal Form]-->

    <div class="modal fade" id="buy" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger" style="border-radius: 5px 5px 0px 0px;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="">Form Pembelian</h4>
                </div>
                <div class="modal-body">
                    <form class="form-group" action="" method="post">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-cutlery"></i></span>
                            <input type="number" class="form-control" name="bakwan" id="bakwan" placeholder="Masukkan Jumlah Bakso Yang Dibeli">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-cutlery"></i></span>
                            <input type="number" class="form-control" name="bakso" id="bakso" placeholder="Masukkan Jumlah Bakwan Yang Dibeli">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnbakso" onclick="Onlybakso()" class="btn btn-success" style="float: left;">Bakwan</button>
                    <button type="button" id="btnbakwan" onclick="Onlybakwan()" class="btn btn-success" style="float: left;">Bakso</button>
                    <button type="button" onclick="Keduanya()" class="btn btn-success" style="float: left;">Bakwan & Bakso</button>
                    <button type="button" onclick="exit()" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    <button type="submit" class="btn btn-primary" name="check"><i class="fa fa-check"></i> Cek Total</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="menu" id="menu">
    <div class="text-center"> 
    <h2>MENU YANG TERSEDIA:</h2>
    </div>

 <div class="psh">
    <div class="card">
  <img src="img/bkwn.jpg" alt="Avatar">
  <div class="container">
    <h4 class="judul1"><b>Bakwan</b></h4>
    <p class="dsc1">bakwan aja</p>
    <button type="button" class="btn btn-success" name="button" data-toggle="modal" data-target="#buy">
                                <i class="fa fa-shopping-cart"></i> Beli
    </button>
  </div>
</div>
</div>

    <div class="card">
  <img src="img/bkso.jpeg" alt="Avatar">
  <div class="container">
    <h4 class="judul1"><b>Bakso</b></h4>
    <p class="dsc1">bakso aja</p>
    <button type="button" class="btn btn-success" name="button" data-toggle="modal" data-target="#buy">
                                <i class="fa fa-shopping-cart"></i> Beli
    </button>
  </div>
</div>
                </div>
    


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        function Onlybakso() {
            document.getElementById("bakso").readOnly = false;
            document.getElementById("bakwan").readOnly = true;
            document.getElementById("btnbakwan").disabled = false;
            document.getElementById("btnbakso").disabled = true;
        }

        function Onlybakwan() {
            document.getElementById("bakso").readOnly = true;
            document.getElementById("bakwan").readOnly = false;
            document.getElementById("btnbakwan").disabled = true;
            document.getElementById("btnbakso").disabled = false;
        }

        function Keduanya() {
            document.getElementById("bakso").readOnly = false;
            document.getElementById("bakwan").readOnly = false;
            document.getElementById("btnbakwan").disabled = false;
            document.getElementById("btnbakso").disabled = false;
        }

        function exit() {
            document.getElementById("bakso").readOnly = true;
            document.getElementById("bakwan").readOnly = true;
        }
    </script>
</body>

</html>
