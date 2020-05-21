<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style-index_1.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
<!-- Header -->
  <header>
    <div class="container text-center" id="banner">
      <h1>Chào mừng bạn đến với website RENTAL.Service</h1>
      <p class="lead">Đơn giản và thuận tiện hoá việc tìm nhà, tìm người muốn thuê nhà bằng việc kết hợp với công nghệ VR, hình ảnh 360, toàn cảnh</p>
    </div>
  </header>
<div class="container">
  <div id="slide" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#slide" data-slide-to="0" class="active"></li>
    <li data-target="#slide" data-slide-to="1"></li>
    <li data-target="#slide" data-slide-to="2"></li>
    <li data-target="#slide" data-slide-to="3"></li>
    <li data-target="#slide" data-slide-to="4"></li>
  </ul>
  <!-- <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2Fwww.google.com%2F&choe=UTF-8" title="Link to Google.com" /> -->
  <!-- The slideshow -->
  <?php $active_image = mysqli_fetch_array($data["CarouselImage"]) ?>
  <div  class="carousel-inner">
    <div class="carousel-item active">
      <img style="max-height: 350px" src="img/<?=$active_image["imageURL"]?>" alt="">
    </div>
    <?php while($row =mysqli_fetch_array($data["CarouselImage"]))
    {?>
    <div class="carousel-item">
      <img style="max-height: 350px" src="img/<?=$row["imageURL"]?>" alt="">
    </div>
    <?php }?>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#slide" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#slide" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>
</div>


  <!-- Title -->
  <div class="container">
    <h3 class="txtTitle">Địa điểm</h3>
      <p class="paraText">Retal.Service chuyên cho thuê hỗ trợ, kết nối chủ nhà và chủ nhà từ tất cả các tỉnh, thành phố trên toàn quốc, đặc biệt là các tỉnh, thành phố nổi tiếng như Hà Nội, Cần Thơ, Đà Nẵng, Hồ Chí Minh...</p>
  </div>

    <!-- Content -->
  <?php $count = 0;?>
  <div class="container">
    <div class="row">
      <?php while($row = mysqli_fetch_array($data["PlaceInformation"])){  $Name = str_replace(' ', '_', $row["TenThanhPho"])?>
      <?php if($count == 0){ echo '<div class="partOne card-deck-wrapper">'; ?>
      <?php echo '<div class="card-deck">'; }?>
            <div class="card">
              <a href="/NhaTro/DisplayHouse/DisplayByCity/<?=$Name?>"><img src="img/<?=$row["imageURL"]?>" alt="" class="img"></a>
            <div class="card-block">
              <a href="city-detail.php"><p class="card-txt text-center"><?php echo $row["TenThanhPho"]?></p></a>  
              </div>
            </div>
            <?php $count++; ?>
        <?php if($count == 2){ echo '</div>';?>
        <?php echo '</div>'; $count = 0; }?>
    <?php }?>
    </div>
</div>
</body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</html>