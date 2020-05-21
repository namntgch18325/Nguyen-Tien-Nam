<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Name</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="/NhaTro/css/style-house-detail.css">
</head>
<body>
  <!-- Navigation -->
  <?php  require_once "./mvc/view/Sub-View/navigation-bar.php"; ?>
<!----CONTENT----->
<?php $information = mysqli_fetch_array($data["Information"]); ?>
<div class="container">
    <div class="heading-section">
        <h1 class="my-4" id="location">Thông tin chi tiết</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="slider" class="owl-carousel product-slider">
            <?php foreach ($data["Image"] as $key => $img) { ?>
                <div class="item">
                    <img src="/NhaTro/img/House_Image/<?php echo $img ?>" />
                </div>            
            <?php }?>
            </div>
            <div id="thumb" class="owl-carousel product-thumb">
            <?php foreach ($data["Image"] as $key => $img) { ?>
                <div class="item">
                    <img src="/NhaTro/img/House_Image/<?php echo $img ?>" />
                </div>
            <?php }?>
            </div>
        </div>
            <div class="col-md-6">
                <div class="product-dtl">
                    <div class="product-info">
                        <div class="product-name"><?php echo $information["HouseNumber"]."  ".$information["Huyen"]. "  ".$information["Quan"]."  ". $information["TP"] ?></div>
                        <div class="reviews-counter">
                            <div class="rate">
                                <input type="radio" id="star5" name="rate" value="5" checked />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rate" value="4" checked />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rate" value="3" checked />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rate" value="1" />
                                <label for="star1" title="text">1 star</label>
                                </div>
                            <span>0 Đánh giá</span>
                        </div>
                        <div class="product-price-discount"><span><?=$information["Price"]?>&dstrok;</span><span class="line-through"><?php echo $information["Price"] + 3000000; ?>&dstrok;</span></div>
                    </div>
                    <p>Quý vị đang xem nội dung tin rao: <?php echo $information["Description"] ?> </p>  
                    <div class="product-count">
                        <a href="/nhaTro/mode360" class="round-black-btn">Xem 3D Mode</a>
                    </div>
                    <form action="/NhaTro/RegisterToMeetHost" method="POST">
                        <div class ="product-count">
                        <!-- <input type="datetime-local" id="datetimepicker" name="datetimepicker"> -->
                        <input name = "date" onchange="CheckDate()" type="date" id="datetimepicker">
                        <p id="plsSelectDate"></p>
                        </div>
                        <?php if(!isset($data["QR"]) || $data["Date"]==-1){ ?>
                        <div class="product-count">
                            <button value ="<?=$data["HouseID"]?>" name="regis" onclick="CheckDate()"  class="round-black-btn">Tôi Muốn Gặp Chủ Nhà</button>
                        </div>
                        </form>
                        <?php } else{ ?>
                        <div class="product-count">
                            <button value ="" name="date"  class="round-black-btn">Bạn Đã Hẹn Gặp Ngày <?=$data["Date"]?></button>
                        </div>  
                        <?php }?>     
                </div>
            </div>
        </div>
        <div class="product-info-tabs">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link show active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Thông tin chi tiết</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Đánh giá</a>
                </li>
               <?php if($data["QR"]!=-1){ ?>
                <li class="nav-item">
                    <a class="nav-link" id="qr-tab" data-toggle="tab" href="#qr" role="tab" aria-controls="qr" aria-selected="false">Mã QR</a>
                </li>
                <?php }?>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                    <div style="max-width: 1000px;">
                <?php echo $data["Description"]; ?>
                    </div>
                </div>
                <!--- View Feedback --->
                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                    <div class="row">
                    <?php while($row =mysqli_fetch_array($data["Comment"])){ ?>
                        <div class="col-md-12">
                            <div class="media g-mb-30 media-comment">
                                <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="/NhaTro/img/user.png" alt="Image Description">
                                <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                                <div class="g-mb-15">
                                    <h5 class="h5 g-color-gray-dark-v1 mb-0"><?=$row["FullName"]?></h5>
                                    <span class="g-color-gray-dark-v4 g-font-size-12"><?=$row["DATE"]?></span>
                                </div>
                                <p><?=$row["content"]?></p>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                    </div>
                    <?php
                    if($data["AvalibleComment"]==true) 
                    {
                    ?>
                    <form class="review-form">
                        <div class="form-group">
                            <br>
                            <label>Đánh giá của bạn</label>
                            <div class="reviews-counter">
                                <div class="rate">
                                    <input type="radio" id="star5" name="rate" value="5" />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="rate" value="4" />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="rate" value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="rate" value="2" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="rate" value="1" />
                                    <label for="star1" title="text">1 star</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nội dung đánh giá</label>
                            <textarea class="form-control" rows="10"></textarea>
                        </div>   
                        <button class="round-black-btn">Gửi đánh giá</button>
                    </form>
                    <?php } else{ echo '<p> Bạn Chưa Thể Gửi Feedback lúc này, Hãy Feedback sau khi trải nghiệm trực tiếp tại căn hộ</p><br>'; 
                            echo '<p>Chủ nhà sẽ quét mã QR code xác thực khi bạn trải nghiệm trực tiếp, khi đó bạn có thể đưa ra nhận xét khách quan, chính xác. Tránh thông tin thất thiệt.</p>';}?>
                </div>
                <?php if($data["QR"]!=-1){ ?>
                <div class="tab-pane" id="qr" role="tabpanel" aria-labelledby="qr">
                    <center>
                    <?php echo $data["QR"]; ?>
                    <!-- <img src="https://api.qrserver.com/v1/create-qr-code/?data=HelloWorld&amp;size=50%x50%" alt="" title="QR Code" /> -->
                    <h3>Bạn hãy đưa cho chủ nhà quét mã này để tiến hành xác nhận</h3>
                    </center>
                </div>
                <?php }?>

            </div>
        </div>
    </div>


<!-------END COTENT------->

<?php require_once "./mvc/view/Sub-view/footer.php"; ?>
</body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="/NhaTro/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="	sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
<script>
    function CheckDate()
    {
        var datet = document.getElementById("datetimepicker");
        if(datet.value == "")
        {
            document.getElementById("plsSelectDate").innerHTML = "Pls select date";
        }
        else document.getElementById("plsSelectDate").innerHTML = "";
        //alert(datet.value);
    }
</script>