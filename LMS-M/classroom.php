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
                var xPos = (document.body.offsetWidth/2) - (w/2); // 가운데 정렬
	            xPos += window.screenLeft; // 듀얼 모니터일 때
	            var yPos = (document.body.offsetHeight/2) - (h/2);
                yPos += window.screenTop;

                var url = "video/view.html";
                var title = "강의";
                var status = "resizable=no,status=no,menubar=no,toolbar=no,width="+w+", height="+h+", left="+xPos+", top="+yPos+""; 
                
                window.open(url,title,status); 
                
                
            })
        })

    </script>

    <?php
    //header("Content-type: text/html; charset=euc-kr");
      //아이핀
      $modulePath = "./IV_iPIN_Lib/IPIN2Client_linux_x64";                    // IPIN 모듈의 절대경로 (권한:755)
      $siteCode = "EG66";		
      $sitePW = "Online1!";		
      $cpCode = `$modulePath SEQ $siteCode`;                                  // CP요청 번호로 싱글쿼터(`) 사용
      $returnURL = "http://onelineedu.kr:30080/temp/IV/IV_iPin_Process.php";          // 결과값 받을 절대경로 URL
        $encryptData = `$modulePath REQ $siteCode $sitePW $cpCode $returnURL`;  // 싱글쿼터(`) 사용
      $result = "";		

      session_start();

      $_SESSION['cpCode'] = $cpCode;  // 결과페이지에서 사용할 위변조용 변수 세션 전달

        if ($encryptData == -9)
      {
        $result = "입력값 오류: 암호화 처리시, 필요한 파라미터값의 정보를 정확하게 입력해 주시기 바랍니다.";
      } else {
        $result = "변수에 암호화 데이터가 확인되면 정상, 정상이 아닌 경우 리턴코드 확인 후 NICE평가정보 개발 담당자에게 문의해 주세요.";
      }    
      $requestDate = date("ymdHis");                                            // 날짜 생성
      $uniqueCode = str_pad(mt_rand(0, 999999999), 9, '0', STR_PAD_BOTH);       // 거래요청ID 유일한값 생성을 위한 랜덤 생성
      $tradeCode = $requestDate.$uniqueCode;                                    // 거래요청번호로 최대 40byte 이내에서 중복되지 않은 유일한값
      $cpCode = "01001";                                                        // 회원사 등록 코드
      $cpID = "oneline";                                                        // 회원사 ID
      $returnURL = "http://onelineedu.kr:30080/temp/IV/IV_Mobile_Process.php";  // 결과값 받을 절대경로 URL
      $_SESSION['tradeCode'] = $tradeCode;  // 거래요청번호 세션 저장  
      /*
      
      $crypt = new Crypt();
      $requestInfo = $cpCode."/" .$tradeCode. "/" .$requestDate;                         // 거래요청정보 : 서비스코드/거래요청번호/요청일시
      $encryptData = $crypt -> encrypt($requestInfo, "./IV_Mobile_Lib/onelineCert.der");  // 암호문자열 = encrypt(암호화 시킬 값, 인증서 경로)
    
      if($encryptData == false) {
            echo $crypt -> ErrorCode;
      }
      */
      
    ?>

    <title>원라인에듀</title>
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
              <img class="dark-mode-item navbar-brand-item" src="assets/images/logo.png" alt="logo"><span class="fw-bold">원라인에듀</span>
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
            <!-- 교육문의 mobile-->
            <div class="d-none d-sm-block d-md-block d-lg-none">
              <button type="button" onclick="location.href='education_inquiry.html'" class="btn btn-primary btn"><i class="bi bi-pencil-square"></i>  교육 문의</button>
            </div>

            <!-- Logo END -->              
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>           

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item pe-2">
                    <a class="nav-link text-primary fw-bold" href="classroom.php">진행중인과정</a>
                </li>
                <li class="nav-item pe-2">
                    <a class="nav-link" href="endClassroom.html">학습종료과정</a>
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
              <!-- 교육문의 -->
              <div class="d-none d-lg-block">
                <button type="button" onclick="location.href='education_inquiry.html'" class="btn btn-primary btn"><i class="bi bi-pencil-square"></i>  교육 문의</button>
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
              <h3 class="text-white mb-1">홍길동님 환영합니다.</h3>
              <p class="text-white mb-1 pt-2 pb-2">원라인에듀 홈페이지를 방문해주신 여러분을 진심으로 환영합니다.</p>
              <p class="text-white mb-1 ">
                <span>수강완료 : </span>1개 &nbsp;&nbsp;&nbsp;<span>진행(대기)중 : </span>
                <span data-bs-container="body" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-content="응시하지 않은 최종평가가 있습니다.">2개</span>
              </p>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="row justify-content-end text-end">
                <div class="">                  
                  <!--span class="pe-1"><button type="button" class="btn btn-outline-light" onclick = "location.href='find_id.html'"><i class="bi bi-person"></i><span class="px-2">개인정보 수정</span></button></!--span-->
                  <span class="pe-1"><button type="button" class="btn btn-outline-light"><i class="bi bi-box-arrow-right"></i><span class="px-2">로그아웃</span></button></span>
                </div>                
              </div>              
            </div>
            <div class="row mx-0 justify-content-end"> 
              <div class="col-2">                
                <div id="chart" class="apex-charts"></div>
              </div>
              <div class="col text-end align-self-center">
                <button type="button" class="btn btn-outline-light me-2 px-2" onclick = "location.href='mypage.html'"><i class="bi bi-person-bounding-box fs-1"></i><br /><span class="">마이페이지</span></button>
                <button type="button" class="btn btn-outline-light me-2 px-4"><i class="bi bi-bookmark-dash-fill fs-1"></i><br /><span class="">수료증</span></button>
                <button type="button" class="btn btn-outline-light px-4"><i class="bi bi-pencil fs-1"></i><br /><span class="">재응시</span></button>
                <!--button type="button" class="btn btn-outline-light"><i class="bi bi-book fs-1"></i><br /><span class="">학습 도움말</span></button-->
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
                        <li class="breadcrumb-item text-muted">내 강의실</a></li>            
                        <li class="breadcrumb-item active" aria-current="page">진행중인교육</li>
                    </ol>
                </nav>
            </div>
            <!--진행중인 교육 card-->
            <div class="card mb-3 p-4">
                <div class="row g-0">
                    <div class="mb-2">
                        <p class="text-primary mb-0">의료교육 > 직무교육</p>
                        <p class="h5">Good Morning, 행복한 병원을 위한 고객 만족 서비스 - 병원 편</p>                        
                    </div>
                    <div class="col-lg-2">
                        <img src="assets/images/educate/NoPath_detail.png" class="img-fluid rounded-start" />
                    </div>
                    <div class="col-lg-10">
                        <div class="card-body pt-2">
                            <div class="row">
                                <div class="col-auto">
                                    <p class="text-muted mb-1">수강기간</p>
                                    <p class="text-muted mb-1">평가(응시)</p>
                                    <p class="text-muted mb-1">복습기간</p>
                                    <p class="text-muted mb-1">첨삭강사</p>
                                </div>
                                <div class="col">
                                    <p class="mb-1">2020.11.10 - 2020.12.09</p>
                                    <p class="mb-1">진도율 80% 부터 가능</p>
                                    <p class="mb-1">2021.12.09</p>
                                    <p class="waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".instructor-0">천 미현</p>
                                </div>                                
                                <div class="col-3 border-start border-dark">
                                    <h5><span class="badge bg-danger">수강중</span></h5>
                                    <p class="mb-0 text-secondary">최근학습일</p>
                                    <span>2021.12.01 13:21 (종료 D-8)</span>
                                    <p class="mb-0 text-secondary">진도율</p>
                                    <span class="h4">80%</span>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col text-start">
                                    <button class="btn btn-outline-dark"><i class="bi bi-folder-fill pe-3"></i>학습자료</button>
                                </div>
                                <div class="col text-end">
                                    <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_1" aria-expanded="false" aria-controls="collapse_1">상세 보기<i class="bi bi-caret-down-fill ps-3"></i></button>                                    
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
                                            <td rowspan="4" style="background-color: #00287A;"><span class="text-white">수료기준</span></td>
                                            <td style="background-color: #F0F3F7;">총진도율</td>
                                            <td>80%이상</td>                              
                                            <td rowspan="4">반영된 평가,과제 점수 <br/> 합산 60점 이상</td>
                                        </tr>                                    
                                        <tr>                                        
                                            <td style="background-color: #F0F3F7;">중간평가</td>
                                            <td>100점 중 10%반영</td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #F0F3F7;">최종평가</td>
                                            <td>100점 중 90%반영</td>
                                        </tr>                                                                                                 
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <table class="table table-bordered border-1 align-middle">
                                    <tbody>
                                        <tr style="background-color: #F2F2F2;">
                                            <td class="text-center">1차시</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">브랜드와 윤리</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">80%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button id="video"  type="button" class="btn btn-outline-dark btn-lg">복습하기</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr style="background-color: #F2F2F2;">
                                            <td class="text-center">2차시</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">브랜드와 윤리</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">100%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-dark btn-lg">복습하기</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr style="background-color: #F2F2F2;">
                                            <td class="text-center">3차시</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">브랜드와 윤리</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 91%;" aria-valuenow="91" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">91%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-dark btn-lg">복습하기</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr class="" style="background-color: #F2F2F2;">
                                            <td class="text-center">중간평가</td>
                                            <td class="row border-0">
                                                <div class="col my-auto">
                                                    <p class="mb-0"><span class="fw-bold">68점</span>(재 응시 가능합니다.)</p>                                                    
                                                </div>    
                                                <div class="col-3 text-end my-auto">
                                                    <p class="mb-0">응시일자 : 2022.02.28 06:20</p>
                                                </div>                                                                                  
                                                <div class="col-2 text-end">                                                    
                                                    <button type="button" class="btn btn-outline-dark btn-lg waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".evaluation-notice">재 응시</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">5차시</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">브랜드와 윤리</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">30%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-primary btn-lg" data-bs-toggle="modal" data-bs-target=".hrdk-motp-modal">학습하기</button>                                                    
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">6차시</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">브랜드와 윤리</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">0%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-primary btn-lg disabled">학습하기</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">7차시</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">브랜드와 윤리</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">0%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-primary btn-lg disabled">학습하기</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">8차시</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">브랜드와 윤리</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">0%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-primary btn-lg disabled">학습하기</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">최종평가</td>
                                            <td class="row border-0">
                                                <div class="col my-auto">
                                                    <p class="mb-0">준비된 학습을 모두 마치면 응시가 가능합니다.</p>                                                                       
                                                </div>    
                                                <div class="col-2 text-end my-auto">
                                                    <p class="mb-0">평가시간 : 80분</p>                                                    
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-dark btn-lg disabled">평가응시</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">과제제출</td>
                                            <td class="row border-0">
                                                <div class="col my-auto">
                                                    <p class="mb-0"></p>                                                                       
                                                </div>    
                                                <div class="col-2 text-end my-auto">
                                                    <p class="mb-0"></p>                                                    
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-primary btn-lg" data-bs-toggle="modal" data-bs-target=".evaluation-assignment">과제제출</button>
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
            <!-- 강사 modal -->
            <div class="modal fade instructor-0" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <div class="modal-title row">
                                <div class="col-auto">
                                    <img src="assets/images/classroom/NoPath.png" class="rounded avatar-sm">
                                </div>
                                <div class="col">
                                    <p class="mb-0 h5">천미현</p>
                                    <span>의료교육 > 직무교육</span>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-primary">기획력, 리더십, 스피드 <br /> 그리고 열정넘치는 PR문구를 넣어주세요.</p>
                            <div>
                                <p class="text-secondary">학력 및 경력</p>
                                <ul class="px-3">
                                    <li>제주 한양고등학교 졸업</li>
                                    <li>서울시립대 국어국문학과 졸업</li>
                                    <li>現) 교사</li>
                                    <li>現) 원라인에듀 리더십 강사</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal -->

            <!--  평가 유의사항 Modal -->
            <div class="modal fade evaluation-notice" tabindex="-1" role="dialog" aria-labelledby="evaluationNoticeLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header container">
                            <h1 class="modal-title" id="evaluationNoticeLabel">중간평가 <span class="text-danger">유의사항</span></h1>
                            <button type="button" class="btn-close display-5" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div style="background-color: #F2F2F2;">
                            <div class="modal-body container mt-5">
                                <p class="text-center"><i class="bi bi-exclamation-triangle display-2 text-danger"></i></p>
                                <div>
                                    <p>1. 중간평가의 <span class="bb-red">응시 제한시간은 없습니다.</span></p>
                                    <p>2. 중간평가는 <span class="text-danger">1회만 응시 가능하며, 재응시 불가</span>합니다.</p>
                                    <p>3. <span class="text-danger">반드시 PC에서 진행</span>하여 주시고, 장애가 발생하지 않도록 유선 인터넷 등을 사용하시기 바랍니다.</p>
                                    <p>4. <span class="text-danger">최종제출 버튼까지 클릭</span> 후 제출해야지만 평가 응시가 완료됩니다.</p>
                                    <p>5. 최종제출을 하지 않은 상태로 학습기간이 종료될 경우에는<span class="text-danger">작성한 답안으로 자동 제출</span>됩니다.</p>
                                    <p>6. 중간평가의 점수는 최종 수료 점수에 반영됩니다. 수료기준의 반영율을 확인하여 주십시오.</p>
                                    <p>7. 평가 결과는 학습기간이 종료되고, <span class="text-danger">첨석이 완료된 후 제공</span>됩니다.</p>
                                </div>
                            </div>
                        </div>                        
                        <div class="container">
                            <!-- 체크박스 -->
                            <div class="text-end my-4 text-secondary">
                                <input type="checkbox" class="form-check-input h2" id="rememberCheck" checked>
                                <label class="form-check-label pt-2" for="rememberCheck">위 개인정보 수집 및 이용에 대한 안내를 충분히 숙지했습니다.</label>
                            </div>   
                            <!-- 평가응시 -->
                            <div class="text-center">                                                    
                                <button type="button" class="btn btn-primary btn-lg px-5 py-2 waves-effect waves-light evaluation-apply" data-bs-toggle="modal" data-bs-target=".evaluation-detail">평가응시</button>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <!--  평가 Modal1 -->
            <div id="evaluation-detail" class="modal evaluation-detail" tabindex="-1" role="dialog" aria-labelledby="evaluationDetailLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header container">
                            
                            <div class="modal-title" id="evaluationDetailLabel">
                                <p class="h5 text-primary">최종평가</p>
                                <p class="h1">병원CS A부터 Z까지</p>
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
                                                    <div class="name">남은시간</div>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <p class="text-white display-3 mb-0 fw-bold countdown">59:59</p>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="col align-self-center">
                                        <ul class="pt-4">
                                            <li>평가는 <span class="text-danger">1회 응시만 가능</span>하며, 제한시간은 접속종료 등의 상태에서도 중단없이 계속 흘러가게 됩니다.</li>
                                            <li><span class="text-danger">재응시가 불가능</span>하므로 신중히 응시하시기 바랍니다.</li>
                                        </ul>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <!-- 문제영역 -->
                            <div class="row">
                                <div class="col" id="evaluation-body">
                                    <div class="evaluation1">
                                        <div class="mt-5">
                                            <div class="mb-3">
                                                <p class="h3">문제 4</p>
                                            </div>
                                            <div>
                                                <p class="mb-0 h5">다음 중 초진 고객에 대한 설명으로 옳은 것은? (배점 : 10)</p>
                                                <ul class="list-group mt-2">
                                                    <li class="list-group-item border-0 p-0 py-1">
                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio4" id="Q4_1">
                                                        <label class="form-check-label" for="Q4_1">1. 다시 병원에 내원한 고객</label>
                                                    </li>
                                                    <li class="list-group-item border-0 p-0 py-1">
                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio4" value="" id="Q4_2">
                                                        <label class="form-check-label" for="Q4_2">2. 동일의사에게 동일 질병으로 계속 진료</label>
                                                    </li>
                                                    <li class="list-group-item border-0 p-0 py-1">
                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio4" value="" id="Q4_3">
                                                        <label class="form-check-label" for="Q4_3">3. 완치 여부가 불분명한 경우 90일 이후 내원</label>
                                                    </li>
                                                    <li class="list-group-item border-0 p-0 py-1">
                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio4" value="" id="Q4_4">
                                                        <label class="form-check-label" for="Q4_4">4. 치료 종결 30일 이전에 내원</label>
                                                    </li>                                    
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="mt-5">
                                            <div class="mb-3">
                                                <p class="h3">문제 5</p>
                                            </div>
                                            <div>
                                                <p class="mb-0 h5">의료기간 세탈물로서 절대 세탁할 수 없는 것은? (배점 : 10)</p>
                                                <ul class="list-group mt-2">
                                                    <li class="list-group-item border-0 p-0 py-1">
                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio5" value="" id="Q5_1">
                                                        <label class="form-check-label" for="Q5_1">1. 이불 및 시트</label>
                                                    </li>
                                                    <li class="list-group-item border-0 p-0 py-1">
                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio5" value="" id="Q5_2">
                                                        <label class="form-check-label" for="Q5_2">2. 붕대 및 거즈</label>
                                                    </li>
                                                    <li class="list-group-item border-0 p-0 py-1">
                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio5" value="" id="Q5_3">
                                                        <label class="form-check-label" for="Q5_3">3. 고객복 및 수술복</label>
                                                    </li>
                                                    <li class="list-group-item border-0 p-0 py-1">
                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio5" value="" id="Q5_4">
                                                        <label class="form-check-label" for="Q5_4">4. 린넨류</label>
                                                    </li>                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="evaluation2" style="display:none;">
                                        <div class="mt-5">
                                            <div class="mb-3">
                                                <p class="h3">문제 12</p>
                                            </div>
                                            <div>
                                                <p class="mb-0 h5">불만고객을 응대하는 요령 중 적절한 것은? (배점 : 10)</p>
                                                <ul class="list-group mt-2">
                                                    <li class="list-group-item border-0 p-0 py-1">
                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio12" id="Q12_1">
                                                        <label class="form-check-label" for="Q12_1">1. 병원의 규정을 먼저 설명하지 않아야 한다</label>
                                                    </li>
                                                    <li class="list-group-item border-0 p-0 py-1">
                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio12" value="" id="Q12_2">
                                                        <label class="form-check-label" for="Q12_2">2. 메모에 집중하면 건성으로 듣는 것처럼 보이므로 고객 앞에서는 절대로 메모하지 않는다.</label>
                                                    </li>
                                                    <li class="list-group-item border-0 p-0 py-1">
                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio12" value="" id="Q12_3">
                                                        <label class="form-check-label" for="Q12_3">3. 고객의 요구사항 중 어려운 것은 먼저 정중하게 거절하고 가능한 것은 나중에 책임지고 해결해 드리겠다고 설명한다</label>
                                                    </li>
                                                    <li class="list-group-item border-0 p-0 py-1">
                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio12" value="" id="Q12_4">
                                                        <label class="form-check-label" for="Q12_4">4. 고객을 이리저리 돌리는 것은 상황에 따라 필요하다</label>
                                                    </li>                                    
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="mt-5">
                                            <div class="mb-3">
                                                <p class="h3">문제 13</p>
                                            </div>
                                            <div>
                                                <p class="mb-0 h5">의료기간 세탈물로서 절대 세탁할 수 없는 것은? (배점 : 10)</p>
                                                <ul class="list-group mt-2">
                                                    <li class="list-group-item border-0 p-0 py-1">
                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio13" value="" id="Q13_1">
                                                        <label class="form-check-label" for="Q13_1">1. 이불 및 시트</label>
                                                    </li>
                                                    <li class="list-group-item border-0 p-0 py-1">
                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio13" value="" id="Q13_2">
                                                        <label class="form-check-label" for="Q13_2">2. 붕대 및 거즈</label>
                                                    </li>
                                                    <li class="list-group-item border-0 p-0 py-1">
                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio13" value="" id="Q13_3">
                                                        <label class="form-check-label" for="Q13_3">3. 고객복 및 수술복</label>
                                                    </li>
                                                    <li class="list-group-item border-0 p-0 py-1">
                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio13" value="" id="Q13_4">
                                                        <label class="form-check-label" for="Q13_4">4. 린넨류</label>
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
                                            <div class="card-footer text-muted py-1 px-2">문제 01</div>
                                        </div>
                                        <div class="card text-center">                                
                                            <div class="card-body p-2" style="min-height: 2.3125rem;">    
                                                <p class="card-text"></p>                                  
                                            </div>
                                            <div class="card-footer text-muted py-1 px-2">문제 02</div>
                                        </div>
                                        <div class="card text-center">                                
                                            <div class="card-body p-2" style="min-height: 2.3125rem;">    
                                                <p class="card-text"></p>                                  
                                            </div>
                                            <div class="card-footer text-muted py-1 px-2">문제 03</div>
                                        </div>
                                        <div class="card text-center">                                
                                            <div class="card-body p-2" style="min-height: 2.3125rem;">    
                                                <p class="card-text"></p>                                  
                                            </div>
                                            <div class="card-footer text-muted py-1 px-2">문제 04</div>
                                        </div>
                                        <div class="card text-center">                                
                                            <div class="card-body p-2" style="min-height: 2.3125rem;">    
                                                <p class="card-text"></p>
                                            </div>
                                            <div class="card-footer text-muted py-1 px-2">문제 05</div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-start">
                                        <div class="card text-center">                                
                                            <div class="card-body p-2" style="min-height: 2.3125rem;">    
                                                <p class="card-text">2</p>                                  
                                            </div>
                                            <div class="card-footer text-muted py-1 px-2">문제 06</div>
                                        </div>
                                        <div class="card text-center">                                
                                            <div class="card-body p-2">                                  
                                                <p class="card-text">1</p>                                  
                                            </div>
                                            <div class="card-footer text-muted py-1 px-2">문제 07</div>
                                        </div>
                                        <div class="card text-center">                                
                                            <div class="card-body p-2">                                  
                                                <p class="card-text">3</p>                                  
                                            </div>
                                            <div class="card-footer text-muted py-1 px-2">문제 08</div>
                                        </div>
                                        <div class="card text-center">                                
                                            <div class="card-body p-2">                                  
                                                <p class="card-text">3</p>                                  
                                            </div>
                                            <div class="card-footer text-muted py-1 px-2">문제 09</div>
                                        </div>
                                        <div class="card text-center">                                
                                            <div class="card-body p-2">                                  
                                                <p class="card-text">1</p>
                                            </div>
                                            <div class="card-footer text-muted py-1 px-2">문제 10</div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-start">
                                        <div class="card text-center">                                
                                            <div class="card-body p-2">                                  
                                                <p class="card-text">2</p>                                  
                                            </div>
                                            <div class="card-footer text-muted py-1 px-2">문제 11</div>
                                        </div>
                                        <div class="card text-center">                                
                                            <div class="card-body p-2">                                  
                                                <p class="card-text">1</p>                                  
                                            </div>
                                            <div class="card-footer text-muted py-1 px-2">문제 12</div>
                                        </div>
                                        <div class="card text-center">                                
                                            <div class="card-body p-2">                                  
                                                <p class="card-text">3</p>                                  
                                            </div>
                                            <div class="card-footer text-muted py-1 px-2">문제 13</div>
                                        </div>                            
                                    </div>
                                </div>
                            </div>
                            <!-- 버튼영역 -->
                            <div class="text-center my-4">
                                <button type="button" class="btn btn-outline-primary btn-lg py-2 waves-effect waves-light me-2 evaluation-prev"><i class="bi bi-caret-left-fill pe-2"></i>이전</button>
                                <button type="button" class="btn btn-primary btn-lg px-5 py-2 waves-effect waves-light disabled">평가응시</button>
                                <button type="button" class="btn btn-outline-primary btn-lg py-2 waves-effect waves-light ms-2 evaluation-next">다음<i class="bi bi-caret-right-fill ps-2"></i></button>
                            </div>
                            
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <!--  과제제출 유의사항 Modal -->
            <div class="modal fade evaluation-assignment" tabindex="-1" role="dialog" aria-labelledby="evaluationAssignmentLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header container">
                            <h1 class="modal-title" id="evaluationAssignmentLabel">과제제출 <span class="text-danger">유의사항</span></h1>
                            <button type="button" class="btn-close display-5" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div>
                            <div style="background-color: #F2F2F2;">
                                <div class="modal-body container mt-4">
                                    <p class="text-center"><i class="bi bi-exclamation-triangle display-2 text-danger"></i></p>
                                    <div>
                                        <p>1. 과제는 <span class="bb-danger">1회만 제출 가능</span>하며, 학습기간 내에 최종제출을 하여야 화제제출 처리가 완료됩니다.</p>
                                        <p>2. 최종제출을 하기 전까지는 <span class="text-danger">임시저장 기능을 사용</span>사여 계속적으로 내용 수정이 가능합니다.</p>
                                        <p>3. 파일로 2개 이상의 문서를 제출하는 경우 압축한 후 제출해 주셔야 하며, 암호화된 문서나 깨짐 현상이 발생하지는 않는지 꼭 확인하여 주시기 바랍니다.</p>
                                        <p>4. 과제 점수는 최종 수료 점수에 반영됩니다.<span class="text-danger">수료기준의 반영율을 확인</span>하여 주십시오.</p>
                                        <p>5. 과제 결과는 학습기간이 종료되고,<span class="text-danger">첨삭이 완료된 후 제공</span>됩니다.</p>
                                        <p>6. 과제의 경우 <span class="text-danger">모사답안 적용대상</span>입니다. 모사답안 적용기준을 잘 확인하여 주시기 바랍니다.</p>                                    
                                    </div>
                                    <div class="mt-2">
                                        <p class="text-danger mb-0 h4">모사답안이란?</p>
                                        <p>서술형 및 과제에 있어 타인의 답안을 그대로 복사하거나 일부 문구만을 수정하여 제출한 답안을 말한다.</p>
                                        <p>1. 모사답안 적용대상 : <span>과제(레포트)</span></p>
                                        <p>2. 모사답안 적용기준</p>
                                        <ul>
                                            <li>
                                                <p>기본 정보나 개요를 묻는 문제, 답안이 동일할 수 밖에 없는 계산형, 실습형, 학습내용에서 발췌하는 내용은 적용하지 않는다.</p>
                                                <p>(단, 문제에서 제시되지 않은 조건 예를들어 도형의 위치, 선 굵기 등이 일치하는 경우는 모사답안 처리대상에 포함된다.)</p>
                                            </li>
                                            <li>
                                                <p>문항별 및 젠체 답안이 <span class="text-danger">90%이상 동일</span>한 경우</p>
                                            </li>
                                            <li>
                                                <p>오타, 띄어쓰기, 특수문자 등 <span class="text-danger">내용이 유사하거나 동일</span>한 경우</p>
                                            </li>
                                            <li>
                                                <p>단락의 앞뒤 구성을 바꿔서 동일한 내용의 답안을 제출한 경우</p>
                                            </li>
                                            <li>
                                                <p>사고력 측정형, 사례 제시형, 현업적용형과 같은 문제 유형의 답안이 80%이상 동일한 경우</p>
                                            </li>
                                        </ul>
                                        <p>3. 모사답안 처리 방침</p>
                                        <ul>
                                            <li><p class="text-danger">해당 문항 및 과제를 0점 처리하며, 체출자와 답안 제공자 모두 0점 처리된다.</p></li>
                                        </ul>
                                        <p>4. 모사답안 처리 절차</p>
                                        <ul>
                                            <li>
                                                <p>모사체크 프로그램을 가동한다.</p>
                                            </li>
                                            <li>
                                                <p>첨삭을 진행할 시 <span class="text-danger">모사율이 90%이상</span>인 학습지를 중점적으로 1차 확인을 한다</p>
                                            </li>
                                            <li>
                                                <p>모사가 의심되는 학습지의 경우 모사답안 의심여부에 체크하고, 체점기준에 맞게 첨삭을 진행한 후 점수를 부여한다.</p>
                                            </li>
                                            <li>
                                                <p>첨삭완료 후 교육운영자가 2차 확인을 한다.</p>
                                            </li>
                                            <li>
                                                <p>모사답안이 의심되는 학습자에게 통보하고, 모사답안 여부를 최종 확인한다.</p>
                                            </li>
                                            <li>
                                                <p class="text-danger">모사답안인 경우 교육운영자가 해당 문항 및 과제에 대해 0점 처리한다.</p>
                                            </li>
                                        </ul>                                    
                                    </div>
                                </div>
                            </div>                            
                            <div class="container">
                                <!-- 체크박스 -->
                                <div class="text-end my-4 text-secondary">
                                    <input type="checkbox" class="form-check-input h2" id="rememberCheck" checked>
                                    <label class="form-check-label pt-2" for="rememberCheck">위 개인정보 수집 및 이용에 대한 안내를 충분히 숙지했습니다.</label>
                                </div>   
                                <!-- 평가응시 -->
                                <div class="text-center">                                                    
