<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- icon css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">        
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- Main css-->
    <link href="assets/css/visco/sign_up.css" rel="stylesheet" type="text/css" />
    <!-- Sweet Alert-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    
    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>    
    <!-- Sweet Alerts js -->
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>   
    <!-- apexcharts -->
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>
    <!--_page.js-->
    <script src="assets/js/_page.js"></script>

    <script>
      window.name ="IV_Parent";

      function openIV_iPin(){
        // window.open('', 'popupIPIN2', 'width=450, height=550, top=100, left=100, fullscreen=no, menubar=no, status=no, toolbar=no, titlebar=yes, location=no, scrollbar=no');
        window.open('', 'IV_iPin', 'width=450, height=550, top=100, left=100, fullscreen=no, menubar=no, status=no, toolbar=no, titlebar=yes, location=no, scrollbar=no');

        document.form_ipin.action = "https://cert.vno.co.kr/ipin.cb";
            document.form_ipin.target = "IV_iPin";
        // document.form_ipin.submit();
      }

      function openIV_Mobile(){
        window.open('', 'IV_Mobile', 'width=425, height=550, resizable=0, scrollbars=no, status=0, titlebar=0, toolbar=0, left=435, top=250');
				
        document.form_mobile.action = 'https://www.mobile-ok.com/popup/common/hscert.jsp';
        document.form_mobile.target = 'IV_Mobile';
      }
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
      <div class="container px-0 pb-4">
        <!-- GNB START-->
        <div>
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
                  <a class="nav-link" href="education.html">전체교육</a>
                </li>
                <li class="nav-item pe-2">
                  <a class="nav-link" href="about_us.html">교육원소개</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="support.html">고객지원</a>
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
      </div>
      <!-- Sign-up 상단 START -->      
      <div class="" style="background-color: #BFBFBF">
        <div class="container p-4">          
          <div class="mb-4 mb-md-0">
            <p class="text-dark mb-1 h3">고객님 <br /> 환영합니다.</p>
            <p class="text-dark mb-0 pt-4"><span class="text-danger">*</span>필수 입력 사항</p>            
          </div>                      
        </div>
      </div>
      <!-- Sign-up 상단END -->  
      <div class="mb-4">
        <!-- 이용약관 START-->
        <div class="container border border-secondary my-4" style="background-color: #F2F2F2;">
          <div class="p-2">
            <!-- 체크박스 -->
            <div class="">
              <input type="checkbox" class="form-check-input h2" id="rememberCheck1" checked>
              <label class="form-check-label pt-2" for="rememberCheck1">이용약관 동의<sapn class="text-danger">(필수)</sapn></label>
            </div>
            <div class="bg-white w-100 border border-secondary dd-terms-form" data-bs-toggle="modal" data-bs-target=".terms">
              <p class="p-2 pb-0">
                (주)원라인에듀는(사이트명 원라인에듀) (이하 '회사'는) 고객님의 개인정보를 중요시하며, "정보통신망 이용촉진 및 정보보호"에 관한 법률을 준수하고 있습니다. 회사는 개인정보취급방침을 통하여 고객님께서 제공하시는 개인정보가 어떠한 용도와 방식으로 이용되고 있으며, 개인정보보호를 위해 어떠한 조치가 취해지고 있는지 알려드립니다.
                회사는 개인정보취급방침을 개정하는 경우 웹사이트 공지사항(또는 개별공지)을 통하여 공지할 것입니다
              </p>
            </div>            
          </div>  
          <div class="p-2">
            <!-- 체크박스 -->
            <div class="">
              <input type="checkbox" class="form-check-input h2" id="rememberCheck2" checked>
              <label class="form-check-label pt-2" for="rememberCheck2">개인정보보호정책<sapn class="text-danger">(필수)</sapn></label>
            </div>
            <div class="bg-white w-100 border border-secondary">
              <p class="p-2 pb-0">
                (주)원라인에듀는(사이트명 원라인에듀) (이하 '회사'는) 고객님의 개인정보를 중요시하며, "정보통신망 이용촉진 및 정보보호"에 관한 법률을 준수하고 있습니다. 회사는 개인정보취급방침을 통하여 고객님께서 제공하시는 개인정보가 어떠한 용도와 방식으로 이용되고 있으며, 개인정보보호를 위해 어떠한 조치가 취해지고 있는지 알려드립니다.
                회사는 개인정보취급방침을 개정하는 경우 웹사이트 공지사항(또는 개별공지)을 통하여 공지할 것입니다
              </p>
            </div>            
          </div>    
          <div class="p-2">
            <!-- 체크박스 -->
            <div class="">
              <input type="checkbox" class="form-check-input h2" id="rememberCheck3" checked>
              <label class="form-check-label pt-2" for="rememberCheck3">ACS안내<sapn class="text-danger">(필수)</sapn></label>
            </div>
            <div class="bg-white w-100 border border-secondary">
              <p class="p-2 pb-0">
                (주)원라인에듀는(사이트명 원라인에듀) (이하 '회사'는) 고객님의 개인정보를 중요시하며, "정보통신망 이용촉진 및 정보보호"에 관한 법률을 준수하고 있습니다. 회사는 개인정보취급방침을 통하여 고객님께서 제공하시는 개인정보가 어떠한 용도와 방식으로 이용되고 있으며, 개인정보보호를 위해 어떠한 조치가 취해지고 있는지 알려드립니다.
                회사는 개인정보취급방침을 개정하는 경우 웹사이트 공지사항(또는 개별공지)을 통하여 공지할 것입니다
              </p>
            </div>            
          </div>          
          <div class="p-2">
            <!-- 체크박스 -->
            <div class="">
              <input type="checkbox" class="form-check-input h2" id="rememberCheck4" checked>
              <label class="form-check-label pt-2" for="rememberCheck4">모두 동의합니다.</label>
            </div>                 
          </div>            
        </div>
        <!-- 이용약관 END-->
        <!-- 상세정보 입력 START -->
        <div class="container px-0">
          <div class="row">
            <div>
              <p><span class="text-primary fw-bold">상세정보 입력</span>&nbsp;&nbsp;<span class="text-danger">*</span>필수 입력 사항</p>              
            </div>
            <div class="col">
              <!-- 아이디 -->
              <div class="mb-3">
                <label for="email-input" class="form-label">* 아이디</label>
                <input class="form-control" type="email" value="" placeholder="Enter Email" id="email-input">
              </div>
              <!-- 이름 -->
              <div class="mb-3">
                <label for="name-input" class="form-label">* 이름</label>
                <input class="form-control" type="text" value="" id="name-input">
              </div>     
              <!-- 패스워드 -->
              <div class="form-group mb-3" id="password">
                <label for="inputPassword" class="control-label">* 패스워드</label>
                <div class="">
                    <input type="password" class="form-control" id="password" name="excludeHangul" data-rule-required="true" placeholder="패스워드" maxlength="30">
                </div>
              </div>
              <div class="form-group mb-3" id="passwordCheck">
                <label for="inputPasswordCheck" class="control-label">* 패스워드 확인</label>
                <div class="">
                    <input type="password" class="form-control" id="passwordCheck" data-rule-required="true" placeholder="패스워드 확인" maxlength="30">
                </div>
              </div>
            </div>
            <div class="col">
              <!-- 성별 -->            
              <div class="mb-4">
                  <div class="mb-3">* 성별</div>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked="">
                      <label class="form-check-label" for="inlineRadio1">남성</label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                      <label class="form-check-label" for="inlineRadio2">여성</label>
                  </div>                
              </div>           
              <!-- 생년 월일 -->             
              <div class="form-group mb-3">
                <label for="year">* 생년월일</label>
                <div class="input-group">
                    <div class="input-group-prepend d-flex">
                        <input type="tel" class="form-control" name="year" id="year" maxlength="4" placeholder="년도">
                        <label class="input-group-text bg-white border-0 ms-2" for="year">월</label>
                    </div>
                    <select name="month" id="month" class="custom-select ms-2 px-2">
                        <option value="1">1
                        </option>
                        <option value="2">2
                        </option>
                        <option value="3">3
                        </option>
                        <option value="4">4
                        </option>
                        <option value="5">5
                        </option>
                        <option value="6">6
                        </option>
                        <option value="7">7
                        </option>
                        <option value="8">8
                        </option>
                        <option value="9">9
                        </option>
                        <option value="10">10
                        </option>
                        <option value="11">11
                        </option>
                        <option value="12">12
                        </option>
                    </select>
                    <div class="input-group-prepend ms-2">
                        <label class="input-group-text bg-white border-0" for="month">월</label>
                    </div>
                    <select name="day" id="day" class="custom-select ms-2 px-2">
                        <option value="1" selected="selected">1
                        </option>
                        <option value="2">2
                        </option>
                        <option value="3">3
                        </option>
                        <option value="4">4
                        </option>
                        <option value="5">5
                        </option>
                        <option value="6">6
                        </option>
                        <option value="7">7
                        </option>
                        <option value="8">8
                        </option>
                        <option value="9">9
                        </option>
                        <option value="10">10
                        </option>
                        <option value="11">11
                        </option>
                        <option value="12">12
                        </option>
                        <option value="13">13
                        </option>
                        <option value="14">14
                        </option>
                        <option value="15">15
                        </option>
                        <option value="16">16
                        </option>
                        <option value="17">17
                        </option>
                        <option value="18">18
                        </option>
                        <option value="19">19
                        </option>
                        <option value="20">20
                        </option>
                        <option value="21">21
                        </option>
                        <option value="22">22
                        </option>
                        <option value="23">23
                        </option>
                        <option value="24">24
                        </option>
                        <option value="25">25
                        </option>
                        <option value="26">26
                        </option>
                        <option value="27">27
                        </option>
                        <option value="28">28
                        </option>
                        <option value="29">29
                        </option>
                        <option value="30">30
                        </option>
                        <option value="31">31
                        </option>
                    </select>
                    <div class="input-group-prepend ms-2">
                        <label class="input-group-text bg-white border-0" for="day">일</label>
                    </div>
                </div>
              </div>     
              <!-- 휴대전화 -->
              <div class="mb-3">
                <label for="name-input" class="form-label">* 휴대전화</label>
                <input class="form-control" type="tel" value="" id="phone-input">
              </div>
              <!-- 이메일 -->
              <div class="mb-3">
                <label for="name-input" class="form-label">이메일</label>
                <input class="form-control" type="email" value="" id="phone-input">
              </div>       
            </div>   

            <!-- 수신 동의 -->            
            <div class="mb-3">
              <div class="mb-2">* 정보수신</div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" checked="">
                  <label class="form-check-label" for="inlineCheckbox1">Email정보</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                  <label class="form-check-label" for="inlineCheckbox2">SMS정보</label>
              </div>            
            </div>

            <!-- 본인 인증하기-->
            <div class="row mb-3">
              <div class="mb-2">* 본인 인증하기</div>
              <div class="col">                

                <form name="form_mobile" method="post">
                  <input type="hidden" name="req_info" value="<?= $encryptData ?>">
                  <input type="hidden" name="rtn_url" value="<?= $returnURL ?>">
                  <input type="hidden" name="cpid" value="<?= $cpID ?>"> 
                  <input type="submit" class="btn w-100 border border-secondary" value="휴대폰 인증" onclick="javascript:openIV_Mobile();">
                </form>

                  <form name="viform" method="post">
                  <input type="hidden" name="priinfo">								
                  <input type="hidden" name="resultCd">								
                  <input type="hidden" name="result">								
                </form>

              </div>
              <div class="col">                              
                <form name="form_ipin" method="post">
                  <input type="hidden" name="m" value="pubmain">	
                  <input type="hidden" name="enc_data" value="<?= $encryptData ?>">
                  <input type="submit" class="btn w-100 border border-secondary" value="아이핀 인증" onclick="javascript:openIV_iPin();">                        
                </form>
              
                <form name="viform" method="post">
                  <input type="hidden" name="enc_data">
                </form>
              </div>                            
            </div>

            <hr />

            <!--회원 가입 버튼-->
            <div class="text-center">
              <button type="button" class="btn w-25 btn-primary"><p class="mb-0">회원 가입하기</p></button>
            </div>
          </div>
        </div>
        <!-- 상세정보 입력 END -->
      </div>      

      <!--  과제제출 유의사항 Modal -->
      <div class="modal fade terms" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
          <div class="modal-dialog modal-fullscreen">
              <div class="modal-content">
                  <div class="modal-header container">
                      <h1 class="modal-title" id="termsLabel">이용약관</span></h1>
                      <button type="button" class="btn-close display-5" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div>
                      <div style="background-color: #F2F2F2;">
                          <div class="modal-body container mt-4">
                             <p>
                              제 1 장 총 칙 

                              제 1 조 (목적) 

                              이 이용약관(이하 '약관')은 ㈜원라인에듀 (이하 회사라 합니다)와 이용 고객(이하 '회원')간에 회사가 제공하는 서비스의 가입조건 및 이용에 관한 제반 사항과 경영지식원라인에듀의 상품 구입, 기타 필요한 사항을 구체적으로 규정함을 목적으로 합니다. 

                              

                              제 2 조 (이용약관의 효력 및 변경) 

                              (1)이 약관은 회사 웹사이트(http://www.oneline.kr) 에서 온라인으로 공시함으로써 효력을 발생하며, 합리적인 사유가 발생할 경우 관련법령에 위배되지 않는 범위 안에서 개정될 수 있습니다. 개정된 약관은 온라인에서 공지함으로써 효력을 발휘하며, 이용자의 권리 또는 의무 등 중요한 규정의 개정은 사전에 공지합니다. 

                              (2)회사는 합리적인 사유가 발생될 경우에는 이 약관을 변경할 수 있으며, 약관을 변경할 경우에는 지체 없이 이를 사전에 공시합니다. 

                              (3)회사가 약관을 변경할 경우에는 적용일자 및 변경사유를 명시하여 현행약관과 함께 사이트 초기화면에 그 적용일자 7일(이용자에게 불리한 변경 또는 중대한 사항의 변경은 30일) 이전부터 적용일자 이후 상당한 기간 동안 공지하고, 기존 회원에게는 변경될 약관, 적용일자 및 변경사유(중요내용에 대한 변경인 경우 이에 대한 설명을 포함)를 이메일 또는 문자메시지로 발송합니다. 

                              (4)회원은 변경된 약관에 동의하지 않을 경우 회원 탈퇴(해지)를 요청할 수 있으며, 변경된 약관의 효력 발생일로부터 7일 이후에도 거부의사를 표시하지 아니하고 서비스를 계속 사용할 경우 약관의 변경 사항에 동의한 것으로 간주됩니다. 

                              

                              제 3 조 (약관외 준칙) 

                              ①이 약관은 회사가 제공하는 개별서비스에 관한 이용안내(이하 서비스별 안내라 합니다)와 함께 적용합니다. 

                              ②이 약관에 명시되지 아니한 사항에 대해서는 관계법령 및 서비스별 안내의 취지에 따라 적용할 수 있습니다. 

                              

                              제 4 조 (용어의 정의) 

                              ①이 약관에서 사용하는 용어의 정의는 다음과 같습니다. 1.'원라인에듀'라 함은 회사가 재화 또는 용역을 이용자에게 제공하기 위하여 컴퓨터 등 정보통신설비를 이용하여 재화 또는 용역을 거래할 수 있도록 설정한 가상의 영업장을 말하며, 아울러 사이버원라인에듀을 운영하는 사업자의 의미로도 사용합니다. 

                              2..'회원'이라 함은 회원제서비스를 이용하는 이용자를 말하며, "원라인에듀"이 제공하는 서비스를 지속적으로 이용할 수 있는 자를 말합니다. 

                              3.'이용계약'이라 함은 서비스 이용과 관련하여 회사와 이용고객 간에 체결 하는 계약을 말합니다. 

                              4.'이용자번호(ID)'라 함은 이용고객의 식별과 이용고객의 서비스 이용을 위하여 이용고객이 선정하고 회사가 부여하는 문자와 숫자의 조합을 말합니다. 

                              5.'비밀번호'라 함은 이용고객이 부여 받은 이용자번호와 일치된 이용고객 임을 확인하고 이용고객의 권익보호를 위하여 이용고객이 선정한 문자와 숫자의 조합을 말합니다. 

                              

                              6.'해지'라 함은 회사 또는 회원이 이용계약을 해약하는 것을 말합니다. 

                              

                                

                              ②이 약관에서 사용하는 용어의 정의는 제1항에서 정하는 것을 제외하고는 관계법령 및 서비스별 안내에서 정하는 바에 의합니다. 

                              

                              제 2 장 이용계약 체결 

                              제 5 조 (이용 계약의 성립) 

                              (1)이용계약은 이용고객의 본 이용약관 내용에 대한 동의와 이용신청에 대하여 회사의 이용승낙으로 성립합니다. 

                              (2)본 이용약관에 대한 동의는 이용신청 당시 해당 회사 웹의 '동의함' 버튼을 누름으로써 의사표시를 합니다. 

                              

                              제 6 조 (서비스 이용 신청) 

                              (1)회원으로 가입하여 본 서비스를 이용하고자 하는 이용고객은 회사에서 요청하는 제반정보(이름, 이메일주소, 연락처 등)를 제공하여야 합니다. 

                              (2)모든 회원은 반드시 회원 본인의 이름을 실명으로 제공하여야만 서비스를 이용할 수 있으며, 실명으로 등록하지 않은 사용자는 일체의 권리를 주장할 수 없습니다. 

                              (3)회원가입은 반드시 실명으로만 가입할 수 있으며 회사는 실명확인조치를 할 수 있습니다. 

                              (4)타인의 명의(이름 및 주민등록번호)를 도용하여 이용신청을 한 회원의 모든 ID는 삭제되며, 관계법령에 따라 처벌을 받을 수 있습니다. 

                              (5)회사는 본 서비스를 이용하는 회원에 대하여 등급별로 제공되는 서비스에 차등을 둘 수 있습니다. 

                              

                              제 7 조 (개인정보의 보호 및 사용) 

                              (1)회사는 관계법령이 정하는 바에 따라 이용자 등록정보를 포함한 이용자의 개인정보를 보호하기 위해 노력합니다. 이용자 개인정보의 보호 및 사용에 대해서는 관련법령 및 회사의 개인정보 보호정책이 적용됩니다. 단, 회사의 공식사이트이외의 웹에서 링크된 사이트에서는 회사의 개인정보 보호정책이 적용되지 않습니다. 또한 회사는 이용자의 귀책사유로 인해 노출된 정보에 대해서 일체의 책임을 지지 않습니다. 

                              (2)제공된 개인 정보는 당해 이용자의 동의 없이 목적외의 이용이나 제3자에게 제공할 수 없으며, 이에 대한 모든 책임은 "원라인에듀"가 집니다. 다만, 다음의 경우에는 예외로 합니다. 1.배송업무상 배송업체에게 배송에 필요한 최소한의 이용자의 정보(성명, 주소, 전화번호)를 알려 주는 경우 

                              2.통계작성, 학술 연구 또는 시장조사를 위하여 필요한 경우로서 특정 개인을 식별할 수 없는 형태로 제공하는 경우 

                              (3)"원라인에듀"가 제2항과 제3항에 의해 이용자의 동의를 받아야 하는 경우에는 개인정보관리 책임자의 신원(소속, 성명 및 전화번호 기타 연락처), 정보의 수집목적 및 이용목적, 제3자에 대한 정보제공 관련사항(제공받는자, 제공목적 및 제공할 정보의 내용)등 정보통신망이용촉진등에관한법률 제16조제3항이 규정한 사항을 미리 명시하거나 고지해야 하며 이용자는 언제든지 이 동의를 철회할 수 있습니다. 

                              (4)이용자는 언제든지 "원라인에듀"가 가지고 있는 자신의 개인정보에 대해 열람 및 오류정정을 요구할 수 있으며 "원라인에듀"은 이에 대해 지체없이 필요한 조치를 취할 의무를 집니다. 이용자가 오류의 정정을 요구한 경우에는 "원라인에듀"은 그 오류를 정정할 때까지 당해 개인정보를 이용하지 않습니다. 

                              (5)"원라인에듀" 또는 그로부터 개인정보를 제공받은 제3자는 개인정보의 수집목적 또는 제공받은 목적을 달성한 때에는 당해 개인정보를 지체없이 파기합니다. 

                              

                              제 8 조 (이용 신청의 승낙과 제한) 

                              (1)회사는 제 6조의 규정에 의한 이용신청고객에 대하여 업무 수행상 또는 기술상 지장이 없는 경우에 원칙적으로 접수순서에 따라 서비스 이용을 승낙합니다. 

                              (2)회사는 아래사항에 해당하는 경우에 대해서 승낙하지 아니 합니다. 

                              * 실명이 아니거나 타인의 명의를 이용하여 신청한 경우 

                              * 이용계약 신청서의 내용을 허위로 기재한 경우 

                              * 사회의 안녕과 질서, 미풍양속을 저해할 목적으로 신청한 경우 

                              * 부정한 용도로 본 서비스를 이용하고자 하는 경우 

                              * 영리를 추구할 목적으로 본 서비스를 이용하고자 하는 경우 

                              * 기타 규정한 제반사항을 위반하며 신청하는 경우 

                              * 본 서비스와 경쟁관계에 있는 이용자가 신청하는 경우 

                              * 기타 규정한 제반사항을 위반하며 신청하는 경우 

                              (3)회사는 서비스 이용신청이 다음 각 호에 해당하는 경우에는 그 신청에 대하여 승낙 제한사유가 해소될 때까지 승낙을 유보할 수 있습니다. 

                              * 회사가 설비의 여유가 없는 경우 

                              * 회사의 기술상 지장이 있는 경우 

                              * 기타 회사의 귀책사유로 이용승낙이 곤란한 경우 

                              

                              제 9 조 (이용자ID 부여 및 변경 등) 

                              (1)회사는 이용고객에 대하여 약관에 정하는 바에 따라 이용자 ID를 부여합니다. 

                              (2)이용자ID는 원칙적으로 변경이 불가하며 부득이한 사유로 인하여 변경 하고자 하는 경우에는 해당 ID를 해지하고 재가입해야 합니다. 

                              (3)이용자ID는 다음 각 호에 해당하는 경우에는 이용고객 또는 회사의 요청으로 변경할 수 있습니다. 

                              1. 이용자ID가 이용자의 전화번호 또는 주민등록번호 등으로 등록되어 사생활침해가 우려되는 경우 

                              2. 타인에게 혐오감을 주거나 미풍양속에 어긋나는 경우 

                              3. 기타 합리적인 사유가 있는 경우 

                              (4)서비스 이용자ID 및 비밀번호의 관리책임은 이용자에게 있습니다. 이를 소홀이 관리하여 발생하는 서비스 이용상의 손해 또는 제3자에 의한 부정이용 등에 대한 책임은 이용자에게 있으며 회사는 그에 대한 책임을 일절 지지 않습니다. 

                              (5)기타 이용자 개인정보 관리 및 변경 등에 관한 사항은 서비스별 안내에 정하는 바에 의합니다. 

                              

                              

                              제 3 장 계약 당사자의 의무 

                              

                              제 11 조 (회사의 의무) 

                              (1)회사는 이용고객이 희망한 서비스 제공 개시일에 특별한 사정이 없는 한 서비스를 이용할 수 있도록 하여야 합니다. 

                              (2)회사는 계속적이고 안정적인 서비스의 제공을 위하여 설비에 장애가 생기거나 멸실된 때에는 부득이한 사유가 없는 한 지체없이 이를 수리 또는 복구합니다. 

                              (3)회사는 개인정보 보호를 위해 보안시스템을 구축하며 개인정보 보호정책을 공시하고 준수합니다. 

                              (4)'원라인에듀'는 약관의 내용과 상호, 영업소 소재지, 대표자의 성명, 사업자등록번호, 연락처(전화, 팩스, 전자우편 주소 등)을 이용자가 알 수 있도록 원라인에듀의 초기 서비스화면(전면)에 게시합니다. 

                              (5)"원라인에듀"는 약관의 규제에 관한 법률, 전자거래기본법, 전자서명법, 정보통신망이용촉진등에 관한 법률, 방문판매에 관한 법률, 소비자보호법 등 관련법을 위배하지 않는 범위에서 이 약관을 개정할 수 있습니다. 

                              (6)"원라인에듀"가 약관을 개정할 경우에는 적용일자 및 개정 사유를 명시하여 현행약관과 함께 원라인에듀의 초기화면에 그 적용일자 7일 이전부터 적용일자 전일까지 공지합니다. 

                              (7)"원라인에듀"가 약관을 개정할 경우에는 그 개정약관은 그 적용일자 이후에 체결되는 계약에만 적용되고 그 이전에 이미 체결된 계약에 대해서는 개정전의 약관조항이 그대로 적용됩니다. 다만 이미 계약을 체결한 이용자가 계정약관 조항의 적용을 받기를 원하는 뜻을 제3항에 의한 개정약관의 공지기간내에 "원라인에듀"에 송신하여 "원라인에듀"의 동의를 받은 경우에는 개정약관 조항이 적용됩니다. 

                              (8)원라인에듀에 관련하여 이 약관에서 정하지 아니한 사항과 이 약관의 해석에 관하여는 정부가 제정한 전자상거래소비자보호지침 및 관계법령 또는 상관례에 따릅니다. 

                              

                              제 12 조 (이용자의 의무) 

                              (1)이용자는 회원가입 신청 또는 회원정보 변경 시 실명으로 모든 사항을 사실에 근거하여 작성하여야 하며, 허위 또는 타인의 정보를 등록할 경우 일체의 권리를 주장할 수 없습니다. 

                              (2)회원은 본 약관에서 규정하는 사항과 기타 회사가 정한 제반 규정, 공지사항 등 회사가 공지하는 사항 및 관계법령을 준수하여야 하며, 기타 회사의 업무에 방해가 되는 행위, 회사의 명예를 손상시키는 행위를 해서는 안됩니다. 

                              (3)회원은 주소, 연락처, 전자우편 주소 등 이용계약사항이 변경된 경우에 해당 절차를 거쳐 이를 회사에 즉시 알려야 합니다. 

                              (4)회사가 관계법령 및 '개인정보 보호정책'에 의거하여 그 책임을 지는 경우를 제외하고 회원에게 부여된 ID의 비밀번호 관리소홀, 부정사용에 의하여 발생하는 모든 결과에 대한 책임은 회원에게 있습니다. 

                              (5)회원은 회사의 사전 승낙 없이 서비스를 이용하여 영업활동을 할 수 없으며, 그 영업활동의 결과에 대해 회사는 책임을 지지 않습니다. 또한 회원은 이와 같은 영업활동으로 회사가 손해를 입은 경우, 회원은 회사에 대해 손해배상의무를 지며, 회사는 해당 회원에 대해 서비스 이용제한 및 적법한 절차를 거쳐 손해배상 등을 청구할 수 있습니다. 

                              (6)회원은 회사의 명시적 동의가 없는 한 서비스의 이용권한, 기타 이용계약상의 지위를 타인에게 양도, 증여할 수 없으며 이를 담보로 제공할 수 없습니다. 

                              (7)회원은 회사 및 제 3자의 지적 재산권을 침해해서는 안됩니다. 

                              (8)회원은 다음 각 호에 해당하는 행위를 하여서는 안되며, 해당 행위를 하는 경우에 회사는 회원의 서비스 이용제한 및 적법 조치를 포함한 제재를 가할 수 있습니다. 

                              * 허위의 개인정보를 기재하거나 중복하여 가입하는 행위 

                              * 타인의 서비스 아이디 및 주민등록번호를 도용하는 행위 

                              * 회사의 운영진, 직원 또는 관계자를 사칭하는 행위 

                              * 자신의 아이디 및 비밀번호를 유포하는 행위 

                              * 타인의 지적재산권을 침해하는 행위 

                              * 타인의 명예를 훼손하거나 사생활을 침해하는 행위 

                              * 고의 또는 과실로 허위의 정보를 공개 또는 유포하는 행위 

                              * 다량의 정보를 전송하거나, 동일한 또는 유사한 내용의 정보를 반복적으로 게시하여 서비스의 안정적인 운영을 방해하는 행위 

                              * 회사의 서비스를 이용하여 얻은 정보를 회사의 사전 승낙없이 복제 또는 유통시키거나 상업적으로 이용하거나 배포하는 행위 

                              * 불법선거운동을 하는 행위 

                              * 회사로부터 특별한 권리를 부여받지 않고 회사의 클라이언트 프로그램을 변경하거나, 회사의 서버를 해킹하거나, 웹사이트 또는 게시된 정보의 일부분 또는 전체를 임의로 변경하는 행위 

                              * 공공질서 및 미풍양속에 위반되는 저속, 음란한 내용의 정보, 문장, 도형, 음향, 동영상을 전송, 게시, 전자우편 또는 기타의 방법으로 타인에게 유포하는 행위 

                              * 모욕적이거나 개인신상에 대한 내용이어서 타인의 명예나 프라이버시를 침해할 수 있는 내용을 전송, 게시, 전자우편 또는 기타의 방법으로 타인에게 유포하는 행위 

                              * 다른 이용자를 희롱 또는 위협하거나, 특정 이용자에게 지속적으로 고통 또는 불편을 주는 행위 

                              * 회사의 승인을 받지 않고 다른 사용자의 개인정보를 수집 또는 저장하는 행위 

                              * 범죄와 결부된다고 객관적으로 판단되는 행위 

                              * 본 약관을 포함하여 기타 회사가 정한 제반 규정 또는 이용 조건을 위반하는 행위 

                              * 기타 관계법령에 위배되는 행위 

                              (9)회원은 회사의 사전 서면 동의 없이 서비스를 이용하여 영리적인 목적의 영업행위를 하여서는 안됩니다. 이를 위반한 영업행의의 결과에 대하여 회사은 책임을 지지 않으며, 이와 같은 영업 행위의 결과로 회사에 손해가 발생한 경우 회원은 회사에 대하여 손해배상의 의무를 집니다. 

                              (10)회사는 만 14세 미만의 회원에 대한 회원가입 신청을 받지 않습니다. 

                              

                              제 4 장 서비스의 이용 

                              

                              제 13 조 (서비스 이용 시간) 

                              (1)서비스 이용은 회사의 업무상 또는 기술상 특별한 지장이 없는 한 연중무휴, 1일 24시간 운영을 원칙으로 합니다. 단, 회사는 시스템 정기점검, 증설 및 교체를 위해 회사가 정한 날이나 시간에 서비스를 일시중단할 수 있으며, 예정되어 있는 작업으로 인한 서비스 일시중단은 회사 웹을 통해 사전에 공지합니다. 

                              (2)회사는 긴급한 시스템 점검, 증설 및 교체 등 부득이한 사유로 인하여 예고없이 일시적으로 서비스를 중단할 수 있으며, 새로운 서비스로의 교체 등 회사가 적절하다고 판단하는 사유에 의하여 현재 제공되는 서비스를 완전히 중단할 수 있습니다. 

                              (3)회사는 국가비상사태, 정전, 서비스 설비의 장애 또는 서비스 이용의 폭주 등으로 정상적인 서비스 제공이 불가능할 경우, 서비스의 전부 또는 일부를 제한하거나 중지할 수 있습니다. 다만 이 경우 그 사유 및 기간 등을 회원에게 사전 또는 사후에 공지합니다. 

                              (4)회사는 회사가 통제할 수 없는 사유로 인한 서비스중단의 경우(시스템관리자의 고의,과실없는 디스크장애, 시스템다운 등)에 사전통지가 불가능하며 타인(PC통신회사, 기간통신사업자 등)의 고의,과실로 인한 시스템중단 등의 경우에는 통지하지 않습니다. 

                              (5)회사는 서비스를 특정범위로 분할하여 각 범위별로 이용가능시간을 별도로 지정할 수 있습니다. 다만 이 경우 그 내용을 공지합니다. 

                              (6)회사은 서비스의 이용 제한을 하고자 하는 경우에는 그 사유, 일시 및 기간을 정하여 이용자의 전자우편 또는 전화 등의 방법에 의하여 해당 이용자에게 통지합니다. 다만, 회사이 긴급하게 이용을 정지할 필요가 있다고 인정하는 경우에는 그러하지 아니할 수 있습니다. 

                              

                              제 14 조 (원라인에듀의 서비스 제공) 

                              (1)"원라인에듀"는 다음과 같은 업무를 수행합니다. 

                              ① 재화 또는 용역에 대한 정보 제공 및 구매계약의 체결 

                              ② 구매계약이 체결된 재화 또는 용역의 배송 

                              ③ 기타 "원라인에듀"가 정하는 업무 

                              (2)'원라인에듀"는 재화의 품절 또는 기술적 사양의 변경 등의 경우에는 장차 체결되는 계약에 의해 제공할 재화, 용역의 내용을 변경할 수 있습니다. 이 경우에는 변경된 재화, 용역의 내용 및 제공일자를 명시하여 현재의 재화, 용역의 내용을 게시한 곳에 그 제공일자 이전 7일부터 공지합니다. 

                              (3)"원라인에듀"가 제공하기로 이용자와 계약을 체결한 서비스의 내용을 재화의 품절 또는 기술적 사양의 변경등의 사유로 변경할 경우에는 "원라인에듀"는 이로 인하여 이용자가 입은 손해를 배상합니다. 단, "원라인에듀"에 고의 또는 과실이 없는 경우에는 그러하지 아니합니다. 

                              

                              제 15 조 (이용자ID 관리) 

                              (1)이용자ID와 비밀번호에 관한 모든 관리책임은 회원에게 있습니다. 

                              (2)자신의 ID가 부정하게 사용된 경우, 회원은 반드시 그 사실을 회사에 전화 또는 전자우편으로 통보해야 합니다. 

                              (3)회사는 이용자 ID에 의하여 제반 이용자 관리업무를 수행 하므로 회원이 이용자 ID를 변경하고자 하는 경우 회사가 인정할 만한 사유가 없는 한 이용자 ID의 변경을 제한할 수 있습니다. 

                              (4)이용고객이 등록한 이용자 ID 및 비밀번호에 의하여 발생되는 사용상의 과실 또는 제 3자에 의한 부정사용 등에 대한 모든 책임은 해당 이용고객에게 있습니다. 

                              

                              제 16 조 (게시물의 관리) 

                              

                              회사는 다음 각 호에 해당하는 게시물이나 자료를 사전통지 없이 삭제하거나 이동 또는 등록 거부를 할 수 있습니다. 

                              

                              * 다른 회원 또는 제 3자에게 심한 모욕을 주거나 명예를 손상시키는 내용인 경우 

                              * 공공질서 및 미풍양속에 위반되는 내용을 유포하거나 링크시키는 경우 

                              * 불법복제 또는 해킹을 조장하는 내용인 경우 

                              * 영리를 목적으로 하는 광고일 경우 

                              * 범죄와 결부된다고 객관적으로 인정되는 내용일 경우 

                              * 다른 이용자 또는 제 3자의 저작권 등 기타 권리를 침해하는 내용인 경우 

                              * 회사에서 규정한 게시물 원칙에 어긋나거나, 게시판 성격에 부합하지 않는 경우 

                              * 기타 관계법령에 위배된다고 판단되는 경우 

                              * 저작권에 문제의 소지가 있는 자료의 경우 

                              

                              제 17 조 (게시물에 대한 저작권) 

                              (1)회원이 서비스 화면 내에 게시한 게시물의 저작권은 게시한 회원에게 귀속됩니다. 또한 회사는 게시자의 동의 없이 게시물을 상업적으로 이용할 수 없습니다. 다만 비영리 목적인 경우는 그러하지 아니하며, 또한 서비스내의 게재권을 갖습니다. 

                              (2)회원은 서비스를 이용하여 취득한 정보를 임의 가공, 판매하는 행위 등 서비스에 게재된 자료를 상업적으로 사용할 수 없습니다. 

                              (3)회사는 회원이 게시하거나 등록하는 서비스 내의 내용물, 게시 내용에 대해 제 15조 각 호에 해당된다고 판단되는 경우 사전통지 없이 삭제하거나 이동 또는 등록 거부할 수 있습니다. 

                              

                              제 18 조 (정보 및 광고의 제공) 

                              (1)회사는 회원에게 서비스 이용에 필요가 있다고 인정되는 각종 정보에 대해서 전자우편이나 서신우편 등의 방법으로 회원에게 제공할 수 있습니다. 

                              (2)회사는 서비스 개선 및 회원 대상의 서비스 소개 등의 목적으로 회원의 동의 하에 추가적인 개인 정보를 요구할 수 있습니다. 

                              

                              제 5 장 계약 해지 및 이용 제한 

                              

                              제 19 조 (계약 변경 및 해지) 

                              (1)회원이 이용계약을 해지하고자 하는 때에는 회원 본인이 회사 웹 내의 [고객센터] 메뉴를 이용해 가입해지를 해야 합니다. 

                              (2)회원이 다음 각호의 사유에 해당하는 경우, "원라인에듀"은 회원 자격을 제한 및 정지시킬 수 있습니다. 

                              1. 가입 신청시에 허위 내용을 등록한 경우 

                              2. "원라인에듀"를 이용하여 구입한 재화·용역 등의 대금, 기타 "원라인에듀" 이용에 관련하여 회원이 부담하는 채무를 기일에 지급하지 않는 경우 

                              3. 다른 사람의 "원라인에듀" 이용을 방해하거나 그 정보를 도용하는 등 전자거래질서를 위협하는 경우 

                              4. "원라인에듀"를 이용하여 법령과 이 약관이 금지하거나 공서양속에 반하는 행위를 하는 경우 

                              (3)"원라인에듀"가 회원자격을 제한, 정지 시킨 후, 동일한 행위가 2회 이상 반복되거나 30일 이내에 그 사유가 시정되지 아니하는 경우, "원라인에듀"는 회원 자격을 상실 시킬 수 있습니다. 

                              (4)"원라인에듀"가 회원자격을 상실시키는 경우에는 회원등록을 말소합니다. 이 경우 회원에게 이를 통지하고, 회원등록 말소 전에 소명할 기회를 부여합니다. 

                              

                              제 6 장 구매 및 환불 

                              

                              제 20 조 (구매신청) 

                              

                              "원라인에듀" 이용자는 "원라인에듀"상에서 이하의 방법에 의하여 구매를 신청합니다. 

                              1. 성명, 주소, 전화번호 입력 

                              2. 재화 또는 용역의 선택 

                              3. 결제방법의 선택 

                              4. 이 약관에 동의한다는 표시(예, 마우스 클릭) 

                              

                              제 21 조 (계약의 성립) 

                              ①"원라인에듀"는 제9조와 같은 구매신청에 대하여 다음 각호에 해당하지 않는 한 승낙합니다. 

                              1. 신청 내용에 허위, 기재누락, 오기가 있는 경우 

                              2. 미성년자가 담배, 주류등 청소년보호법에서 금지하는 재화 및 용역을 구매하는 경우 

                              3. 기타 구매신청에 승낙하는 것이 "원라인에듀" 기술상 현저히 지장이 있다고 판단하는 경우 

                              ②"원라인에듀"의 승낙이 제12조제1항의 수신확인통지형태로 이용자에게 도달한 시점에 계약이 성립한 것으로 봅니다. 

                              

                              제 22 조(지급방법) 

                              

                              "원라인에듀"에서 구매한 재화 또는 용역에 대한 대금지급방법은 다음 각호의 하나로 할 수 있습니다. 

                              1. 계좌이체 

                              2. 신용카드결제 

                              3. 온라인무통장입금 

                              4. ARS에 의한 결제 

                              5. 기타 방법에 의한 대금지급 등 

                              

                              

                              제 23 조(수신확인통지·구매신청 변경 및 취소) 

                              ①"원라인에듀"는 이용자의 구매신청이 있는 경우 이용자에게 수신확인통지를 합니다. 

                              ②수신확인통지를 받은 이용자는 의사표시의 불일치등이 있는 경우에는 수신확인통지를 받은 후 즉시 구매신청 변경 및 취소를 요청할 수 있습니다. 

                              ③"원라인에듀"은 배송전 이용자의 구매신청 변경 및 취소 요청이 있는 때에는 지체없이 그 요청에 따라 처리합니다. 

                              

                              

                              제 24 조 (서비스 이용제한) 

                              (1)회사는 회원이 서비스 이용내용에 있어서 본 약관 제 11조 내용을 위반하거나, 다음 각 호에 해당하는 경우 서비스 이용을 제한할 수 있습니다. 

                              * 미풍양속을 저해하는 비속한 ID 및 별명 사용 

                              * 타 이용자에게 심한 모욕을 주거나, 서비스 이용을 방해한 경우 

                              * 기타 정상적인 서비스 운영에 방해가 될 경우 

                              * 정보통신 윤리위원회 등 관련 공공기관의 시정 요구가 있는 경우 

                              * 6개월 이상 서비스를 이용한 적이 없는 경우 

                              

                              (2)상기 이용제한 규정에 따라 서비스를 이용하는 회원에게 서비스 이용에 대하여 별도 공지 없이 서비스 이용의 일시정지, 초기화, 이용계약 해지 등을 불량이용자 처리규정에 따라 취할 수 있습니다. 

                              

                              제 7 장 손해배상 및 기타사항 

                              

                              제 25 조 (손해배상) 

                              (1)회사는 서비스에서 무료로 제공하는 서비스의 이용과 관련하여 개인정보보호정책에서 정하는 내용에 해당하지 않는 사항에 대하여는 어떠한 손해도 책임을 지지 않습니다. 

                              (2)회사는 컨텐츠의 하자, 이용중지 또는 장애 등에 의하여 발생한 이용자의 손해에 대하여 자사 환불/취소 규정에 따라 처리합니다. 

                              

                              제 26 조 (면책조항) 

                              (1)회사는 천재지변, 전쟁 및 기타 이에 준하는 불가항력으로 인하여 서비스를 제공할 수 없는 경우에는 서비스 제공에 대한 책임이 면제됩니다. 

                              (2)회사는 기간통신 사업자가 전기통신 서비스를 중지하거나 정상적으로 제공하지 아니하여 손해가 발생한 경우 책임이 면제됩니다. 

                              (3)회사는 서비스용 설비의 보수, 교체, 정기점검, 공사 등 부득이한 사유로 발생한 손해에 대한 책임이 면제됩니다. 

                              (4)회사는 회원의 귀책사유로 인한 서비스 이용의 장애 또는 손해에 대하여 책임을 지지 않습니다. 

                              (5)회사는 이용자의 컴퓨터 오류에 의해 손해가 발생한 경우, 또는 회원이 신상정보 및 전자우편 주소를 부실하게 기재하여 손해가 발생한 경우 책임을 지지 않습니다. 

                              (6)회사는 회원이 서비스를 이용하여 기대하는 수익을 얻지 못하거나 상실한 것에 대하여 책임을 지지 않습니다. 

                              (7)회사는 회원이 서비스를 이용하면서 얻은 자료로 인한 손해에 대하여 책임을 지지 않습니다. 또한 회사는 회원이 서비스를 이용하며 타 회원으로 인해 입게 되는 정신적 피해에 대하여 보상할 책임을 지지 않습니다. 

                              (8)회사는 회원이 서비스에 게재한 각종 정보, 자료, 사실의 신뢰도, 정확성 등 내용에 대하여 책임을 지지 않습니다. 

                              (9)회사는 이용자 상호간 및 이용자와 제 3자 상호 간에 서비스를 매개로 발생한 분쟁에 대해 개입할 의무가 없으며, 이로 인한 손해를 배상할 책임도 없습니다. 

                              (10)회사에서 회원에게 무료로 제공하는 서비스의 이용과 관련해서는 어떠한 손해도 책임을 지지 않습니다. 

                              

                              제 27 조(분쟁해결) 

                              (1)"원라인에듀"는 이용자가 제기하는 정당한 의견이나 불만을 반영하고 그 피해를 보상처리하기 위하여 피해보상처리기구를 설치·운영합니다. 

                              (2)"원라인에듀"는 이용자로부터 제출되는 불만사항 및 의견은 우선적으로 그 사항을 처리합니다. 다만, 신속한 처리가 곤란한 경우에는 이용자에게 그 사유와 처리일정을 즉시 통보해 드립니다. 

                              (3)"원라인에듀"와 이용자간에 발생한 분쟁은 전자거래기본법 제28조 및 동 시행령 제15조에 의하여 설치된 전자거래분쟁조정위원회의 조정에 따를 수 있습니다. 

                              

                              제 28 조 (재판권 및 준거법) 

                              (1)이 약관에 명시되지 않은 사항은 전기통신사업법 등 관계법령과 상관습에 따릅니다. 

                              (2)서비스 이용으로 발생한 분쟁에 대해 소송이 제기되는 경우 회사의 본사 소재지를 관할하는 법원을 관할 법원으로 합니다. 

                              

                              

                              부칙 

                              

                              (1) 본 약관은 2018년 01월 01일부터 적용됩니다. 

                              

                              시행일자 : 2018년 1월 1일
                              </p>
                          </div>
                      </div>                            
                      <div class="container">
                          <!-- 체크박스 -->
                          <div class="text-end my-4 text-secondary">
                              <input type="checkbox" class="form-check-input h2" id="rememberCheck" checked>
                              <label class="form-check-label pt-2" for="rememberCheck">이용에 동의합니다.</label>
                          </div>   
                          <!-- 평가응시 -->
                          <div class="text-center">                                                    
                              <button type="button" class="btn btn-primary btn-lg px-5 py-2 waves-effect waves-light" data-bs-dismiss="modal" aria-label="Close">닫기</button>
                          </div>
                      </div>
                  </div>                                                
              </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->  

             
    </main>

    <!-- footer START -->
    <footer class="navbar-fixed-bottom" style="background-color: #f2f2f2">
      <div class="container px-0">
        <!-- Tops Links -->
        <div class="row pt-3">
          <div class="col-sm-7 col-md-6 col-lg-6">
            <ul class="list-inline lh-lg">
              <li class="list-inline-item">
                <a class="text-muted">이용약관</a>
              </li>
              <li class="list-inline-item">
                <a class="text-muted">개인정보 취급방침</a>
              </li>
              <li class="list-inline-item">
                <a class="text-muted">사업주지원교육 유의사항</a>
              </li>
              <li class="list-inline-item">
                <a class="text-muted">본인인증 안내</a>
              </li>
            </ul>
          </div>
          <div class="col text-sm-end">
            <div class="dropdown">
              <a
                class="btn btn-secondary dropdown-toggle"
                href="#"
                role="button"
                id="dropdownMenuLink"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                style="width: 13rem"
              >
                관련사이트
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <a class="dropdown-item" href="#">Something else here</a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Payment and card -->
        <div class="row mb-7">
          <div class="col-sm mb-3 mb-sm-0">
            <!-- Socials -->
            <ul class="list-inline list-separator list-separator-light mb-0">
              <li class="list-inline-item">
                <div class="card">
                  <img
                    src="assets/images/이미지 3.png"
                    class="card-img-top"
                    style="width: 10rem; height: 3rem"
                  />
                </div>
              </li>
              <li class="list-inline-item">
                <div class="card">
                  <img
                    src="assets/images/이미지 4.png"
                    class="card-img-top"
                    style="width: 10rem; height: 3rem"
                  />
                </div>
              </li>
              <li class="list-inline-item">
                <div class="card">
                  <img
                    src="assets/images/이미지 5.png"
                    class="card-img-top"
                    style="width: 10rem; height: 3rem"
                  />
                </div>
              </li>
            </ul>
            <!-- End Socials -->
          </div>

          <div class="col-sm-auto">
            <!-- Socials -->
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a class="btn btn-warning" href="#">카카오채널</a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-success" href="#">N 블로그 </a>
              </li>
            </ul>
            <!-- End Socials -->
          </div>
        </div>

        <!-- Bottom footer -->
        <div class="row">
          <div class="">
            <div
              class="d-lg-flex justify-content-between align-items-center py-3 text-center text-lg-start"
            >
              <!-- copyright text -->
              <div class="text-muted">
                <p>
                  원라인에듀 | 대표 : 이주영 | 주소 : 서울 영등포구 선유로 130
                  에이스 하이테크시티3 705호 원라인에듀 <br />
                  TEL : 1811-0018,1811-0014 | FAX : 050-8094-0019 |
                  사업자등록번호 : 7978600772 <br />
                  통신판매번호 : 제 2021-서울영등포-0322호 <br />
                  COPYRIGHT 2018 원라인에듀 ALLRIGHT & RESERVED.
                </p>
                <a class="text-muted">©2022 Booking</a>. All rights reserved.
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- footer END -->

    <nav class="floating-menu"></nav>

    <script>
      $('#divpassword').keyup(function(event){                    
        var divPassword = $('#divPassword');
        
        if($('#password').val()==""){
            divPassword.removeClass("has-success");
            divPassword.addClass("has-error");
        }else{
            divPassword.removeClass("has-error");
            divPassword.addClass("has-success");
        }
      });
                
      $('#divpasswordCheck').keyup(function(event){        
        var passwordCheck = $('#passwordCheck').val();
        var password = $('#password').val();
        var divPasswordCheck = $('#divPasswordCheck');
        
        if((passwordCheck=="") || (password!=passwordCheck)){
            divPasswordCheck.removeClass("has-success");
            divPasswordCheck.addClass("has-error");
        }else{
            divPasswordCheck.removeClass("has-error");
            divPasswordCheck.addClass("has-success");
        }
      });            
    </script>
    
  </body>
</html>
