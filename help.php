<?php
  require 'api/connect.php';
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/home.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
  .card {
    height: fit-content;
  }
  a {
    color:black;
  }
  a:hover {
    color: black;
    font-weight: bold;
  }
</style>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="home.html" style = "font-size: 30px;">Sky Airlines
            <div class="logo">
                <img src="img/plane.png" class="img-fluid">
            </div>
          </a>
        </a>
          <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="home.php"><i class="fa fa-home"></i> Trang chủ</a>
            </li>
            <li class="nav-item aria-current">
              <a class="nav-link" href="search_flight.php"> Chuyến bay</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="history.php">Tra cứu</a>
            </li>
            <?php
              if(isset($_SESSION['login'])){
                echo '<li class="nav-item dropdown">
                        <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="fa fa-user-o" aria-hidden="true"></i> Welcome '.$_SESSION['username'].'</a>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"> Lịch sử đặt vé</a></li>
                            <li><a class="dropdown-item" href="logout.php"> Đăng xuất</a></li>
                        </ul>
                      </li>';
              }
              else{
                echo '<li class="nav-item">
                        <a class="nav-link" href="login.php">Đăng nhập</a>
                      </li>';
              }
            ?>
            <li class="nav-item">
              <a class="nav-link" href="help.php"> Trợ giúp</a>
            </li>
          </ul>
        </div>
      </nav> 
        <img src = "img/banner1.png" width="100%" height="550px" class = "img-fluid">
        <div class="container mt-3">
            <div class="row">
                <div class = "card mx-auto bg-light w-50 mb-3">
                    <div class = "card-body">
                      <ol>
                        <li>
                          <a href = "#question1">
                            Hành lý xách tay - tôi có thể đem theo những gì lên máy bay? 
                            <ul>
                              <li>
                                <a href = "#question1.1">Tôi có thể mang bao nhiêu món đồ?</a>
                              </li>
                              <li>
                                <a href = "#question1.2">Hành lý chính của tôi có thể có kích thước như thế nào?</a>
                              </li>
                              <li>
                                <a href="#question1.3">Hành lý nhỏ là gì?</a>
                              </li>
                              <li>
                                <a href="#question1.4">Tránh các khoản phí tại sân bay
                                </a>
                              </li>
                              <li>
                                <a href="#question1.5">Hàng hóa nguy hiểm</a>
                              </li>
                              <li>
                                <a href="#question1.6">Sử dụng dược phẩm trong chuyến bay</a>
                              </li>
                            </ul>
                          </a>
                        </li>
                        <li>
                          <a href = "#question2">
                            Hạn mức hành lý ký gửi có nằm trong giá vé không?
                            <ul>
                              <li>
                                <a href="#question2.1">Vé hạng Phổ thông</a>
                              </li>
                              <li>
                                <a href="#question2.2">Vé hạng Phổ thông với gói ưu đãi Plus</a>
                              </li>
                              <li>
                                <a href="#question2.3">Vé hạng Phổ thông với gói ưu đãi Max</a>
                              </li>
                              <li>
                                <a href="#question2.4">Vé hạng Thương gia và Vé hạng Thương gia có gói ưu đãi Max</a>
                              </li>
                            </ul>
                          </a>
                        </li>
                        <li>
                          <a href = "#question3">
                            Phí và lệ phí 
                            <ul>
                              <li>
                                <a href = "#question3.1">Phí hoàn vé</a>
                              </li>
                              <li>
                                <a href="#question3.2">Phí quản lý hoàn vé</a>
                              </li>
                              <li>
                                <a href="#question3.3">Phí đặt chỗ xe lăn</a>
                              </li>
                            </ul>
                          </a>
                        </li> 
                        <li>
                          <a href = "#question4">
                            Tôi có thể làm thủ tục chuyến bay trực tuyến không?
                            <ul>
                              <li>
                                <a href="#question4.1">Làm thủ tục trực tuyến</a>
                              </li>
                              <li>
                                <a href="#question4.2">Làm thủ tục trực tuyến và hành lý</a>
                              </li>
                              <li>
                                <a href="#question4.3">Làm thủ tục trực tuyến cho các chuyến bay quốc tế</a>
                              </li>
                              <li>
                                <a href="#question4.4">Ngoại lệ làm thủ tục chuyến bay trực tuyến</a>
                              </li>
                            </ul>
                          </a>
                        </li>
                        <li>
                          <a href = "#question5">
                            Thiết bị hỗ trợ đi lại và cố định cơ thể
                            <ul>
                              <li>
                                <a href="#question5.1">Đặt chỗ và lập kế hoạch cho chuyến đi của quý khách</a>
                              </li>
                              <li>
                                <a href="#question5.2">Yêu cầu mức hỗ trợ xe lăn của quý khách</a>
                              </li>
                              <li>
                                <a href="#question5.3">Cho chúng tôi biết về xe lăn hoặc thiết bị hỗ trợ di chuyển của quý khách</a>
                              </li>
                              <li>
                                <a href="#question5.4">Đi cùng người đồng hành</a>
                              </li>
                              <li>
                                <a href="#question5.5">Làm thủ tục gửi xe lăn</a>
                              </li>
                            </ul>
                          </a>
                        </li>
                      </ol>
                    </div>
                </div>
            </div>
            <h3>Giải đáp với Sky Airlines</h3>
            <div>
              <ol>
                <li id = "question1"><h5>Hành lý xách tay - tôi có thể đem theo những gì lên máy bay?</h5></li>
                  <ul>
                    <li id = "question1.1">
                      <h6>Tôi có thể mang bao nhiêu món đồ?</h6>
                      <p>
                        Hành lý miễn cước có thể được chia ra 2 hành lý: <br>
                          - Một hành lý chính cho ngăn để hành lý xách tay <br>
                          - Một hành lý nhỏ phải để dưới ghế ngồi phía trước quý khách.
                      </p>
                    </li>
                      <li id = "question1.2">
                        <h6>Hành lý chính của tôi có thể có kích thước như thế nào?</h6>
                        <p>
                          Bất kể trọng lượng hành lý miễn cước của quý khách là bao nhiêu, hành lý chính của quý khách phải để vừa trong ngăn để hành lý xách tay và không vượt quá 56 cm (chiều cao) x 36 cm (chiều rộng) x 23 cm (chiều sâu) bao gồm cả bánh xe và tay cầm.
                          Nếu quý khách đã mua 14 kg hành lý miễn cước, hành lý chính của quý khách không được vượt quá 10 kg.  
                        </p>
                      </li>
                      <li id = "question1.3">
                        <h6>Hành lý nhỏ là gì?</h6>
                        <p>
                          Hành lý nhỏ được mang bên ngoài hành lý chính và được để gọn dưới ghế ngồi phía trước quý khách. <br>
                          Các món đồ nhỏ phổ biến bao gồm: <br>

                            - Ví hoặc túi xách <br>
                            - Một máy tính xách tay để trong bao đựng <br>
                            - Áo khoác hoặc chăn <br>
                            - Một chiếc ô <br>
                            - Máy ảnh <br>
                            - Đồ ăn cho em bé và các đồ dùng khác cho em bé <br>
                            - Hàng hóa miễn thuế được chấp thuận <br>
                        </p>
                      </li>
                      <li id = "question1.4">
                        <h6>Tránh các khoản phí tại sân bay</h6>
                        <p>
                          Chúng tôi giám sát hành lý xách tay tại sân bay và áp dụng phí nếu quý khách vượt quá mức miễn cước. Cũng có thể cần ký gửi thêm các vật dụng khác.
                        
                          Nếu quý khách biết mình có thể vượt quá hạn mức cho phép, sẽ rẻ hơn nếu quý khách mua thêm hành lý trực tuyến trước khi đến sân bay. Quý khách có thể thực hiện việc này khi đặt chỗ hoặc trong phần Quản lý đặt chỗ.
                        </p>
                      </li>
                      <li id = "question1.5">
                        <h6>Hàng hóa nguy hiểm</h6>
                        <p>Một số loại hàng bị cấm trong hành lý xách tay vì thế hãy đảm bảo rằng quý khách đã bỏ hàng cấm ra và đừng quên kiểm tra hạn mức chất lỏng, son khí (aerosols), gel và bột nếu quý khách bay từ nhà ga quốc tế.</p>
                      </li>
                      <li id = "question1.6">
                        <h6>Sử dụng dược phẩm trong chuyến bay</h6>
                        <p>Nếu quý khách cần mang thuốc thiết yếu trên chuyến bay, vui lòng kiểm tra yêu cầu bay cùng thuốc.</p>
                      </li>
                  </ul>
                </li>
                <li id = "question2">
                  <h5>Hạn mức hành lý ký gửi có nằm trong giá vé không?</h5>
                  <p>Điều đó tùy thuộc vào loại vé hoặc gói ưu đãi mà quý khách đã mua – xem bên dưới để biết chi tiết. Ngay cả khi hành lý đã nằm trong giá vé, quý khách vẫn có tùy chọn mua hạn mức hành lý bổ sung nếu cần.

                    Cách rẻ nhất và nhanh nhất để thêm hành lý ký gửi là mua khi quý khách đặt chỗ. Nếu quý khách đã đặt chỗ, quý khách có thể thêm hành lý tại Quản lý đặt chỗ. Hành lý được thêm vào sau đặt chỗ ban đầu sẽ bị tính cước cao hơn.</p>
                    <ul>
                      <li id = "question2.1">
                        <h6>Vé hạng phổ thông:</h6>
                        <p>- Không bao gồm hạn mức hành lý ký gửi
                          <br>
                          - Quý khách có thể mua 15 kg*, 20 kg, 25 kg, 30 kg, 35 kg hoặc 40 kg hành lý miễn cước.</p>
                      </li>
                      <li id = "question2.2">
                        <h6>Vé hạng phổ thông với gói ưu đãi Plus:</h6>
                        <p>
                          - Hạn mức hành lý ký gửi 20kg (tối đa 10kg đối với các chuyến bay nội địa của Sky Airlines Japan (GK)).
                          <br>
                          - Quý khách có thể mua bổ sung tới 20kg nếu cần (tối đa 30kg đối với các chuyến bay nội địa của Sky Airlines Japan (GK)).
                        </p>
                      </li>
                      <li id = "question2.3">
                        <h6>Vé hạng phổ thông với gói ưu đãi Max:</h6>
                        <p>
                          - Hạn mức hành lý ký gửi 30kg. <br>
                          - Quý khách có thể mua bổ sung tối đa 10kg nếu cần.
                        </p>
                      </li>
                      <li id = "question2.4">
                        <h6>Vé hạng Thương gia và Vé hạng Thương gia có gói ưu đãi Max:</h6>
                        <p>
                          - Hạn mức hành lý ký gửi 30kg.
                         <br> - Quý khách có thể mua bổ sung hạn mức hành lý ký gửi 10kg.
                          <br>*Hành lý ký gửi miễn cước 15 kg chỉ áp dụng cho các chuyến bay nội địa của Sky Airlines Airways (JQ) và Sky Airlines Japan (GK). Không áp dụng 15 kg đối với các chuyến bay quốc tế hoặc chuyến bay nội địa nối chuyến với một chuyến bay quốc tế.</p>
                      </li>
                    </ul>
                </li>
                <li id = "question3">
                  <h5>Phí và lệ phí</h5>
                  <ul>
                    <li id = "question3.1">
                      <h6>Phí hoàn vé</h6>
                      <p>Khoản phí này được áp dụng nếu quý khách chọn hoàn trả vé Hạng Thương gia với gói ưu đãi Max, hoặc vé Starter với gói ưu đãi Max được đặt qua hãng hàng không đối tác hoặc một số đại lý vé máy bay. Hãy liên hệ đại lý vé máy bay để biết thêm thông tin.
                        <br>
                        Để biết chi tiết, xem quy định giá vé Starter với gói ưu đãi Max và quy định giá vé Hạng Thương gia với gói ưu đãi Max.
                        <br>
                        Áp dụng trên từng hành khách trên từng đặt chỗ. Không áp dụng cho bất kỳ trường hợp nào khác ngoài những trường hợp đã nêu ở trên.</p>
                    </li>
                    <li id = "question3.2">
                      <h6>Phí quản lý hoàn vé</h6>
                      <p>Một số loại vé là không hoàn trả hoặc chỉ được hoàn trả một phần, tùy vào Điều kiện Vận chuyển hoặc pháp luật hiện hành. Tuy nhiên, nếu vé của quý khách là không hoàn trả, và quý khách quyết định không bay nữa thì hãy liên hệ với chúng tôi để chúng tôi hoàn trả một số loại phí và thuế của bên thứ ba nhất định, ngoại trừ phụ phí xăng dầu và bảo hiểm. Nếu quý khách yêu cầu hoàn trả các loại thuế và phí của bên thứ ba này thì sẽ phải trả phí quản lý dưới đây, trừ khi được miễn theo pháp luật hiện hành. Nếu khoản phí quản lý này vượt quá khoản tiền được hoàn trả thì quý khách sẽ không được hoàn trả và sẽ không phải trả phí quản lý.</p>
                    </li>
                    <li id = "question3.3">
                      <h6>Phí đặt chỗ xe lăn</h6>
                      <p>
                        Sky Airlines cung cấp xe lăn và trợ giúp đi lại cho những hành khách có yêu cầu. Các khoản phí sẽ được áp dụng cho yêu cầu cung cấp xe lăn (tùy thuộc vào khả năng cung ứng), trên các chuyến bay quốc tế của Sky Airlines Asia (3K) từ ngày 28/3/2018.
                      </p>
                    </li>
                  </ul>
                </li>
                <li id = "question4">
                  <h5>Tôi có thể làm thủ tục chuyến bay trực tuyến không?</h5>
                  <ul>
                    <li id = "question4.1">
                      <h6>Làm thủ tục chuyến bay trực tuyến</h6>
                      <p>
                        Khi quý khách bay cùng chúng tôi, hãy đảm bảo làm thủ tục chuyến bay trực tuyến – việc này giúp giảm tiếp xúc và giúp quý khách đi qua sân bay nhanh hơn.
                        <br>
                        Làm thủ tục chuyến bay trực tuyến đơn giản, nhanh chóng và có sẵn cho hầu hết các chuyến bay của Sky Airlines – xem các ngoại lệ dưới đây.
                        <br>
                        Để làm thủ tục trực tuyến, quý khách sẽ chỉ cần mã đặt chỗ (trên hành trình) và thông tin chi tiết của hộ chiếu nếu quý khách bay quốc tế.
                      </p>
                    </li>
                    <li id = "question 4.2">
                      <h6>Làm thủ tục trực tuyến và hành lý</h6>
                      <p>Quý khách có thể làm thủ tục trực tuyến nếu có hành lý ký gửi hoặc hành lý xách tay.
                        <br>
                        <b>Hành lý xách tay:</b> làm thủ tục trực tuyến, lấy thẻ lên máy bay và đi thẳng đến cổng lên máy bay.
                        <br>
                        <b>Hành lý ký gửi:</b> làm thủ tục chuyến bay trực tuyến, nhận thẻ lên máy bay, sau đó đem hành lý ký gửi của quý kháchđến quầy ký gửi hành lý của Sky Airlines trước khi quầy ký gửi hành lý đóng cửa.
                        <br>
                        Thực hiện đơn giản! Quý khách có thể sử dụng thẻ lên máy bay di động trên tất cả các chuyến bay nội địa của Sky Airlines Airways (JQ) và Sky Airlines Japan (GK). Để biết tất cả các thông tin quý khách cần về thẻ lên máy bay, hãy xem mục Làm thế nào để tôi nhận thẻ lên máy bay?</p>
                    </li>
                    <li id = "question4.3">
                      <h6>Làm thủ tục trực tuyến cho các chuyến bay quốc tế</h6>
                      <p>
                        Để tạo thuận tiện cho quý khách, có dịch vụ làm thủ tục trực tuyến trên các chuyến bay quốc tế chọn lọc.
                        <br>
                        Dịch vụ làm thủ tục trực tuyến của các chuyến bay Sky Airlines Airways (JQ) mở 2 ngày trước chuyến bay của hành khách và đóng trước giờ khởi hành 2 giờ.
                        <br>
                        Làm thủ tục trực tuyến cho các chuyến bay Sky Airlines Asia (3K) và Sky Airlines Japan (GK) (GK) sẽ được mở bảy ngày trước chuyến bay và được đóng hai giờ trước khi khởi hành.
                        <br>
                        Nếu chuyến bay của quý khách có dịch vụ làm thủ tục trực tuyến và quý khách không phải đáp ứng các quy định về hành lý, thị thực hoặc nhập cảnh thì sau khi đến sân bay, quý khách có thể đi thẳng ra cửa lên máy bay.
                        <br>
                        Để biết thông tin cụ thể về các chuyến bay có dịch vụ và các yêu cầu, vui lòng xem trang Đi thẳng ra cửa lên máy bay của các chuyến bay quốc tế.
                        <br>
                        Nếu chuyến bay của quý khách không có dịch vụ làm thủ tục trực tuyến, quý khách sẽ phải làm thủ tục chuyến bay tại sân bay và xuất trình giấy tờ tùy thân để nhận thẻ lên máy bay trước khi quầy làm thủ tục đóng cửa.
                      </p>
                      <li id = "question4.4">
                        <h6>Ngoại lệ làm thủ tục chuyến bay trực tuyến</h6>
                        <p>
                          Có một số ngoại lệ về làm thủ tục trực tuyến. Nếu rơi vào một trong các trường hợp dưới đây, quý khách sẽ phải làm thủ tục tại sân bay:
                          <br>
                            - Quý khách đi cùng trẻ sơ sinh – trừ khi nếu đi cùng một trẻ sơ sinh không sử dụng ghế ngồi riêng trên chuyến bay nội địa của Sky Airlines Airways (JQ) trong địa phận Úc hoặc New Zealand, hoặc chuyến bay nội địa của Sky Airlines Japan (GK) tại Nhật Bản
                          <br>
                            - Quý khách đang bay đến hoặc đi từ Hoa Kỳ
                          <br>
                            - Quý khách đặt vé theo vé đoàn của Sky Airlines
                          <br>
                            - Quý khách cần sự trợ giúp đặc biệt (ví dụ như trợ giúp với xe lăn, thêm ghế ngồi hoặc cần chó dịch vụ)
                          <br> 
                            - Quý khách bị khiếm thính hoặc khiếm thị (trừ khi quý khách làm thủ tục các chuyến bay nội địa ở Úc, New Zealand và Nhật Bản)
                          <br>
                            - Đặt chỗ của quý khách còn số dư.
                        </p>
                      </li>
                    </li>
                  </ul>
                  </li>
                  <li id = "question5">
                    <h5>Thiết bị hỗ trợ đi lại và cố định cơ thể</h5>
                    <ul>
                      <li id = "question5.1">
                        <h6>Đặt chỗ và lập kế hoạch cho chuyến đi của quý khách</h6>
                        <p>
                          Chúng tôi luôn sẵn sàng giúp cho hành trình của quý khách trở nên suôn sẻ. Hãy cho chúng tôi biết nếu quý khách cần sự hỗ trợ cụ thể với việc sử dụng xe lăn, lên máy bay hoặc đến chỗ ngồi của quý khách.
                          <br>
                          Dù quý khách đã đặt chỗ qua jetstar.com, trung tâm liên hệ của chúng tôi hoặc đại lý du lịch, quý khách sẽ cần cho chúng tôi biết loại hỗ trợ quý khách yêu cầu và quý khách sẽ mang theo thiết bị hỗ trợ di chuyển nào.
                        </p>
                      </li>
                      <li id = "question5.2">
                        <h6>Yêu cầu mức hỗ trợ xe lăn của quý khách</h6>
                        <p>
                          Vui lòng cho chúng tôi biết mức hỗ trợ quý khách yêu cầu. Chúng tôi sẽ áp dụng quy tắc của Hiệp hội Vận tải Hàng không Quốc tế (IATA) phù hợp - WCHR, WCHS hoặc WCHC - đối với đặt chỗ của quý khách để trong suốt hành trình, đội ngũ nhân viên của chúng tôi biết được mức độ hỗ trợ xe lăn quý khách yêu cầu.
                          <br>
                          Tất cả các mức hỗ trợ xe lăn bao gồm hỗ trợ từ máy bay đến khu vực nhận hành lý tại điểm đến của quý khách. Tất nhiên, quý khách cũng có thể tự đi tại sân bay.
                          <br>
                          Xin lưu ý rằng có thể có chậm trễ trong việc cung cấp hỗ trợ xe lăn, đặc biệt là trong khoảng thời gian bận rộn, vì vậy quý khách nên cân nhắc yếu tố này khi sắp xếp chuyến đi của mình.
                          <br>
                          Nếu quý khách chưa yêu cầu mức hỗ trợ cụ thể trước khi đi, chúng tôi có thể không thể cung cấp hỗ trợ vào ngày do quy định giới hạn và hạn chế hoạt động.
                        </p>
                      </li>
                      <li id = "question5.3">
                        <h6>Cho chúng tôi biết về xe lăn hoặc thiết bị hỗ trợ di chuyển của quý khách</h6>
                        <p>
                          Vui lòng liên hệ với chúng tôi để cho chúng tôi biết:
                          <br>
                          - Nếu xe lăn hoặc thiết bị hỗ trợ di chuyển của quý khách được vận hành bằng tay hoặc chạy bằng pin
                          <br>
                          - Trọng lượng của xe lăn hoặc thiết bị hỗ trợ di chuyển
                          <br>
                          - Nếu xe lăn chạy bằng pin hoặc thiết bị hỗ trợ di chuyển có pin khô hoặc ướt hoặc pin lithium ion
                          <br>
                          Nếu xe lăn hoặc thiết bị hỗ trợ di chuyển nặng hơn 32kg và không thể để ở vị trí thẳng đứng và hoạt động ở chế độ bánh xe tự do, chúng tôi sẽ không thể mang thiết bị.
                          <br>
                          Các chuyến bay của Sky Airlines Asia - Hành khách không làm thủ tục gửi xe lăn nhưng yêu cầu sử dụng xe lăn tại sân bay trong Các chuyến bay của Sky Airlines Asia (3K) sẽ cần phải trả phí thuê và dịch vụ xe lăn
                        </p>
                      </li>
                      <li id = "question5.4">
                        <h6>Đi cùng người đồng hành</h6>
                        <p>Hãy cho chúng tôi biết nếu quý khách đi cùng Người đồng hành trước khi quý khách bay để chúng tôi có thể sắp xếp chỗ ngồi cho hai người cùng nhau.</p>
                      </li>
                      <li id =  "question5.5">
                        <h6>Làm thủ tục gửi xe lăn</h6>
                        <p>
                          Chúng tôi sẽ áp dụng sự cẩn trọng một cách hợp lý đối với các thiết bị trợ giúp đi lại, nhưng xin lưu ý rằng chúng tôi chỉ có trách nhiệm giới hạn đối với các thiệt hại xảy ra trong thời gian trung chuyển. Quý khách sẽ cần đảm báo có bảo hiểm thích hợp cho thiết bị trợ giúp đi lại của mình. Để biết thêm thông tin, vui lòng xem điều lệ vận chuyển của chúng tôi.
                          <br>
                          Nếu thiết bị hỗ trợ di chuyển của quý khách yêu cầu lắp ráp lại, quý khách hoặc người đồng hành có thể cần làm điều này vì nhân viên của chúng tôi sẽ không thể hỗ trợ. Quý khách nên xem xét tháo và cố định những phần tùy chỉnh của xe lăn để giảm nguy cơ bị hư hỏng.
                          <br>
                        </p>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
            </ol>
            </div>
        </div>
        <footer class="bg-dark text-center text-lg-start text-white">
          <div class="container p-4">
            <div class="row mt-4">
              <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">về chúng tôi</h5>
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#!" class="text-white">Tập đoàn</a>
                  </li>
                  <li>
                    <a href="#!" class="text-white">Đội bay</a>
                  </li>
                  <li>
                    <a href="#!" class="text-white">Cam kết với khách hàng</a>
                  </li>
                  <li>
                    <a href="#!" class="text-white">Các điều kiện và điều khoản</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Sản phẩm</h5>
      
                <ul class="list-unstyled">
                  <li>
                    <i class="fa fa-ticket" aria-hidden="true"></i><a href="search_flight.html" class="text-white"> Vé máy bay</a>
                  </li>
                  <li>
                    <i class="fa fa-bell-o" aria-hidden="true"></i> <a href="#!" class="text-white"> Combo khuyến mãi</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Đối tác thanh toán</h5>
                <ul class="list-unstyled">
                  <li>
                    <a href="#!" class="text-white">
                      <div>
                        VISA
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#!" class="text-white">
                      <div>
                        MASTERCARD
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#!" class="text-white">
                      <div>
                        MOMO
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#!" class="text-white">
                      <div>
                        ZALOPAY
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">liên hệ</h5>    
                <ul class="list-unstyled">
                  <li>
                    <a class="text-white"><i class="fa fa-phone" aria-hidden="true"></i> SDT: 0909.120.128</a>
                  </li>
                  <li>
                    <a class="text-white"><i class="fa fa-location-arrow" aria-hidden="true"></i> Email: skyairlines@gmail.com</a>
                  </li>
                  <li>
                    <a class="text-white"><i class="fa fa-map-marker" aria-hidden="true"></i> Địa chỉ: Quận 7, TP. Hồ Chí Minh</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2022 Copyright:
            <a class="text-white" href="home.html">SkyAirlines.com.vn</a>
          </div>
        </footer>        
    </body>
</html>