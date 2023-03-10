<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        
    <!-- icon css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">        
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />    
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- visco css-->
    <link href="assets/css/visco/classroom.css" rel="stylesheet" type="text/css" />
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- Sweet Alert-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
       
    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>    
    <!-- Sweet Alerts js -->
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>   
    <!--ezhelp-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://939.co.kr/runezhelp.js" charset="utf-8"></script>
    <script src="https://hiserver.co.kr/runezchat.js" charset="utf-8"></script>
    <!-- kakao chat-->
    <script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>  
    <!-- apexcharts -->
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>
    <!--_page.js-->
    <script src="assets/js/_page.js"></script>
    
    <script>
        window.name ="IV_Parent";

        function openIV_iPin(){
            // window.open('', 'popupIPIN2', 'width=450, height=550, top=100, left=100, fullscreen=no, menubar=no, status=no, toolbar=no, titlebar=yes, location=no, scrollbar=no');
            var status = 'width=450, height=550, top=100, left=100, fullscreen=no, menubar=no, status=no, toolbar=no, titlebar=yes, location=no, scrollbar=no';
            window.open('', 'IV_iPin', status);

            document.form_ipin.action = "https://cert.vno.co.kr/ipin.cb";
                document.form_ipin.target = "IV_iPin";
            // document.form_ipin.submit();
        }

        function openIV_Mobile(){

            var status = 'width=425, height=550, resizable=0, scrollbars=no, status=0, titlebar=0, toolbar=0, left=435, top=250';

            window.open('', 'IV_Mobile', status);
                    
            document.form_mobile.action = 'https://www.mobile-ok.com/popup/common/hscert.jsp';
            document.form_mobile.target = 'IV_Mobile';
        }

        $(document).ready(function(){
            $("#video").click(function(){
                var w = '1630';
                var h = '768';                
                var xPos = (document.body.offsetWidth/2) - (w/2); // ????????? ??????
	            xPos += window.screenLeft; // ?????? ???????????? ???
	            var yPos = (document.body.offsetHeight/2) - (h/2);
                yPos += window.screenTop;

                var url = "video/view.html";
                var title = "??????";
                var status = "resizable=no,status=no,menubar=no,toolbar=no,width="+w+", height="+h+", left="+xPos+", top="+yPos+""; 
                
                window.open(url,title,status); 
                
                
            })
        })

    </script>

    <?php
    //header("Content-type: text/html; charset=euc-kr");
      //?????????
      $modulePath = "./IV_iPIN_Lib/IPIN2Client_linux_x64";                    // IPIN ????????? ???????????? (??????:755)
      $siteCode = "EG66";		
      $sitePW = "Online1!";		
      $cpCode = `$modulePath SEQ $siteCode`;                                  // CP?????? ????????? ????????????(`) ??????
      $returnURL = "http://onelineedu.kr:30080/temp/IV/IV_iPin_Process.php";          // ????????? ?????? ???????????? URL
        $encryptData = `$modulePath REQ $siteCode $sitePW $cpCode $returnURL`;  // ????????????(`) ??????
      $result = "";		

      session_start();

      $_SESSION['cpCode'] = $cpCode;  // ????????????????????? ????????? ???????????? ?????? ?????? ??????

        if ($encryptData == -9)
      {
        $result = "????????? ??????: ????????? ?????????, ????????? ?????????????????? ????????? ???????????? ????????? ????????? ????????????.";
      } else {
        $result = "????????? ????????? ???????????? ???????????? ??????, ????????? ?????? ?????? ???????????? ?????? ??? NICE???????????? ?????? ??????????????? ????????? ?????????.";
      }    
      $requestDate = date("ymdHis");                                            // ?????? ??????
      $uniqueCode = str_pad(mt_rand(0, 999999999), 9, '0', STR_PAD_BOTH);       // ????????????ID ???????????? ????????? ?????? ?????? ??????
      $tradeCode = $requestDate.$uniqueCode;                                    // ????????????????????? ?????? 40byte ???????????? ???????????? ?????? ????????????
      $cpCode = "01001";                                                        // ????????? ?????? ??????
      $cpID = "oneline";                                                        // ????????? ID
      $returnURL = "http://onelineedu.kr:30080/temp/IV/IV_Mobile_Process.php";  // ????????? ?????? ???????????? URL
      $_SESSION['tradeCode'] = $tradeCode;  // ?????????????????? ?????? ??????  
      /*
      
      $crypt = new Crypt();
      $requestInfo = $cpCode."/" .$tradeCode. "/" .$requestDate;                         // ?????????????????? : ???????????????/??????????????????/????????????
      $encryptData = $crypt -> encrypt($requestInfo, "./IV_Mobile_Lib/onelineCert.der");  // ??????????????? = encrypt(????????? ?????? ???, ????????? ??????)
    
      if($encryptData == false) {
            echo $crypt -> ErrorCode;
      }
      */
      
    ?>

    <title>???????????????</title>
  </head>
  <body>    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    
    
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->    

    <main>
      <!-- GNB START-->
      <div class="container px-0">                        
        <nav class="navbar navbar-expand-lg navbar-light">
            <!-- Logo START -->
            <a class="navbar-brand" href="index.html">
              <!--img class="light-mode-item navbar-brand-item" src="assets/images/logo.svg" alt="logo"-->
              <!--img class="dark-mode-item navbar-brand-item" src="assets/images/logo-light.svg" alt="logo"-->
              <img class="dark-mode-item navbar-brand-item" src="assets/images/logo.png" alt="logo"><span class="fw-bold">???????????????</span>
            </a>

            <!-- Nav Search START mobile -->
            <div class="nav my-3 my-xl-0 align-items-center d-none d-sm-block d-md-block d-lg-none">
              <div class="nav-item w-100">
                <form class="position-relative">
                  <input class="form-control pe-5 bg-transparent" type="search" aria-label="Search">
                  <button class="bg-transparent p-2 position-absolute top-50 end-0 translate-middle-y border-0 text-primary-hover text-reset" type="submit">
                    <i class="bi bi-search"></i>
                  </button>
                </form>
              </div>
            </div>
            <!-- Nav Search END -->
            <!-- ???????????? mobile-->
            <div class="d-none d-sm-block d-md-block d-lg-none">
              <button type="button" onclick="location.href='education_inquiry.html'" class="btn btn-primary btn"><i class="bi bi-pencil-square"></i>  ?????? ??????</button>
            </div>

            <!-- Logo END -->              
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>           

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item pe-2">
                    <a class="nav-link text-primary fw-bold" href="classroom.php">??????????????????</a>
                </li>
                <li class="nav-item pe-2">
                    <a class="nav-link" href="endClassroom.html">??????????????????</a>
                </li>                
              </ul>
              <!-- PC -->
              <!-- Nav Search START -->
              <div class="nav my-3 my-xl-0 px-4 flex-nowrap align-items-center d-none d-lg-block">
                <div class="nav-item w-100">
                  <form class="position-relative">
                    <input class="form-control pe-5 bg-transparent" type="search" aria-label="Search">
                    <button class="bg-transparent p-2 position-absolute top-50 end-0 translate-middle-y border-0 text-primary-hover text-reset" type="submit">
                      <i class="bi bi-search"></i>
                    </button>
                  </form>
                </div>
              </div>
              <!-- Nav Search END -->
              <!-- ???????????? -->
              <div class="d-none d-lg-block">
                <button type="button" onclick="location.href='education_inquiry.html'" class="btn btn-primary btn"><i class="bi bi-pencil-square"></i>  ?????? ??????</button>
              </div>
              
            </div>            
        </nav>
      </div>
      <!-- GNB END-->

      <!-- USER START -->      
      <div class="" style="background-color: #00287A;">
        <div class="container px-4 px-lg-0">  
          <div class="row py-4 text-md-start">
            <div class="col mb-4 mb-md-0">
              <h3 class="text-white mb-1">???????????? ???????????????.</h3>
              <p class="text-white mb-1 pt-2 pb-2">??????????????? ??????????????? ??????????????? ???????????? ???????????? ???????????????.</p>
              <p class="text-white mb-1 ">
                <span>???????????? : </span>1??? &nbsp;&nbsp;&nbsp;<span>??????(??????)??? : </span>
                <span data-bs-container="body" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-content="???????????? ?????? ??????????????? ????????????.">2???</span>
              </p>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="row justify-content-end text-end">
                <div class="">                  
                  <!--span class="pe-1"><button type="button" class="btn btn-outline-light" onclick = "location.href='find_id.html'"><i class="bi bi-person"></i><span class="px-2">???????????? ??????</span></button></!--span-->
                  <span class="pe-1"><button type="button" class="btn btn-outline-light"><i class="bi bi-box-arrow-right"></i><span class="px-2">????????????</span></button></span>
                </div>                
              </div>              
            </div>
            <div class="row mx-0 justify-content-end"> 
              <div class="col-2">                
                <div id="chart" class="apex-charts"></div>
              </div>
              <div class="col text-end align-self-center">
                <button type="button" class="btn btn-outline-light me-2 px-2" onclick = "location.href='mypage.html'"><i class="bi bi-person-bounding-box fs-1"></i><br /><span class="">???????????????</span></button>
                <button type="button" class="btn btn-outline-light me-2 px-4"><i class="bi bi-bookmark-dash-fill fs-1"></i><br /><span class="">?????????</span></button>
                <button type="button" class="btn btn-outline-light px-4"><i class="bi bi-pencil fs-1"></i><br /><span class="">?????????</span></button>
                <!--button type="button" class="btn btn-outline-light"><i class="bi bi-book fs-1"></i><br /><span class="">?????? ?????????</span></button-->
              </div>              
            </div>
          </div>
        </div>
      </div>
        <!-- USER END -->      
        <!-- main START -->            
        <div class="container">
            <div class="mt-4">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-end">
                        <i class="bi bi-house-door-fill pe-2"></i>
                        <li class="breadcrumb-item text-muted">??? ?????????</a></li>            
                        <li class="breadcrumb-item active" aria-current="page">??????????????????</li>
                    </ol>
                </nav>
            </div>
            <!--???????????? ?????? card-->
            <div class="card mb-3 p-4">
                <div class="row g-0">
                    <div class="mb-2">
                        <p class="text-primary mb-0">???????????? > ????????????</p>
                        <p class="h5">Good Morning, ????????? ????????? ?????? ?????? ?????? ????????? - ?????? ???</p>                        
                    </div>
                    <div class="col-lg-2">
                        <img src="assets/images/educate/NoPath_detail.png" class="img-fluid rounded-start" />
                    </div>
                    <div class="col-lg-10">
                        <div class="card-body pt-2">
                            <div class="row">
                                <div class="col-auto">
                                    <p class="text-muted mb-1">????????????</p>
                                    <p class="text-muted mb-1">??????(??????)</p>
                                    <p class="text-muted mb-1">????????????</p>
                                    <p class="text-muted mb-1">????????????</p>
                                </div>
                                <div class="col">
                                    <p class="mb-1">2020.11.10 - 2020.12.09</p>
                                    <p class="mb-1">????????? 80% ?????? ??????</p>
                                    <p class="mb-1">2021.12.09</p>
                                    <p class="waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".instructor-0">??? ??????</p>
                                </div>                                
                                <div class="col-3 border-start border-dark">
                                    <h5><span class="badge bg-danger">?????????</span></h5>
                                    <p class="mb-0 text-secondary">???????????????</p>
                                    <span>2021.12.01 13:21 (?????? D-8)</span>
                                    <p class="mb-0 text-secondary">?????????</p>
                                    <span class="h4">80%</span>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col text-start">
                                    <button class="btn btn-outline-dark"><i class="bi bi-folder-fill pe-3"></i>????????????</button>
                                </div>
                                <div class="col text-end">
                                    <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_1" aria-expanded="false" aria-controls="collapse_1">?????? ??????<i class="bi bi-caret-down-fill ps-3"></i></button>                                    
                                </div>
                            </div>                        
                        </div>                    
                    </div>
                    <div class="collapse" id="collapse_1">
                        <div class="card card-body border-0">
                            <div>
                                <table class="table table-bordered">                                
                                    <tbody class="text-center align-middle">
                                        <tr>
                                            <td rowspan="4" style="background-color: #00287A;"><span class="text-white">????????????</span></td>
                                            <td style="background-color: #F0F3F7;">????????????</td>
                                            <td>80%??????</td>                              
                                            <td rowspan="4">????????? ??????,?????? ?????? <br/> ?????? 60??? ??????</td>
                                        </tr>                                    
                                        <tr>                                        
                                            <td style="background-color: #F0F3F7;">????????????</td>
                                            <td>100??? ??? 10%??????</td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #F0F3F7;">????????????</td>
                                            <td>100??? ??? 90%??????</td>
                                        </tr>                                                                                                 
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <table class="table table-bordered border-1 align-middle">
                                    <tbody>
                                        <tr style="background-color: #F2F2F2;">
                                            <td class="text-center">1??????</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">???????????? ??????</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">80%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button id="video"  type="button" class="btn btn-outline-dark btn-lg">????????????</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr style="background-color: #F2F2F2;">
                                            <td class="text-center">2??????</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">???????????? ??????</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">100%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-dark btn-lg">????????????</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr style="background-color: #F2F2F2;">
                                            <td class="text-center">3??????</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">???????????? ??????</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 91%;" aria-valuenow="91" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">91%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-dark btn-lg">????????????</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr class="" style="background-color: #F2F2F2;">
                                            <td class="text-center">????????????</td>
                                            <td class="row border-0">
                                                <div class="col my-auto">
                                                    <p class="mb-0"><span class="fw-bold">68???</span>(??? ?????? ???????????????.)</p>                                                    
                                                </div>    
                                                <div class="col-3 text-end my-auto">
                                                    <p class="mb-0">???????????? : 2022.02.28 06:20</p>
                                                </div>                                                                                  
                                                <div class="col-2 text-end">                                                    
                                                    <button type="button" class="btn btn-outline-dark btn-lg waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".evaluation-notice">??? ??????</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">5??????</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">???????????? ??????</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">30%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-primary btn-lg" data-bs-toggle="modal" data-bs-target=".hrdk-motp-modal">????????????</button>                                                    
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">6??????</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">???????????? ??????</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">0%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-primary btn-lg disabled">????????????</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">7??????</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">???????????? ??????</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">0%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-primary btn-lg disabled">????????????</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">8??????</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">???????????? ??????</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">0%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-primary btn-lg disabled">????????????</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">????????????</td>
                                            <td class="row border-0">
                                                <div class="col my-auto">
                                                    <p class="mb-0">????????? ????????? ?????? ????????? ????????? ???????????????.</p>                                                                       
                                                </div>    
                                                <div class="col-2 text-end my-auto">
                                                    <p class="mb-0">???????????? : 80???</p>                                                    
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-dark btn-lg disabled">????????????</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">????????????</td>
                                            <td class="row border-0">
                                                <div class="col my-auto">
                                                    <p class="mb-0"></p>                                                                       
                                                </div>    
                                                <div class="col-2 text-end my-auto">
                                                    <p class="mb-0"></p>                                                    
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-primary btn-lg" data-bs-toggle="modal" data-bs-target=".evaluation-assignment">????????????</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>                            
                        </div>
                    </div>  
                </div>
            </div>            
            <!-- ?????? modal -->
            <div class="modal fade instructor-0" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <div class="modal-title row">
                                <div class="col-auto">
                                    <img src="assets/images/classroom/NoPath.png" class="rounded avatar-sm">
                                </div>
                                <div class="col">
                                    <p class="mb-0 h5">?????????</p>
                                    <span>???????????? > ????????????</span>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-primary">?????????, ?????????, ????????? <br /> ????????? ??????????????? PR????????? ???????????????.</p>
                            <div>
                                <p class="text-secondary">?????? ??? ??????</p>
                                <ul class="px-3">
                                    <li>?????? ?????????????????? ??????</li>
                                    <li>??????????????? ?????????????????? ??????</li>
                                    <li>???) ??????</li>
                                    <li>???) ??????????????? ????????? ??????</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal -->

            <!--  ?????? ???????????? Modal -->
            <div class="modal fade evaluation-notice" tabindex="-1" role="dialog" aria-labelledby="evaluationNoticeLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header container">
                            <h1 class="modal-title" id="evaluationNoticeLabel">???????????? <span class="text-danger">????????????</span></h1>
                            <button type="button" class="btn-close display-5" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div style="background-color: #F2F2F2;">
                            <div class="modal-body container mt-5">
                                <p class="text-center"><i class="bi bi-exclamation-triangle display-2 text-danger"></i></p>
                                <div>
                                    <p>1. ??????????????? <span class="bb-red">?????? ??????????????? ????????????.</span></p>
                                    <p>2. ??????????????? <span class="text-danger">1?????? ?????? ????????????, ????????? ??????</span>?????????.</p>
                                    <p>3. <span class="text-danger">????????? PC?????? ??????</span>?????? ?????????, ????????? ???????????? ????????? ?????? ????????? ?????? ??????????????? ????????????.</p>
                                    <p>4. <span class="text-danger">???????????? ???????????? ??????</span> ??? ?????????????????? ?????? ????????? ???????????????.</p>
                                    <p>5. ??????????????? ?????? ?????? ????????? ??????????????? ????????? ????????????<span class="text-danger">????????? ???????????? ?????? ??????</span>?????????.</p>
                                    <p>6. ??????????????? ????????? ?????? ?????? ????????? ???????????????. ??????????????? ???????????? ???????????? ????????????.</p>
                                    <p>7. ?????? ????????? ??????????????? ????????????, <span class="text-danger">????????? ????????? ??? ??????</span>?????????.</p>
                                </div>
                            </div>
                        </div>                        
                        <div class="container">
                            <!-- ???????????? -->
                            <div class="text-end my-4 text-secondary">
                                <input type="checkbox" class="form-check-input h2" id="rememberCheck" checked>
                                <label class="form-check-label pt-2" for="rememberCheck">??? ???????????? ?????? ??? ????????? ?????? ????????? ????????? ??????????????????.</label>
                            </div>   
                            <!-- ???????????? -->
                            <div class="text-center">                                                    
                                <button type="button" class="btn btn-primary btn-lg px-5 py-2 waves-effect waves-light evaluation-apply" data-bs-toggle="modal" data-bs-target=".evaluation-detail">????????????</button>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <!--  ?????? Modal1 -->
            <div id="evaluation-detail" class="modal evaluation-detail" tabindex="-1" role="dialog" aria-labelledby="evaluationDetailLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header container">
                            
                            <div class="modal-title" id="evaluationDetailLabel">
                                <p class="h5 text-primary">????????????</p>
                                <p class="h1">??????CS A?????? Z??????</p>
                            </div>
                            <button type="button" class="btn-close display-5" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div style="background-color: #F2F2F2;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-3 bg-primary py-2">
                                        <div class="row">
                                            <div class="col-4 text-center align-self-center">
                                                <a class="d-block text-white">
                                                    <div class="rounded display-6">
                                                        <i class="bi bi-stopwatch-fill"></i>
                                                    </div>
                                                    <div class="name">????????????</div>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <p class="text-white display-3 mb-0 fw-bold countdown">59:59</p>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="col align-self-center">
                                        <ul class="pt-4">
                                            <li>????????? <span class="text-danger">1??? ????????? ??????</span>??????, ??????????????? ???????????? ?????? ??????????????? ???????????? ?????? ???????????? ?????????.</li>
                                            <li><span class="text-danger">???????????? ?????????</span>????????? ????????? ??????????????? ????????????.</li>
                                        </ul>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <!-- ???????????? -->
                            <div class="row">
                                <div class="col" id="evaluation-body">
                                    <div class="evaluation1">
                                        <div class="mt-5">
                                            <div class="mb-3">
                                                <p class="h3">?????? 4</p>
                                            </div>
                                            <div>
                                                <p class="mb-0 h5">?????? ??? ?????? ????????? ?????? ???????????? ?????? ??????? (?????? : 10)</p>
                                                <ul class="list-group mt-2">
                                                    <li class="list-group-item border-0 p-0 py-1">
                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio4" id="Q4_1">
                                                        <label class="form-check-label" for="Q4_1">1. ?????? ????????? ????????? ??????</label>
                                                    </li>
                                                    <li class="list-group-item border-0 p-0 py-1">
                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio4" value="" id="Q4_2">
                                                        <label class="form-check-label" for="Q4_2">2. ?????????????????? ?????? ???????????? ?????? ??????</label>
                                                    </li>
                                                    <li class="list-group-item border-0 p-0 py-1">
                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio4" value="" id="Q4_3">
                                                        <label class="form-check-label" for="Q4_3">3. ?????? ????????? ???????????? ?????? 90??? ?????? ??????</label>
                                                    </li>
                                                    <li class="list-group-item border-0 p-0 py-1">
                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio4" value="" id="Q4_4">
                                                        <label class="form-check-label" for="Q4_4">4. ?????? ?????? 30??? ????????? ??????</label>
                                                    </li>                                    
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="mt-5">
                                            <div class="mb-3">
                                                <p class="h3">?????? 5</p>
                                            </div>
                                            <div>
                                                <p class="mb-0 h5">???????????? ??????????????? ?????? ????????? ??? ?????? ??????? (?????? : 10)</p>
                                                <ul class="list-group mt-2">
                                                    <li class="list-group-item border-0 p-0 py-1">
                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio5" value="" id="Q5_1">
                                                        <label class="form-check-label" for="Q5_1">1. ?????? ??? ??????</label>
                                                    </li>
                                                    <li class="list-group-item border-0 p-0 py-1">
                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio5" value="" id="Q5_2">
                                                        <label class="form-check-label" for="Q5_2">2. ?????? ??? ??????</label>
                                                    </li>
                                                    <li class="list-group-item border-0 p-0 py-1">
                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio5" value="" id="Q5_3">
                                                        <label class="form-check-label" for="Q5_3">3. ????????? ??? ?????????</label>
                                                    </li>
                                                    <li class="list-group-item border-0 p-0 py-1">
                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio5" value="" id="Q5_4">
                                                        <label class="form-check-label" for="Q5_4">4. ?????????</label>
                                                    </li>                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="evaluation2" style="display:none;">
                                        <div class="mt-5">
                                            <div class="mb-3">
                                                <p class="h3">?????? 12</p>
                                            </div>
                                            <div>
                                                <p class="mb-0 h5">??????????????? ???????????? ?????? ??? ????????? ??????? (?????? : 10)</p>
                                                <ul class="list-group mt-2">
                                                    <li class="list-group-item border-0 p-0 py-1">
                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio12" id="Q12_1">
                                                        <label class="form-check-label" for="Q12_1">1. ????????? ????????? ?????? ???????????? ????????? ??????</label>
                                                    </li>
                                                    <li class="list-group-item border-0 p-0 py-1">
                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio12" value="" id="Q12_2">
                                                        <label class="form-check-label" for="Q12_2">2. ????????? ???????????? ???????????? ?????? ????????? ???????????? ?????? ???????????? ????????? ???????????? ?????????.</label>
                                                    </li>
                                                    <li class="list-group-item border-0 p-0 py-1">
                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio12" value="" id="Q12_3">
                                                        <label class="form-check-label" for="Q12_3">3. ????????? ???????????? ??? ????????? ?????? ?????? ???????????? ???????????? ????????? ?????? ????????? ???????????? ????????? ??????????????? ????????????</label>
                                                    </li>
                                                    <li class="list-group-item border-0 p-0 py-1">
                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio12" value="" id="Q12_4">
                                                        <label class="form-check-label" for="Q12_4">4. ????????? ???????????? ????????? ?????? ????????? ?????? ????????????</label>
                                                    </li>                                    
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="mt-5">
                                            <div class="mb-3">
                                                <p class="h3">?????? 13</p>
                                            </div>
                                            <div>
                                                <p class="mb-0 h5">???????????? ??????????????? ?????? ????????? ??? ?????? ??????? (?????? : 10)</p>
                                                <ul class="list-group mt-2">
                                                    <li class="list-group-item border-0 p-0 py-1">
                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio13" value="" id="Q13_1">
                                                        <label class="form-check-label" for="Q13_1">1. ?????? ??? ??????</label>
                                                    </li>
                                                    <li class="list-group-item border-0 p-0 py-1">
                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio13" value="" id="Q13_2">
                                                        <label class="form-check-label" for="Q13_2">2. ?????? ??? ??????</label>
                                                    </li>
                                                    <li class="list-group-item border-0 p-0 py-1">
                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio13" value="" id="Q13_3">
                                                        <label class="form-check-label" for="Q13_3">3. ????????? ??? ?????????</label>
                                                    </li>
                                                    <li class="list-group-item border-0 p-0 py-1">
                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio13" value="" id="Q13_4">
                                                        <label class="form-check-label" for="Q13_4">4. ?????????</label>
                                                    </li>                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="col-4 mt-5">
                                    <div class="d-flex align-items-start">
                                        <div class="card text-center mx-0">                                
                                            <div class="card-body p-2" style="min-height: 2.3125rem;">                                  
                                                <p class="card-text"></p>                                  
                                            </div>
                                            <div class="card-footer text-muted py-1 px-2">?????? 01</div>
                                        </div>
                                        <div class="card text-center">                                
                                            <div class="card-body p-2" style="min-height: 2.3125rem;">    
                                                <p class="card-text"></p>                                  
                                            </div>
                                            <div class="card-footer text-muted py-1 px-2">?????? 02</div>
                                        </div>
                                        <div class="card text-center">                                
                                            <div class="card-body p-2" style="min-height: 2.3125rem;">    
                                                <p class="card-text"></p>                                  
                                            </div>
                                            <div class="card-footer text-muted py-1 px-2">?????? 03</div>
                                        </div>
                                        <div class="card text-center">                                
                                            <div class="card-body p-2" style="min-height: 2.3125rem;">    
                                                <p class="card-text"></p>                                  
                                            </div>
                                            <div class="card-footer text-muted py-1 px-2">?????? 04</div>
                                        </div>
                                        <div class="card text-center">                                
                                            <div class="card-body p-2" style="min-height: 2.3125rem;">    
                                                <p class="card-text"></p>
                                            </div>
                                            <div class="card-footer text-muted py-1 px-2">?????? 05</div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-start">
                                        <div class="card text-center">                                
                                            <div class="card-body p-2" style="min-height: 2.3125rem;">    
                                                <p class="card-text">2</p>                                  
                                            </div>
                                            <div class="card-footer text-muted py-1 px-2">?????? 06</div>
                                        </div>
                                        <div class="card text-center">                                
                                            <div class="card-body p-2">                                  
                                                <p class="card-text">1</p>                                  
                                            </div>
                                            <div class="card-footer text-muted py-1 px-2">?????? 07</div>
                                        </div>
                                        <div class="card text-center">                                
                                            <div class="card-body p-2">                                  
                                                <p class="card-text">3</p>                                  
                                            </div>
                                            <div class="card-footer text-muted py-1 px-2">?????? 08</div>
                                        </div>
                                        <div class="card text-center">                                
                                            <div class="card-body p-2">                                  
                                                <p class="card-text">3</p>                                  
                                            </div>
                                            <div class="card-footer text-muted py-1 px-2">?????? 09</div>
                                        </div>
                                        <div class="card text-center">                                
                                            <div class="card-body p-2">                                  
                                                <p class="card-text">1</p>
                                            </div>
                                            <div class="card-footer text-muted py-1 px-2">?????? 10</div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-start">
                                        <div class="card text-center">                                
                                            <div class="card-body p-2">                                  
                                                <p class="card-text">2</p>                                  
                                            </div>
                                            <div class="card-footer text-muted py-1 px-2">?????? 11</div>
                                        </div>
                                        <div class="card text-center">                                
                                            <div class="card-body p-2">                                  
                                                <p class="card-text">1</p>                                  
                                            </div>
                                            <div class="card-footer text-muted py-1 px-2">?????? 12</div>
                                        </div>
                                        <div class="card text-center">                                
                                            <div class="card-body p-2">                                  
                                                <p class="card-text">3</p>                                  
                                            </div>
                                            <div class="card-footer text-muted py-1 px-2">?????? 13</div>
                                        </div>                            
                                    </div>
                                </div>
                            </div>
                            <!-- ???????????? -->
                            <div class="text-center my-4">
                                <button type="button" class="btn btn-outline-primary btn-lg py-2 waves-effect waves-light me-2 evaluation-prev"><i class="bi bi-caret-left-fill pe-2"></i>??????</button>
                                <button type="button" class="btn btn-primary btn-lg px-5 py-2 waves-effect waves-light disabled">????????????</button>
                                <button type="button" class="btn btn-outline-primary btn-lg py-2 waves-effect waves-light ms-2 evaluation-next">??????<i class="bi bi-caret-right-fill ps-2"></i></button>
                            </div>
                            
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <!--  ???????????? ???????????? Modal -->
            <div class="modal fade evaluation-assignment" tabindex="-1" role="dialog" aria-labelledby="evaluationAssignmentLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header container">
                            <h1 class="modal-title" id="evaluationAssignmentLabel">???????????? <span class="text-danger">????????????</span></h1>
                            <button type="button" class="btn-close display-5" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div>
                            <div style="background-color: #F2F2F2;">
                                <div class="modal-body container mt-4">
                                    <p class="text-center"><i class="bi bi-exclamation-triangle display-2 text-danger"></i></p>
                                    <div>
                                        <p>1. ????????? <span class="bb-danger">1?????? ?????? ??????</span>??????, ???????????? ?????? ??????????????? ????????? ???????????? ????????? ???????????????.</p>
                                        <p>2. ??????????????? ?????? ???????????? <span class="text-danger">???????????? ????????? ??????</span>?????? ??????????????? ?????? ????????? ???????????????.</p>
                                        <p>3. ????????? 2??? ????????? ????????? ???????????? ?????? ????????? ??? ????????? ????????? ??????, ???????????? ????????? ?????? ????????? ??????????????? ????????? ??? ???????????? ????????? ????????????.</p>
                                        <p>4. ?????? ????????? ?????? ?????? ????????? ???????????????.<span class="text-danger">??????????????? ???????????? ??????</span>?????? ????????????.</p>
                                        <p>5. ?????? ????????? ??????????????? ????????????,<span class="text-danger">????????? ????????? ??? ??????</span>?????????.</p>
                                        <p>6. ????????? ?????? <span class="text-danger">???????????? ????????????</span>?????????. ???????????? ??????????????? ??? ???????????? ????????? ????????????.</p>                                    
                                    </div>
                                    <div class="mt-2">
                                        <p class="text-danger mb-0 h4">???????????????????</p>
                                        <p>????????? ??? ????????? ?????? ????????? ????????? ????????? ??????????????? ?????? ???????????? ???????????? ????????? ????????? ?????????.</p>
                                        <p>1. ???????????? ???????????? : <span>??????(?????????)</span></p>
                                        <p>2. ???????????? ????????????</p>
                                        <ul>
                                            <li>
                                                <p>?????? ????????? ????????? ?????? ??????, ????????? ????????? ??? ?????? ?????? ?????????, ?????????, ?????????????????? ???????????? ????????? ???????????? ?????????.</p>
                                                <p>(???, ???????????? ???????????? ?????? ?????? ???????????? ????????? ??????, ??? ?????? ?????? ???????????? ????????? ???????????? ??????????????? ????????????.)</p>
                                            </li>
                                            <li>
                                                <p>????????? ??? ?????? ????????? <span class="text-danger">90%?????? ??????</span>??? ??????</p>
                                            </li>
                                            <li>
                                                <p>??????, ????????????, ???????????? ??? <span class="text-danger">????????? ??????????????? ??????</span>??? ??????</p>
                                            </li>
                                            <li>
                                                <p>????????? ?????? ????????? ????????? ????????? ????????? ????????? ????????? ??????</p>
                                            </li>
                                            <li>
                                                <p>????????? ?????????, ?????? ?????????, ?????????????????? ?????? ?????? ????????? ????????? 80%?????? ????????? ??????</p>
                                            </li>
                                        </ul>
                                        <p>3. ???????????? ?????? ??????</p>
                                        <ul>
                                            <li><p class="text-danger">?????? ?????? ??? ????????? 0??? ????????????, ???????????? ?????? ????????? ?????? 0??? ????????????.</p></li>
                                        </ul>
                                        <p>4. ???????????? ?????? ??????</p>
                                        <ul>
                                            <li>
                                                <p>???????????? ??????????????? ????????????.</p>
                                            </li>
                                            <li>
                                                <p>????????? ????????? ??? <span class="text-danger">???????????? 90%??????</span>??? ???????????? ??????????????? 1??? ????????? ??????</p>
                                            </li>
                                            <li>
                                                <p>????????? ???????????? ???????????? ?????? ???????????? ??????????????? ????????????, ??????????????? ?????? ????????? ????????? ??? ????????? ????????????.</p>
                                            </li>
                                            <li>
                                                <p>???????????? ??? ?????????????????? 2??? ????????? ??????.</p>
                                            </li>
                                            <li>
                                                <p>??????????????? ???????????? ??????????????? ????????????, ???????????? ????????? ?????? ????????????.</p>
                                            </li>
                                            <li>
                                                <p class="text-danger">??????????????? ?????? ?????????????????? ?????? ?????? ??? ????????? ?????? 0??? ????????????.</p>
                                            </li>
                                        </ul>                                    
                                    </div>
                                </div>
                            </div>                            
                            <div class="container">
                                <!-- ???????????? -->
                                <div class="text-end my-4 text-secondary">
                                    <input type="checkbox" class="form-check-input h2" id="rememberCheck" checked>
                                    <label class="form-check-label pt-2" for="rememberCheck">??? ???????????? ?????? ??? ????????? ?????? ????????? ????????? ??????????????????.</label>
                                </div>   
                                <!-- ???????????? -->
                                <div class="text-center">                                                    
