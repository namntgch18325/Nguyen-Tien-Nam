<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Name</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/NhaTro/css/style-city-detail_1.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
  <?php require_once "./mvc/view/Sub-View/navigation-bar.php" ?>
<!-- start content -->
<!-- Page Content -->
<div class="container">

<div class="row">
  <div class="col-lg-3">
    <h1 class="my-4" id="location">Tìm kiếm</h1>
    <div class="card">
    <article class="card-group-item">
		<header class="card-header">
			<h6 class="title">Tên bài đăng</h6>
        </header>
        <div class="input-group"> 
            <input type="text" class="form-control" id="" placeholder="Nhập tên bài đăng">
        </div>
    </article>
    <article class="card-group-item">
		<header class="card-header">
			<h6 class="title">Giá tiền</h6>
        </header>
        <div class="input-group"> 
            <input type="number" class="form-control" id="" placeholder="VND" min="0">
        </div>
    </article>
    <article class="card-group-item">
		<header class="card-header">
			<h6 class="title">Địa điểm</h6>
        </header>
        <label>Thành phố</label>
        <div id="myApp">
        <div class="input-group"> 
            <select id="slTinhThanh" onchange="GetQuanHuyen()" class="form-control">

            </select>
        </div>
        <label>Quận / Huyện</label>
        <div class="input-group"> 
            <select onchange="GetPhuongXa()" id="sl"  class="form-control">
            </select>
        </div>
        <label>Xã / Phường</label>
        <div class="input-group"> 
            <select id="slXaPhuong" class="form-control">
                
            </select>
        </div></div>
    </article>
    <article class="card-group-item">
		<header class="card-header">
			<h6 class="title">Diện tích</h6>
        </header>
        <div class="input-group"> 
            <input type="number" class="form-control" id="inputEmail4" placeholder="M2" min="0">
        </div>
    </article>
    <article class="card-group-item">
		<header class="card-header">
			<h6 class="title">Loại hình</h6>
        </header>
        <div class="filter-content">
			<div class="card-body">
			<form>
      <?php while($row = mysqli_fetch_array($data["HouseType"])) {?>
          <label class="form-check">
            <input class="form-check-input" type="checkbox" value="<?=$row["ID"]?>">
            <span class="form-check-label">
             <?=$row["TypeName"]?>
            </span>
          </label> <!-- form-check.// -->
      <?php }?>  
			</form>
			</div> <!-- card-body.// -->
		</div>
    </article>
	<article class="card-group-item">
		<header class="card-header">
			<h6 class="title">Vật dụng</h6>
		</header>
		<div class="filter-content">
			<div class="card-body">
			<form>
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				    Điều hoà
				  </span>
				</label> <!-- form-check.// -->
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				    Tủ lạnh
				  </span>
                </label>  <!-- form-check.// -->  
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				    Giường ngủ
				  </span>
                </label>  
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				    Tủ đựng quần áo
				  </span>
                </label>     
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				    Bếp nấu ăn
				  </span>
                </label>  
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				    Nhà vệ sinh
				  </span>
                </label>   
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				    Không sống chung với chủ
				  </span>
                </label>  
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				    Tất cả
				  </span>
				</label>  
            </form>
			</div> <!-- card-body.// -->
		</div>
    </article> <!-- card-group-item.// -->
    <button type="button" class="btn btn-success">Tìm kiếm</button>
</div> <!-- card.// -->

	</aside> <!-- col.// -->
    <h1 class="my-4" id="location">Địa điểm</h1>
    <div class="list-group">
      <?php  while($row = mysqli_fetch_array($data["City"]))
      {
        $Name = str_replace(' ', '_', $row["TenThanhPho"]);
        echo '<a href="/NhaTro/DisplayHouse/DisplayByCity/'.$Name.'" class="list-group-item">'.$row["TenThanhPho"].'</a>';
      }
      ?>
    </div>

  </div>
  <!-- /.col-lg-3 -->

  <div class="col-lg-9">
    <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#slide" data-slide-to="0" class="active"></li>
        <li data-target="#slide" data-slide-to="1"></li>
        <li data-target="#slide" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img class="d-block img-fluid" src="/NhaTro/img/city-detail/slide1.jpg" alt="">
        </div>
        <div class="carousel-item">
          <img class="d-block img-fluid" src="/NhaTro/img/city-detail/slide2.jpg" alt="">
        </div>
        <div class="carousel-item">
          <img class="d-block img-fluid" src="/NhaTro/img/city-detail/slide3.jpg" alt="">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    
    <div class="container">
        <h3 class="txtTitle">Kết quả</h3>
    </div>
    <div class="row">
    <?php while($row = mysqli_fetch_array($data["ListHouse"])) {?>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
          <a href="/NhaTro/HouseDetail/detail/<?=sha1($row["ID"])?>">
          <img class="card-img-top" src="/NhaTro/img/House_Image/<?=$row["imageURL"]?>" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="/NhaTro/HouseDetail/detail/<?=sha1($row["ID"])?>"><?php echo $row["HouseNumber"]."  ".$row["Huyen"]. "  ".$row["Quan"]."  ". $row["TP"] ?></a>
            </h4>
            <h5><?=$row["Price"]?>&dstrok;</h5>
             <p class="card-text"><?=$row["Description"]?></p>
          </div>
          <div class="card-footer">
            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
          </div>
        </div>
      </div>
    <?php } ?>  
    </div>
    <!-- /.row -->
  </div>
  <!-- /.col-lg-9 -->
</div>
<!-- /.row -->
</div>
<!-- /.container -->
<!-- end content -->
<?php require_once "./mvc/view/Sub-view/footer.php";?>
</body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</html>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type ="text/javascript" src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script type="text/javascript" src = "/NhaTro/js/TinhThanhVietNam.js"></script>