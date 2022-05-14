<h1>Chào bạn {{ $data['tenkhachang'] }}</h1>
<h2>Bạn có một lịch cắt tóc vào lúc : {{ $data['giocat'] }} , ngày : {{ $data['ngaycat'] }}</h2>
<h2>Combo của bạn là : {{ $data['combo_id'] }} , giá tiền : {{ number_format($data['gia_id'], 0, ',', '.') }} VND</h2>
<h2>Tình trạng :{{ $data['trangthai'] == 0 ? 'Chưa thanh toán' : 'Đã thanh toán'}} </h2>
<h2>Xem chi tiết tại đay <a href="http://127.0.0.1:8000/nguoidung">Click</a></h2>