<<<<<<< HEAD:classroom.php
                                    <button type="button" class="btn btn-primary btn-lg px-5 py-2 waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".assignment-detail">????????????</button>
                                </div>
                            </div>
                        </div>                                                
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->  
            <!--  ???????????? Detail Modal1 -->
            <div id="assignment-detail" class="modal assignment-detail" tabindex="-1" role="dialog" aria-labelledby="assignmentDetailLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header container">                            
                            <div class="modal-title" id="assignmentDetailLabel">
                                <p class="h5 text-primary">????????????</p>
                                <p class="h1">??????CS A?????? Z??????</p>
                            </div>
                            <button type="button" class="btn-close display-5" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div style="background-color: #F2F2F2;">
                            <div class="container">
                                <div class="text-center mt-3">
                                    <p class="mb-0">??????????????? <span class="text-danger">1?????? ??????</span>??????, ???????????? ????????? ???????????? ??????????????????.</p>
                                    <p>???????????? ???????????? ???????????? ????????? ???????????????, ???????????? ?????? ??? <span class="text-danger">??????????????? ??????</span>????????? ?????????.</p>                                    
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <!-- ???????????? -->                                                            
                            <div class="mt-5">
                                <div class="mb-3">
                                    <p class="h3">?????? 1</p>
                                </div>
                                <div>
                                    <p class="mb-0 h5">?????? ??? ????????????????????? ???????????? ????????? ?????? ???????????????.</p>
                                    <div class="my-2">
                                        <textarea class="form-control" rows="20"></textarea>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <div class="d-flex">
                                            <p class="align-self-center mb-0 h5 me-3">?????? ????????????</p>
                                            <label for="formFileLg" class="btn btn-outline-primary btn-file mb-0">????????????</label>
                                            <input id="formFileLg" type="file" style="display: none;">
                                        </div>                                        
                                    </div>
                                </div>
                                <div style="background-color: #F2F2F2;">
                                    <ul class="py-4">
                                        <li>
                                            <p class="mb-0">????????? ???????????? ?????? 2??? ????????? ????????? ???????????? 1?????? ????????? ??????????????? ?????????.</p>
                                        </li>
                                        <li>
                                            <p class="mb-0">??????????????? ???????????? <span class="text-danger">??????</span>??? ????????? ?????? ???????????????.</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- ???????????? -->
                            <div class="text-center my-4">                                
                                <button type="button" class="btn btn-outline-primary btn-lg px-5 py-2 waves-effect waves-light">????????????</button>
                                <button type="button" class="btn btn-primary btn-lg px-5 py-2 waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".course-poll">????????????</button>
                            </div>                            
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!--  ?????? ???????????? Modal1 -->
            <div class="modal course-poll" tabindex="-1" role="dialog" aria-labelledby="pollLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header container">                            
                            <div class="modal-title" id="pollLabel">                                
                                <p class="h1">?????? ????????????</p>
                            </div>
                            <button type="button" class="btn-close display-5" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div style="background-color: #F2F2F2;">
                            <div class="container">                                                                           
                                <div class="text-center mt-3">
                                    <p class="mb-0">????????? ????????? ?????? ?????????????????????.</p>
                                    <p>????????? ???????????? ??? ??????????????????, ??????????????? <span class="text-danger">??????????????? ????????? </span>?????? ?????? ???????????? ???????????????.</p>                                    
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <!-- ???????????? -->                                                            
                            <div class="mt-5">
                                <div class="mb-3">
                                    <p class="h3">?????? 1</p>
                                </div>
                                <div>
                                    <p class="mb-0 h5">??? ????????? ???????????? ??????????????? ???????????????????</p>
                                    <ul class="list-group mt-2">
                                        <li class="list-group-item border-0 p-0 py-1">
                                            <input class="form-check-input me-1" type="radio" name="listGroupRadio13" value="" id="p1_1">
                                            <label class="form-check-label" for="p1_1">1. ?????? ?????????</label>
                                        </li>
                                        <li class="list-group-item border-0 p-0 py-1">
                                            <input class="form-check-input me-1" type="radio" name="listGroupRadio13" value="" id="p1_2">
                                            <label class="form-check-label" for="p1_2">2. ?????????</label>
                                        </li>
                                        <li class="list-group-item border-0 p-0 py-1">
                                            <input class="form-check-input me-1" type="radio" name="listGroupRadio13" value="" id="p1_3">
                                            <label class="form-check-label" for="p1_3">3. ????????????</label>
                                        </li>
                                        <li class="list-group-item border-0 p-0 py-1">
                                            <input class="form-check-input me-1" type="radio" name="listGroupRadio13" value="" id="p1_4">
                                            <label class="form-check-label" for="p1_4">4. ????????? ??????</label>
                                        </li>
                                        <li class="list-group-item border-0 p-0 py-1">
                                            <input class="form-check-input me-1" type="radio" name="listGroupRadio13" value="" id="p1_5">
                                            <label class="form-check-label" for="p1_5">4. ?????? ????????? ??????</label>
                                        </li>
                                    </ul>                                    
                                </div>                                
                            </div>
                            <div class="mt-5">
                                <div class="mb-3">
                                    <p class="h3">?????? 2</p>
                                </div>
                                <div>
                                    <p class="mb-0 h5">??? ????????? ??????????????? ????????? ?????? ????????? ????????? ?????????????</p>
                                    <ul class="list-group mt-2">
                                        <li class="list-group-item border-0 p-0 py-1">
                                            <input class="form-check-input me-1" type="radio" name="listGroupRadio13" value="" id="p2_1">
                                            <label class="form-check-label" for="p2_1">1. ?????? ?????????</label>
                                        </li>
                                        <li class="list-group-item border-0 p-0 py-1">
                                            <input class="form-check-input me-1" type="radio" name="listGroupRadio13" value="" id="p2_2">
                                            <label class="form-check-label" for="p2_2">2. ?????????</label>
                                        </li>
                                        <li class="list-group-item border-0 p-0 py-1">
                                            <input class="form-check-input me-1" type="radio" name="listGroupRadio13" value="" id="p3_3">
                                            <label class="form-check-label" for="p3_3">3. ????????????</label>
                                        </li>
                                        <li class="list-group-item border-0 p-0 py-1">
                                            <input class="form-check-input me-1" type="radio" name="listGroupRadio13" value="" id="p4_4">
                                            <label class="form-check-label" for="p4_4">4. ????????? ??????</label>
                                        </li>
                                        <li class="list-group-item border-0 p-0 py-1">
                                            <input class="form-check-input me-1" type="radio" name="listGroupRadio13" value="" id="p5_5">
                                            <label class="form-check-label" for="p5_5">4. ?????? ????????? ??????</label>
                                        </li>
                                    </ul>                                    
                                </div>                                
                            </div>
                            <div class="mt-5">
                                <div class="mb-3">
                                    <p class="h3">?????? 3</p>
                                </div>
                                <div>
                                    <p class="mb-0 h5">????????? ???????????? ?????? ??????????????? ????????? ?????? ???????????? ??????????????????.</p>
                                    <div class="my-2">
                                        <textarea class="form-control" rows="2"></textarea>
                                    </div>
                                </div>                                
                            </div>
                            <div class="mt-5">
                                <div class="mb-3">
                                    <p class="h3">?????? 4</p>
                                </div>
                                <div>
                                    <p class="mb-0 h5">?????? ?????????????????? ?????? ??????????????? ???????????? ??????????????????.</p>
                                    <div class="my-2">
                                        <textarea class="form-control" rows="2"></textarea>
                                    </div>
                                </div>                                
                            </div>
                            <!-- ???????????? -->
                            <div class="text-center my-4">                                                                
                                <button type="button" class="btn btn-primary btn-lg px-5 py-2 waves-effect waves-light">???????????? ??????</button>
                            </div>
                            
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal --> 
            <!--???????????? ?????? card2-->
            <div class="card mb-3 p-4">
                <div class="row g-0">
                    <div class="mb-2">
                        <p class="text-primary mb-0">???????????? > ????????????</p>
                        <p class="h5">Good Morning, ????????? ????????? ?????? ?????? ?????? ????????? - ?????? ???</p>
                    </div>
                    <div class="col-lg-2">
                        <img src="assets/images/classroom/NoPath - ????????? (16).png" class="img-fluid rounded-start" />
                    </div>
                    <div class="col-lg-10">
                        <div class="card-body pt-2">
                            <div class="row">
                                <div class="col-auto">
                                    <p class="text-muted mb-1">????????????</p>
                                    <p class="text-muted mb-1">??????(??????)</p>
                                    <p class="text-muted mb-1">????????????</p>
                                    <p class="text-muted mb-1">????????????</p>
                                </div>
                                <div class="col">
                                    <p class="mb-1">2020.11.10 - 2020.12.09</p>
                                    <p class="mb-1">????????? 80% ?????? ??????</p>
                                    <p class="mb-1">2021.12.09</p>
                                    <p class="waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".instructor-1">??? ??????</p>
                                </div>                               
                                <div class="col-3 border-start border-dark">
                                    <h5><span class="badge bg-dark">????????????</span></h5>
                                    <p class="mb-0 text-secondary">???????????????</p>
                                    <span>2021.12.01 13:21 (?????? D-8)</span>
                                    <p class="mb-0 text-secondary">?????????</p>
                                    <span class="h4">100%</span>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col text-start">
                                    <button class="btn btn-outline-dark"><i class="bi bi-folder-fill pe-3"></i>????????????</button>
                                    <button class="btn btn-outline-dark"><i class="bi bi-printer-fill pe-3"></i>???????????????</button>                                    
                                    <button type="button" class="btn btn-outline-dark waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"><i class="fas fa-book-reader pe-3"></i>????????????</button>
                                </div>
                                <div class="col text-end">
                                    <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#Collapse_123" aria-expanded="true" aria-controls="Collapse_123">?????? ??????<i class="bi bi-caret-down-fill ps-3"></i></button>                                    
                                </div>
                            </div>                        
                        </div>                    
                    </div>                    
                    <div class="collapse" id="Collapse_123">
                        <div class="card card-body border-0">
                            <div>
                                <table class="table table-bordered">                                
                                    <tbody class="text-center align-middle">
                                        <tr>
                                            <td rowspan="4" style="background-color: #00287A;"><span class="text-white">????????????</span></td>
                                            <td style="background-color: #F0F3F7;">????????????</td>
                                            <td>80%??????</td>                              
                                            <td rowspan="4">????????? ??????,?????? ?????? <br/> ?????? 60??? ??????</td>
                                        </tr>                                    
                                        <tr>                                        
                                            <td style="background-color: #F0F3F7;">????????????</td>
                                            <td>100??? ??? 10%??????</td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #F0F3F7;">????????????</td>
                                            <td>100??? ??? 90%??????</td>
                                        </tr>                                                                                                 
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <table class="table table-bordered border-1 align-middle">
                                    <tbody>
                                        <tr style="background-color: #F2F2F2;">
                                            <td class="text-center">1??????</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">???????????? ??????</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">80%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-dark btn-lg">????????????</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr style="background-color: #F2F2F2;">
                                            <td class="text-center">2??????</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">???????????? ??????</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">100%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-dark btn-lg">????????????</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr style="background-color: #F2F2F2;">
                                            <td class="text-center">3??????</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">???????????? ??????</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 91%;" aria-valuenow="91" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">91%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-dark btn-lg">????????????</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr style="background-color: #F2F2F2;">
                                            <td class="text-center">????????????</td>
                                            <td class="row border-0">
                                                <div class="col my-auto">
                                                    <p class="mb-0"><span class="fw-bold"></span>????????????</p>                                                                            
                                                </div>    
                                                <div class="col-3 text-end my-auto">
                                                    <p class="mb-0">????????? ?????? ??????</p>                                                    
                                                </div>                                                                                  
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-dark btn-lg disabled">????????????</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr style="background-color: #F2F2F2;">
                                            <td class="text-center">5??????</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">???????????? ??????</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">100%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-dark btn-lg">????????????</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr style="background-color: #F2F2F2;">
                                            <td class="text-center">6??????</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">???????????? ??????</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">100%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-dark btn-lg">????????????</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr style="background-color: #F2F2F2;">
                                            <td class="text-center">7??????</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">???????????? ??????</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">100%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-dark btn-lg">????????????</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr style="background-color: #F2F2F2;">
                                            <td class="text-center">8??????</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">???????????? ??????</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">100%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-dark btn-lg">????????????</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr style="background-color: #F2F2F2;">
                                            <td class="text-center">????????????</td>
                                            <td class="row border-0">
                                                <div class="col my-auto">
                                                    <p class="mb-0"><span class="fw-bold">68???</span>(??? ?????? ???????????????.)</p>
                                                </div>    
                                                <div class="col-3 text-end my-auto">
                                                    <p class="mb-0">???????????? : 2022.02.28 06:20</p>
                                                </div>
                                                <div class="col-2 text-end">                                                    
                                                    <button type="button" class="btn btn-outline-dark btn-lg waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-fullscreen">??? ??????</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>                            
                        </div>
                    </div>                      
                </div>
            </div>
            <!--???????????? ?????? card End-->
            <!-- ?????? modal -->
            <div class="modal fade instructor-1 " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <div class="modal-title row">
                                <div class="col-auto">
                                    <img src="assets/images/classroom/NoPath.png" class="rounded avatar-sm">
                                </div>
                                <div class="col">
                                    <p class="mb-0 h5">?????????</p>
                                    <span>???????????? > ????????????</span>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-primary">?????????, ?????????, ????????? <br /> ????????? ??????????????? PR????????? ???????????????.</p>
                            <div>
                                <p class="text-secondary">?????? ??? ??????</p>
                                <ul class="px-3">
                                    <li>?????? ?????????????????? ??????</li>
                                    <li>??????????????? ?????????????????? ??????</li>
                                    <li>???) ??????</li>
                                    <li>???) ??????????????? ????????? ??????</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal -->
            <!-- ???????????? modal -->
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <div class="modal-title" id="myLargeModalLabel">
                                <p class="small text-primary mb-1">????????????</p>
                                <p class="h5">Good Morning, ????????? ????????? ?????? ?????? ?????? ????????? - ?????? ???</p>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <p>????????? ????????? ?????? ???????????? ??? ?????? ?????????. <br /> ????????? ?????? ??????????????????.</p>
                            </div>                            
                            <div class="display-5 text-center text-primary my-4">
                                <i class="bi bi-star-fill p-2"></i><i class="bi bi-star-fill p-2"></i><i class="bi bi-star-fill p-2"></i><i class="bi bi-star-fill p-2"></i><i class="bi bi-star p-2"></i>
                            </div>
                            <div>                                
                                <div class="mb-3">
                                    <label for="basicpill-address-input"><i class="bx bxs-message-rounded"></i>????????? ????????? ??????????????????.</label>
                                    <textarea id="basicpill-address-input" class="form-control" rows="10" placeholder="??????, ???????????? ????????? ????????? ?????? ?????? ?????? ????????? ??? ????????????."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary waves-effect waves-light w-100">?????? ????????????</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            <!-- ???????????? modal -->
            <!-- /.modal -->
            <!-- motp modal -->
            <div class="modal fade hrdk-motp-modal" tabindex="-1" role="dialog" aria-labelledby="motpModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md">
                    <div class="modal-content">
                        <div class="modal-header border-0 align-self-center">
                            <div class="modal-title mt-5" id="motpModalLabel">
                                <img class="" width="250" src="assets/images/classroom/hrdk_image.png">
                            </div>                            
                        </div>
                        <div class="modal-body text-center align-self-center">
                            <div class="mb-3">
                                <p class="h5">???????????? <span class="text-primary">MOTP</span>??? ???????????? <br />6?????? ????????? ?????? ????????? ??????????????????.</p>
                            </div>
                            <div class="text-center mb-4">
                                <div class="input-group mb-1">                                    
                                    <input type="text" class="form-control" maxlength="6" style="text-align:center">
                                </div>
                                <button type="button" class="btn btn-primary waves-effect waves-light w-100">????????????</button>
                            </div>
                            <div class="text-center">
                                <div class="mb-3">
                                    <p class="h5 text-secondary">MOTP ????????? ???????????? ?????? <br />?????? ???????????? ?????? ???????????? ????????????.</p>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="me-2 w-100">
                                        <form name="form_mobile" method="post">
                                            <input type="hidden" name="req_info" value="<?= $encryptData ?>">
                                            <input type="hidden" name="rtn_url" value="<?= $returnURL ?>">
                                            <input type="hidden" name="cpid" value="<?= $cpID ?>"> 
                                            <input type="submit" class="btn btn-outline-primary w-100" value="????????? ??????" onclick="javascript:openIV_Mobile();">
                                        </form>
                                        <form name="viform" method="post">
                                            <input type="hidden" name="priinfo">								
                                            <input type="hidden" name="resultCd">								
                                            <input type="hidden" name="result">								
                                        </form>                                    
                                    </div>     
                                    <div class="w-100">
                                        <form name="form_ipin" method="post">
                                            <input type="hidden" name="m" value="pubmain">	
                                            <input type="hidden" name="enc_data" value="<?= $encryptData ?>">
                                            <input type="submit" class="btn btn-outline-primary w-100" value="????????? ??????" onclick="javascript:openIV_iPin();">                        
                                        </form>
                                
                                        <form name="viform" method="post">
                                            <input type="hidden" name="enc_data">
                                        </form>
                                    </div>                                    
                                </div>                            
                            </div>
                        </div>                        
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            <!-- motp modal -->
            <!--???????????? ?????? card3-->
            <div class="card mb-3 p-4">
                <div class="row g-0">
                    <div class="mb-2">
                        <p class="text-primary mb-0">???????????? > ????????????</p>
                        <p class="h5">Good Morning, ????????? ????????? ?????? ?????? ?????? ????????? - ?????? ???</p>
                    </div>
                    <div class="col-lg-2">
                        <img src="assets/images/classroom/NoPath - ????????? (17).png" class="img-fluid rounded-start" />
                    </div>
                    <div class="col-lg-10">
                        <div class="card-body pt-2">
                            <div class="row">
                                <div class="col-auto">
                                    <p class="text-muted mb-1">????????????</p>
                                    <p class="text-muted mb-1">??????(??????)</p>
                                    <p class="text-muted mb-1">????????????</p>
                                    <p class="text-muted mb-1">????????????</p>
                                </div>
                                <div class="col">
                                    <p class="mb-1">2020.11.10 - 2020.12.09</p>
                                    <p class="mb-1">????????? 80% ?????? ??????</p>
                                    <p class="mb-1">2021.12.09</p>
                                    <p class="waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".instructor-1">??? ??????</p>
                                </div>
                                <div class="col-3 border-start border-dark">
                                    <h5><span class="badge bg-success">?????????</span></h5>
                                    <p class="mb-0 text-secondary">???????????????</p>
                                    <span>?????? (?????? D-8)</span>
                                    <p class="mb-0 text-secondary">?????????</p>
                                    <span class="h4">0%</span>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col text-start">
                                    <button class="btn btn-outline-dark"><i class="bi bi-folder-fill pe-3"></i>????????????</button>
                                </div>
                                <div class="col text-end">
                                    <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#Collapse_3" aria-expanded="true" aria-controls="Collapse_123">?????? ??????<i class="bi bi-caret-down-fill ps-3"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="collapse" id="Collapse_3">
                        <div class="card card-body border-0">
                            <div>
                                <table class="table table-bordered">
                                    <tbody class="text-center align-middle">
                                        <tr>
                                            <td rowspan="4" style="background-color: #00287A;"><span class="text-white">????????????</span></td>
                                            <td style="background-color: #F0F3F7;">????????????</td>
                                            <td>80%??????</td>
                                            <td rowspan="4">????????? ??????,?????? ?????? <br/> ?????? 60??? ??????</td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #F0F3F7;">????????????</td>
                                            <td>100??? ??? 10%??????</td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #F0F3F7;">????????????</td>
                                            <td>100??? ??? 90%??????</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <table class="table table-bordered border-1 align-middle">
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1??????</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">???????????? ??????</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">0%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-primary btn-lg">????????????</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2??????</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">???????????? ??????</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">0%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-primary btn-lg disabled">????????????</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">3??????</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">???????????? ??????</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">0%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-primary btn-lg disabled">????????????</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">????????????</td>
                                            <td class="row border-0">
                                                <div class="col my-auto">
                                                    <p class="mb-0"><span class="fw-bold"></span>????????????</p>                                                                            
                                                </div>    
                                                <div class="col-3 text-end my-auto">
                                                    <p class="mb-0">????????? ?????? ??????</p>                                                    
                                                </div>                                                                                  
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-dark btn-lg disabled">????????????</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">5??????</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">???????????? ??????</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">0%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-primary btn-lg disabled">????????????</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">6??????</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">???????????? ??????</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">0%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-primary btn-lg disabled">????????????</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">7??????</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">???????????? ??????</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">0%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-primary btn-lg disabled">????????????</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">8??????</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">???????????? ??????</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">0%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-primary btn-lg disabled">????????????</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">????????????</td>
                                            <td class="row border-0">
                                                <div class="col my-auto">
                                                    <p class="mb-0">????????? ????????? ?????? ????????? ????????? ???????????????.</p>
                                                </div>    
                                                <div class="col-3 text-end my-auto">
                                                    <p class="mb-0">???????????? : 80???</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-dark btn-lg disabled">????????????</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>                            
                        </div>
                    </div>                      
                </div>
            </div>
            <!--???????????? ?????? card End-->

        </div>    
    </main>
    
    <!-- footer START -->
    <footer class="oz-footer navbar-fixed-bottom">
      <div class="container pt-3 pb-9">
          <div class="row">
              <!-- left -->
              <div class="col-12 col-md-9">
                  <p class="fo-link h6">
                      <span class="pe-2 h-4"><a>???????????? ????????????</a></span>
                      <span class="pe-2 h-4"><a>????????????</a></span>
                      <span class="pe-2"><a>????????????????????? ????????????</a></span>
                      <span class="pe-2"><a>???????????? ??????</a></span>
                  </p>
                  <div class="fo-imgs mt-3 clearfix">
                      <img src="assets/images/common/fo-banner01.svg">
                      <img src="assets/images/common/fo-banner02.svg">
                      <img src="assets/images/common/fo-banner03.svg">
                  </div>
              </div>

              <!-- right -->
              <div class="col-12  col-md-3">
                  <select class="form-select form-select-md" aria-label=".form-select-md example size 3">                    
                      <option selected>???????????????</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                  </select>
                  <div class="row fo-url">
                      <div class="col-6 text-center">
                          <p class="cacao rounded">???????????? ??????</p>
                      </div>
                      <div class="col-6 text-center">
                          <p class="n-blog text-white rounded"><span class="fw-bolder">N</span> ?????????</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="mt-3">
              <p>
                  ??????????????? | ?????? : ????????? | ?????? : ?????? ???????????? ????????? 130 ????????? ??????????????????3 705??? ??????????????? <br />
                  TEL : 1811-0018,1811-0014 | FAX : 050-8094-0019 | ????????????????????? : 7978600772 <br />
                  ?????????????????? : ??? 2021-???????????????-0322??? <br />
              </p>
              ??? ??????????????? Allright & Reserved. ALLRIGHT & RESERVED.
          </div>
      </div>
    </footer>
    <!-- footer END -->     
    <script type="text/javascript">
        /*       
        var options = {
            chart: {
                height: 200,
                type: "radialBar"
            },
            
            series: [50],
            
            plotOptions: {
                radialBar: {
                    hollow: {
                        margin: 15,
                        size: "50%"
                    },                
                    dataLabels: {
                        showOn: "always",
                        name: {
                            offsetY: -10,
                            show: true,
                            color: "#888",
                            fontSize: "10px"
                        },
                        value: {
                            color: "#111",
                            fontSize: "28px",
                            offsetY: 3,
                            show: true
                        }
                    },
                    
                }
            },
            stroke: {
                lineCap: "round",
            },
            labels: ["??? ?????????"]
            };

        var chart = new ApexCharts(document.querySelector("#chart"), options);

        chart.render();
        */        

        //Parameter
        $('#finalCk-alert').click(function () {
			Swal.fire({
                title: '???????????? ??? ???????????? ??? ????????????. \n???????????? ???????????????????',
                //text: "You won't be able to revert this!",
                //icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '??????',
                cancelButtonText: '??????',
                confirmButtonClass: 'btn btn-primary mt-2 w-25',
                cancelButtonClass: 'btn btn-secondary ms-2 mt-2 w-25',
                buttonsStyling: false,
            }).then(function (result) {
                if (result.value) {
                    Swal.fire({
                      title: '???????????? ???????????????.',
                      confirmButtonText: '??? ???????????? ????????????',
                      confirmButtonClass: 'btn btn-primary mt-2 w-100',
                      //text: 'Your file has been deleted.',
                      //icon: 'success',
                    }).then(function(rt){
                        if(rt.value){
                            location.reload();                            
                            //$('.modal').modal('hide');
                        }
                    })
                }
            });
        });
        /*
        $("body").on("click", ".btn_alternative", function (e) {
			e.preventDefault();
			
			var user_id = "user1";
			
		//	$.certification_alternative(a_agent_id, a_user_id, a_course_agent_pk, a_class_agent_pk, a_eval_cd, a_eval_type, a_class_time, a_return, a_return_code, a_transaction_id, a_transaction_dt)
			$.certification_alternative("oneline", user_id, "09", "10", "01", "??????", "1", "T", "00", "manager1", $.now());
		});
        */        

    </script>

  </body>
  
</html>