<<<<<<< HEAD:classroom.php
                                    <button type="button" class="btn btn-primary btn-lg px-5 py-2 waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".assignment-detail">과제제출</button>
                                </div>
                            </div>
                        </div>                                                
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->  
            <!--  과제제출 Detail Modal1 -->
            <div id="assignment-detail" class="modal assignment-detail" tabindex="-1" role="dialog" aria-labelledby="assignmentDetailLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header container">                            
                            <div class="modal-title" id="assignmentDetailLabel">
                                <p class="h5 text-primary">과제제출</p>
                                <p class="h1">병원CS A부터 Z까지</p>
                            </div>
                            <button type="button" class="btn-close display-5" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div style="background-color: #F2F2F2;">
                            <div class="container">
                                <div class="text-center mt-3">
                                    <p class="mb-0">과제제출은 <span class="text-danger">1회만 가능</span>하며, 최종제출 후에는 재제출이 불가능합니다.</p>
                                    <p>최종제출 전까지는 임시저장 기능을 활용하시고, 학습기간 내에 꼭 <span class="text-danger">최종제출을 완료</span>하여야 합니다.</p>                                    
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <!-- 문제영역 -->                                                            
                            <div class="mt-5">
                                <div class="mb-3">
                                    <p class="h3">문제 1</p>
                                </div>
                                <div>
                                    <p class="mb-0 h5">병원 내 커뮤니케이션을 방해하는 요인에 대해 서술하시오.</p>
                                    <div class="my-2">
                                        <textarea class="form-control" rows="20"></textarea>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <div class="d-flex">
                                            <p class="align-self-center mb-0 h5 me-3">파일 제출하기</p>
                                            <label for="formFileLg" class="btn btn-outline-primary btn-file mb-0">파일찾기</label>
                                            <input id="formFileLg" type="file" style="display: none;">
                                        </div>                                        
                                    </div>
                                </div>
                                <div style="background-color: #F2F2F2;">
                                    <ul class="py-4">
                                        <li>
                                            <p class="mb-0">파일로 제출하는 경우 2개 이상의 문서는 압축하여 1개의 파일로 제출하여야 합니다.</p>
                                        </li>
                                        <li>
                                            <p class="mb-0">제출파일은 마지막에 <span class="text-danger">제출</span>한 파일로 최종 저장됩니다.</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- 버튼영역 -->
                            <div class="text-center my-4">                                
                                <button type="button" class="btn btn-outline-primary btn-lg px-5 py-2 waves-effect waves-light">임시저장</button>
                                <button type="button" class="btn btn-primary btn-lg px-5 py-2 waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".course-poll">최종제출</button>
                            </div>                            
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!--  과정 설문조사 Modal1 -->
            <div class="modal course-poll" tabindex="-1" role="dialog" aria-labelledby="pollLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header container">                            
                            <div class="modal-title" id="pollLabel">                                
                                <p class="h1">과정 설문조사</p>
                            </div>
                            <button type="button" class="btn-close display-5" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div style="background-color: #F2F2F2;">
                            <div class="container">                                                                           
                                <div class="text-center mt-3">
                                    <p class="mb-0">수강한 과정에 대한 설문조사입니다.</p>
                                    <p>시험은 설문조사 후 응시가능하며, 설문시간은 <span class="text-danger">시험시간에 미포함 </span>되며 시험 결과와는 무관합니다.</p>                                    
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <!-- 문제영역 -->                                                            
                            <div class="mt-5">
                                <div class="mb-3">
                                    <p class="h3">설문 1</p>
                                </div>
                                <div>
                                    <p class="mb-0 h5">본 과정의 전반적인 학습내용에 만족하십니까?</p>
                                    <ul class="list-group mt-2">
                                        <li class="list-group-item border-0 p-0 py-1">
                                            <input class="form-check-input me-1" type="radio" name="listGroupRadio13" value="" id="p1_1">
                                            <label class="form-check-label" for="p1_1">1. 매우 그렇다</label>
                                        </li>
                                        <li class="list-group-item border-0 p-0 py-1">
                                            <input class="form-check-input me-1" type="radio" name="listGroupRadio13" value="" id="p1_2">
                                            <label class="form-check-label" for="p1_2">2. 그렇다</label>
                                        </li>
                                        <li class="list-group-item border-0 p-0 py-1">
                                            <input class="form-check-input me-1" type="radio" name="listGroupRadio13" value="" id="p1_3">
                                            <label class="form-check-label" for="p1_3">3. 보통이다</label>
                                        </li>
                                        <li class="list-group-item border-0 p-0 py-1">
                                            <input class="form-check-input me-1" type="radio" name="listGroupRadio13" value="" id="p1_4">
                                            <label class="form-check-label" for="p1_4">4. 그렇지 않다</label>
                                        </li>
                                        <li class="list-group-item border-0 p-0 py-1">
                                            <input class="form-check-input me-1" type="radio" name="listGroupRadio13" value="" id="p1_5">
                                            <label class="form-check-label" for="p1_5">4. 매우 그렇지 않다</label>
                                        </li>
                                    </ul>                                    
                                </div>                                
                            </div>
                            <div class="mt-5">
                                <div class="mb-3">
                                    <p class="h3">설문 2</p>
                                </div>
                                <div>
                                    <p class="mb-0 h5">본 과정의 학습내용이 본인의 업무 활용에 도움이 되십니까?</p>
                                    <ul class="list-group mt-2">
                                        <li class="list-group-item border-0 p-0 py-1">
                                            <input class="form-check-input me-1" type="radio" name="listGroupRadio13" value="" id="p2_1">
                                            <label class="form-check-label" for="p2_1">1. 매우 그렇다</label>
                                        </li>
                                        <li class="list-group-item border-0 p-0 py-1">
                                            <input class="form-check-input me-1" type="radio" name="listGroupRadio13" value="" id="p2_2">
                                            <label class="form-check-label" for="p2_2">2. 그렇다</label>
                                        </li>
                                        <li class="list-group-item border-0 p-0 py-1">
                                            <input class="form-check-input me-1" type="radio" name="listGroupRadio13" value="" id="p3_3">
                                            <label class="form-check-label" for="p3_3">3. 보통이다</label>
                                        </li>
                                        <li class="list-group-item border-0 p-0 py-1">
                                            <input class="form-check-input me-1" type="radio" name="listGroupRadio13" value="" id="p4_4">
                                            <label class="form-check-label" for="p4_4">4. 그렇지 않다</label>
                                        </li>
                                        <li class="list-group-item border-0 p-0 py-1">
                                            <input class="form-check-input me-1" type="radio" name="listGroupRadio13" value="" id="p5_5">
                                            <label class="form-check-label" for="p5_5">4. 매우 그렇지 않다</label>
                                        </li>
                                    </ul>                                    
                                </div>                                
                            </div>
                            <div class="mt-5">
                                <div class="mb-3">
                                    <p class="h3">설문 3</p>
                                </div>
                                <div>
                                    <p class="mb-0 h5">학습시 불편했던 점과 교육기관에 바라는 점이 있으시면 적어주십시오.</p>
                                    <div class="my-2">
                                        <textarea class="form-control" rows="2"></textarea>
                                    </div>
                                </div>                                
                            </div>
                            <div class="mt-5">
                                <div class="mb-3">
                                    <p class="h3">설문 4</p>
                                </div>
                                <div>
                                    <p class="mb-0 h5">향후 개선되었으면 하는 교육과정이 있으시면 적어주십시오.</p>
                                    <div class="my-2">
                                        <textarea class="form-control" rows="2"></textarea>
                                    </div>
                                </div>                                
                            </div>
                            <!-- 버튼영역 -->
                            <div class="text-center my-4">                                                                
                                <button type="button" class="btn btn-primary btn-lg px-5 py-2 waves-effect waves-light">설문조사 제출</button>
                            </div>
                            
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal --> 
            <!--진행중인 교육 card2-->
            <div class="card mb-3 p-4">
                <div class="row g-0">
                    <div class="mb-2">
                        <p class="text-primary mb-0">의료교육 > 직무교육</p>
                        <p class="h5">Good Morning, 행복한 병원을 위한 고객 만족 서비스 - 병원 편</p>
                    </div>
                    <div class="col-lg-2">
                        <img src="assets/images/classroom/NoPath - 복사본 (16).png" class="img-fluid rounded-start" />
                    </div>
                    <div class="col-lg-10">
                        <div class="card-body pt-2">
                            <div class="row">
                                <div class="col-auto">
                                    <p class="text-muted mb-1">수강기간</p>
                                    <p class="text-muted mb-1">평가(응시)</p>
                                    <p class="text-muted mb-1">복습기간</p>
                                    <p class="text-muted mb-1">첨삭강사</p>
                                </div>
                                <div class="col">
                                    <p class="mb-1">2020.11.10 - 2020.12.09</p>
                                    <p class="mb-1">진도율 80% 부터 가능</p>
                                    <p class="mb-1">2021.12.09</p>
                                    <p class="waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".instructor-1">천 미현</p>
                                </div>                               
                                <div class="col-3 border-start border-dark">
                                    <h5><span class="badge bg-dark">수강완료</span></h5>
                                    <p class="mb-0 text-secondary">최근학습일</p>
                                    <span>2021.12.01 13:21 (종료 D-8)</span>
                                    <p class="mb-0 text-secondary">진도율</p>
                                    <span class="h4">100%</span>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col text-start">
                                    <button class="btn btn-outline-dark"><i class="bi bi-folder-fill pe-3"></i>학습자료</button>
                                    <button class="btn btn-outline-dark"><i class="bi bi-printer-fill pe-3"></i>수료증출력</button>                                    
                                    <button type="button" class="btn btn-outline-dark waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"><i class="fas fa-book-reader pe-3"></i>수강후기</button>
                                </div>
                                <div class="col text-end">
                                    <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#Collapse_123" aria-expanded="true" aria-controls="Collapse_123">상세 보기<i class="bi bi-caret-down-fill ps-3"></i></button>                                    
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
                                            <td rowspan="4" style="background-color: #00287A;"><span class="text-white">수료기준</span></td>
                                            <td style="background-color: #F0F3F7;">총진도율</td>
                                            <td>80%이상</td>                              
                                            <td rowspan="4">반영된 평가,과제 점수 <br/> 합산 60점 이상</td>
                                        </tr>                                    
                                        <tr>                                        
                                            <td style="background-color: #F0F3F7;">중간평가</td>
                                            <td>100점 중 10%반영</td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #F0F3F7;">최종평가</td>
                                            <td>100점 중 90%반영</td>
                                        </tr>                                                                                                 
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <table class="table table-bordered border-1 align-middle">
                                    <tbody>
                                        <tr style="background-color: #F2F2F2;">
                                            <td class="text-center">1차시</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">브랜드와 윤리</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">80%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-dark btn-lg">복습하기</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr style="background-color: #F2F2F2;">
                                            <td class="text-center">2차시</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">브랜드와 윤리</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">100%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-dark btn-lg">복습하기</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr style="background-color: #F2F2F2;">
                                            <td class="text-center">3차시</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">브랜드와 윤리</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 91%;" aria-valuenow="91" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">91%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-dark btn-lg">복습하기</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr style="background-color: #F2F2F2;">
                                            <td class="text-center">중간평가</td>
                                            <td class="row border-0">
                                                <div class="col my-auto">
                                                    <p class="mb-0"><span class="fw-bold"></span>평가없음</p>                                                                            
                                                </div>    
                                                <div class="col-3 text-end my-auto">
                                                    <p class="mb-0">평가가 없는 과정</p>                                                    
                                                </div>                                                                                  
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-dark btn-lg disabled">평가없음</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr style="background-color: #F2F2F2;">
                                            <td class="text-center">5차시</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">브랜드와 윤리</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">100%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-dark btn-lg">복습하기</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr style="background-color: #F2F2F2;">
                                            <td class="text-center">6차시</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">브랜드와 윤리</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">100%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-dark btn-lg">복습하기</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr style="background-color: #F2F2F2;">
                                            <td class="text-center">7차시</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">브랜드와 윤리</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">100%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-dark btn-lg">복습하기</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr style="background-color: #F2F2F2;">
                                            <td class="text-center">8차시</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">브랜드와 윤리</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">100%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-dark btn-lg">복습하기</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr style="background-color: #F2F2F2;">
                                            <td class="text-center">최종평가</td>
                                            <td class="row border-0">
                                                <div class="col my-auto">
                                                    <p class="mb-0"><span class="fw-bold">68점</span>(재 응시 가능합니다.)</p>
                                                </div>    
                                                <div class="col-3 text-end my-auto">
                                                    <p class="mb-0">응시일자 : 2022.02.28 06:20</p>
                                                </div>
                                                <div class="col-2 text-end">                                                    
                                                    <button type="button" class="btn btn-outline-dark btn-lg waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-fullscreen">재 응시</button>
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
            <!--진행중인 교육 card End-->
            <!-- 강사 modal -->
            <div class="modal fade instructor-1 " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <div class="modal-title row">
                                <div class="col-auto">
                                    <img src="assets/images/classroom/NoPath.png" class="rounded avatar-sm">
                                </div>
                                <div class="col">
                                    <p class="mb-0 h5">천미현</p>
                                    <span>의료교육 > 직무교육</span>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-primary">기획력, 리더십, 스피드 <br /> 그리고 열정넘치는 PR문구를 넣어주세요.</p>
                            <div>
                                <p class="text-secondary">학력 및 경력</p>
                                <ul class="px-3">
                                    <li>제주 한양고등학교 졸업</li>
                                    <li>서울시립대 국어국문학과 졸업</li>
                                    <li>現) 교사</li>
                                    <li>現) 원라인에듀 리더십 강사</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal -->
            <!-- 수강후기 modal -->
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <div class="modal-title" id="myLargeModalLabel">
                                <p class="small text-primary mb-1">수강후기</p>
                                <p class="h5">Good Morning, 행복한 병원을 위한 고객 만족 서비스 - 병원 편</p>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <p>후기는 교육을 만든 분들에게 큰 힘이 됩니다. <br /> 별점을 눌러 평가해주세요.</p>
                            </div>                            
                            <div class="display-5 text-center text-primary my-4">
                                <i class="bi bi-star-fill p-2"></i><i class="bi bi-star-fill p-2"></i><i class="bi bi-star-fill p-2"></i><i class="bi bi-star-fill p-2"></i><i class="bi bi-star p-2"></i>
                            </div>
                            <div>                                
                                <div class="mb-3">
                                    <label for="basicpill-address-input"><i class="bx bxs-message-rounded"></i>솔직한 리뷰를 작성해주세요.</label>
                                    <textarea id="basicpill-address-input" class="form-control" rows="10" placeholder="욕설, 비속어가 포함된 리뷰는 사전 고지 없이 삭제될 수 있습니다."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary waves-effect waves-light w-100">리뷰 등록하기</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            <!-- 수강후기 modal -->
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
                                <p class="h5">훈련기관 <span class="text-primary">MOTP</span>를 실행하여 <br />6자리 숫자의 인증 번호를 입력해주세요.</p>
                            </div>
                            <div class="text-center mb-4">
                                <div class="input-group mb-1">                                    
                                    <input type="text" class="form-control" maxlength="6" style="text-align:center">
                                </div>
                                <button type="button" class="btn btn-primary waves-effect waves-light w-100">인증하기</button>
                            </div>
                            <div class="text-center">
                                <div class="mb-3">
                                    <p class="h5 text-secondary">MOTP 사용이 불가능할 경우 <br />대체 수단으로 인증 해주시기 바랍니다.</p>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="me-2 w-100">
                                        <form name="form_mobile" method="post">
                                            <input type="hidden" name="req_info" value="<?= $encryptData ?>">
                                            <input type="hidden" name="rtn_url" value="<?= $returnURL ?>">
                                            <input type="hidden" name="cpid" value="<?= $cpID ?>"> 
                                            <input type="submit" class="btn btn-outline-primary w-100" value="휴대폰 인증" onclick="javascript:openIV_Mobile();">
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
                                            <input type="submit" class="btn btn-outline-primary w-100" value="아이핀 인증" onclick="javascript:openIV_iPin();">                        
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
            <!--진행중인 교육 card3-->
            <div class="card mb-3 p-4">
                <div class="row g-0">
                    <div class="mb-2">
                        <p class="text-primary mb-0">의료교육 > 직무교육</p>
                        <p class="h5">Good Morning, 행복한 병원을 위한 고객 만족 서비스 - 병원 편</p>
                    </div>
                    <div class="col-lg-2">
                        <img src="assets/images/classroom/NoPath - 복사본 (17).png" class="img-fluid rounded-start" />
                    </div>
                    <div class="col-lg-10">
                        <div class="card-body pt-2">
                            <div class="row">
                                <div class="col-auto">
                                    <p class="text-muted mb-1">수강기간</p>
                                    <p class="text-muted mb-1">평가(응시)</p>
                                    <p class="text-muted mb-1">복습기간</p>
                                    <p class="text-muted mb-1">첨삭강사</p>
                                </div>
                                <div class="col">
                                    <p class="mb-1">2020.11.10 - 2020.12.09</p>
                                    <p class="mb-1">진도율 80% 부터 가능</p>
                                    <p class="mb-1">2021.12.09</p>
                                    <p class="waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".instructor-1">천 미현</p>
                                </div>
                                <div class="col-3 border-start border-dark">
                                    <h5><span class="badge bg-success">대기중</span></h5>
                                    <p class="mb-0 text-secondary">최근학습일</p>
                                    <span>없음 (종료 D-8)</span>
                                    <p class="mb-0 text-secondary">진도율</p>
                                    <span class="h4">0%</span>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col text-start">
                                    <button class="btn btn-outline-dark"><i class="bi bi-folder-fill pe-3"></i>학습자료</button>
                                </div>
                                <div class="col text-end">
                                    <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#Collapse_3" aria-expanded="true" aria-controls="Collapse_123">상세 보기<i class="bi bi-caret-down-fill ps-3"></i></button>
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
                                            <td rowspan="4" style="background-color: #00287A;"><span class="text-white">수료기준</span></td>
                                            <td style="background-color: #F0F3F7;">총진도율</td>
                                            <td>80%이상</td>
                                            <td rowspan="4">반영된 평가,과제 점수 <br/> 합산 60점 이상</td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #F0F3F7;">중간평가</td>
                                            <td>100점 중 10%반영</td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #F0F3F7;">최종평가</td>
                                            <td>100점 중 90%반영</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <table class="table table-bordered border-1 align-middle">
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1차시</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">브랜드와 윤리</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">0%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-primary btn-lg">학습하기</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2차시</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">브랜드와 윤리</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">0%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-primary btn-lg disabled">학습하기</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">3차시</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">브랜드와 윤리</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">0%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-primary btn-lg disabled">학습하기</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">중간평가</td>
                                            <td class="row border-0">
                                                <div class="col my-auto">
                                                    <p class="mb-0"><span class="fw-bold"></span>평가없음</p>                                                                            
                                                </div>    
                                                <div class="col-3 text-end my-auto">
                                                    <p class="mb-0">평가가 없는 과정</p>                                                    
                                                </div>                                                                                  
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-dark btn-lg disabled">평가없음</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">5차시</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">브랜드와 윤리</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">0%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-primary btn-lg disabled">학습하기</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">6차시</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">브랜드와 윤리</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">0%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-primary btn-lg disabled">학습하기</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">7차시</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">브랜드와 윤리</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">0%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-primary btn-lg disabled">학습하기</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">8차시</td>
                                            <td class="row border-0">
                                                <div class="col">
                                                    <p class="mb-2">브랜드와 윤리</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>                                                    
                                                </div>    
                                                <div class="col-1 text-end">
                                                    <p class="mb-0">00:21:39</p>
                                                    <p class="mb-0">0%</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-primary btn-lg disabled">학습하기</button>
                                                </div>                                                                                       
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">최종평가</td>
                                            <td class="row border-0">
                                                <div class="col my-auto">
                                                    <p class="mb-0">준비된 학습을 모두 마치면 응시가 가능합니다.</p>
                                                </div>    
                                                <div class="col-3 text-end my-auto">
                                                    <p class="mb-0">평가시간 : 80분</p>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn btn-outline-dark btn-lg disabled">평가응시</button>
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
            <!--진행중인 교육 card End-->

        </div>    
    </main>
    
    <!-- footer START -->
    <footer class="oz-footer navbar-fixed-bottom">
      <div class="container pt-3 pb-9">
          <div class="row">
              <!-- left -->
              <div class="col-12 col-md-9">
                  <p class="fo-link h6">
                      <span class="pe-2 h-4"><a>개인정보 취급방침</a></span>
                      <span class="pe-2 h-4"><a>이용약관</a></span>
                      <span class="pe-2"><a>사업주지원교육 유의사항</a></span>
                      <span class="pe-2"><a>본인인증 안내</a></span>
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
                      <option selected>관련사이트</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                  </select>
                  <div class="row fo-url">
                      <div class="col-6 text-center">
                          <p class="cacao rounded">카카오톡 채널</p>
                      </div>
                      <div class="col-6 text-center">
                          <p class="n-blog text-white rounded"><span class="fw-bolder">N</span> 블로그</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="mt-3">
              <p>
                  원라인에듀 | 대표 : 이주영 | 주소 : 서울 영등포구 선유로 130 에이스 하이테크시티3 705호 원라인에듀 <br />
                  TEL : 1811-0018,1811-0014 | FAX : 050-8094-0019 | 사업자등록번호 : 7978600772 <br />
                  통신판매번호 : 제 2021-서울영등포-0322호 <br />
              </p>
              ⓒ 원라인에듀 Allright & Reserved. ALLRIGHT & RESERVED.
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
            labels: ["총 진행률"]
            };

        var chart = new ApexCharts(document.querySelector("#chart"), options);

        chart.render();
        */        

        //Parameter
        $('#finalCk-alert').click(function () {
			Swal.fire({
                title: '최종제출 후 수정하실 수 없습니다. \n최종제출 하시겠습니까?',
                //text: "You won't be able to revert this!",
                //icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '확인',
                cancelButtonText: '취소',
                confirmButtonClass: 'btn btn-primary mt-2 w-25',
                cancelButtonClass: 'btn btn-secondary ms-2 mt-2 w-25',
                buttonsStyling: false,
            }).then(function (result) {
                if (result.value) {
                    Swal.fire({
                      title: '최종제출 되었습니다.',
                      confirmButtonText: '내 강의실로 이동하기',
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
			$.certification_alternative("oneline", user_id, "09", "10", "01", "진도", "1", "T", "00", "manager1", $.now());
		});
        */        

    </script>

  </body>
  
</html>