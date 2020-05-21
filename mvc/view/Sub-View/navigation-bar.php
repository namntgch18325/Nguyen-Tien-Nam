 <!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-dark  fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="/NhaTro/Home">Rental<span>.Service</span> </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#signup" id="setColor">Trang chủ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#signup"id="setColor">Thông tin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#signup"id="setColor">Địa chỉ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#signup"id="setColor">RS Coin: <?php if(isset($_SESSION["RS_Coin"])) echo $_SESSION["RS_Coin"]; ?></a>
          </li>
          <?php
          if(isset($_SESSION["name"])){ ?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="/NhaTro/Logout"id="setColor">Đăng Xuất</a>
          </li>
          <li class="nav-item" id="img-login">
            <a class="nav-link js-scroll-trigger" href="#signin"id="setColor"><img src="
            <?php 
            $url = "/NhaTro/img/user.png";
            if(isset($_SESSION["avartar"]))
            echo $_SESSION["avartar"];
            else echo $url;
            ?>" width="30px" class="rounded-circle text-center" id="img"><?=$_SESSION["name"]?></a>
          </li>
          <?php } else {?>
            <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="/NhaTro/Login"id="setColor">Đăng Nhập</a>
          </li><?php }?>
        </ul>
      </div>
    </div>
</nav>